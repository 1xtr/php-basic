<?php
$files = getAllImages();
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

</div>
