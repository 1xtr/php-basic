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
                        <form action="/cart/add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?=$item['id']?>">
                            <button type="submit" class="btn btn-primary">Add to cart</button>
                        </form>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>