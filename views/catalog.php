<div class="alert alert-primary" role="alert">Каталог</div>
<div class="container">
    <div class="row">
        <?php foreach ($content as $item) : ?>
            <a href="/catalog/product.php?id=<?=$item['id']?>">
                <div class="card" style="width: 15rem;">
                    <img src="/img/thumbnails/<?=$item['preview_name'] ?>" class="card-img-top" alt="<?=$item['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$item['name'] ?></h5>
                        <p class="card-text"><?=$item['full_desc'] ?></p>
                        <a href="#" class="btn btn-primary">Купить</a>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>