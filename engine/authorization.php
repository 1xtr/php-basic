<?php
/**
 * @param string $login
 * @param string $email
 * @param string $password
 * @return bool|mysqli_result
 */
function createUser(string $login, string $email, string $password) {
    $sql = "INSERT INTO users (login, email, password) VALUES ('{$login}','{$email}','{$password}')";
    return execute($sql);
}

function getToken(...$strings) {
    $raw = '';
    foreach ($strings as $string) {
        $raw .= $string;
    }
    return md5($raw);
}

function addUserSessionInfo(
    string $userId,
    string $token,
    string $remote_ip,
    string $platform,
    string $browser,
    string $device_name,
    $expire_time,
    $sessid)
{
    $sql = "INSERT INTO sessions 
    VALUES ( DEFAULT,
            {$userId},
            '{$remote_ip}',
            '{$token}',
            '{$platform}',
            '{$browser}',
            '{$device_name}',
           FROM_UNIXTIME({$expire_time}),
            '{$sessid}'
            )";
    return execute($sql);
}

function deleteAuthorizationToken() {
    $sql = "DELETE FROM sessions WHERE session_id = '" . session_id() . "'";
    return execute($sql);
}

/**
 * @param string $ip IP адрес клиента
 * @param string $token Ранее установленный токен
 * @return mixed
 */
function getUserByToken(string $ip, string $token) {
    $sql = "SELECT user_id FROM sessions WHERE token = '{$token}' AND remote_ip = '{$ip}'";
    return queryOne($sql);
}

function getUserByLogin(string $login) {
    return  queryOne("SELECT * FROM users WHERE login = '{$login}'");
}

function setSessionFields(array $array) {
    foreach ($array as $key => $field) {
        addSessionField($key, $field);
    }
}

function rememberMe(int $id, string $ip, $rememberMe) {
    if ($rememberMe) {
        $userToken = getToken($id, session_id());
        $expire_time = time() + (30 * 24 * 60 * 60);
        $platform = $browser = $device_name = NULL;
        extract(userInfo());
        addUserSessionInfo($id, $userToken, $ip, $platform, $browser, $device_name, $expire_time, session_id());
        setcookie('user_token', $userToken, $expire_time);
    }
}

/** browscap.ini
 * @return array
 */
function userInfo() {
    $rawInfo = get_browser(null, true);
    return ['platform' => $rawInfo['platform'],
            'browser' => $rawInfo['parent'],
            'device_name' => $rawInfo['device_name'],
            ];
}

function authorize($id, $rememberMe = false, $is_admin = 0) {
    rememberMe($id, remote_ip(), $rememberMe);
    setSessionFields([
        'user_id' => $id,
        'authorized' => 1,
        'is_admin' => $is_admin,
    ]);
}
