<?php
$order = parseSelect(get('sort'));
$files = getAllImages($order[0], $order[1]);
?>
<div class="d-flex justify-content-center flex-wrap w-75">
<?php foreach ($files as $image): ?>
    <a href="/photo.php?id=<?=$image['id']?>" target="_blank"><img src="<?=$image['thumbnail']?>" alt=""></a>
<?php endforeach;?>
</div>
<?php
/**
 * @todo Need sort form with three field Name, Size in bytes or px, Views
 */
?>

<div class="sort">
    <form action="/index.php">
        <label for="sort">Сортировка</label>
        <select name="sort" id="sort">
            <option value="name:ASC">По названию А-Я</option>
            <option value="name:DESC">По названию Я-А</option>
            <option value="views_count:DESC">По просмотрам</option>
        </select>
    </form>
</div>
