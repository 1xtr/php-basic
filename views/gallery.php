<?php
/** @var array $files */
?>

<?php foreach ($files as $image): ?>
    <a href="/photo.php?id=<?=ЗДЕСЬ ИД ФОТОГРАФИИ?>" target="_blank"><img width="200" src="/img/small/<?=$image?>" alt=""></a>
<?php endforeach;?>