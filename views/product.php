<div class="container">
    <div class="card mb-3">
        <img src="/img/<?=$product['original_name']?>" class="card-img-top" alt="<?=$product['name']?>">
        <div class="card-body">
            <h5 class="card-title"><?=$product['name']?></h5>
            <p class="card-text"><?=$product['full_desc']?></p>
            <p class="card-text"><small class="text-muted">Price: $<?=$product['price']?></small></p>
            <a class="btn btn-primary" href="/cart/index.php?action=addtocart&product_id=<?=$product['id']?>" role="button">Купить</a>
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1"
                   role="button" aria-expanded="false" aria-controls="collapseExample">Написать отзыв</a>
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample2"
               role="button" aria-expanded="false" aria-controls="collapseExample">Отзывы</a>

            <div class="collapse" id="multiCollapseExample1">
                <?php if (!$_SESSION['authorized']) : ?>
                <div class="card card-body">
                    Только авторизованные пользователи могут оставлять отзывы. <a href="/auth/">Авторизоваться</a>
                </div>
                <?php else : ?>
                <form method="get" action="/catalog/review.php">
                    <div class="form-group row">
                        <input type="hidden" value="<?=$_SESSION['user_id']?>" name="user_id">
                        <input type="hidden" value="<?=$product['id']?>" name="product_id">
                        <label for="staticLogin" class="col-sm-2 col-form-label">User</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticLogin" value="<?=$_SESSION['user_login']?>" name="login">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=$_SESSION['user_email']?>" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputReview" class="col-sm-2 col-form-label">Review</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputReview" name="review"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
                <?php endif; ?>
            </div>
            <div class="collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($reviews as $review) : ?>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <strong><?=$review['login']?></strong> | <?=substr($review['date'], 0, 10)?>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?=$review['content']?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>