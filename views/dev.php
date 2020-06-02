<div class="alert alert-primary" role="alert">Админка</div>
<div class="container">

    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qtt.</th>
                <th scope="col">Description</th>
                <th scope="col">Views</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $item) : ?>
            <tr>
                <th scope="row"><?=$item['id']?></th>
                <td><?=$item['name']?></td>
                <td><?=$item['price']?></td>
                <td><?=$item['quantity']?></td>
                <td><?=$item['full_desc']?></td>
                <td><?=$item['views_count']?></td>
                <td>
                    <a href="/img/<?= $item['original_name']?>" target="_blank">
                        <img src="/img/thumbnails/<?=$item['preview_name']?>" width="50px" alt="<?=$item['name']?>">
                    </a>
                </td>
                <td>
                    <a href="/dev/index.php?action=remove&image_id=<?=$item['image_id']?>">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <form class="form-group" action="/dev/add_product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prod_name">Наименование</label>
                <input type="text" class="form-control-sm" id="prod_name" placeholder="Товар" name="product_name">
            </div>
            <div class="form-group">
                <label for="prod_price">Цена</label>
                <input type="text" class="form-control-sm" id="prod_price" placeholder="Цена" name="product_price">
            </div>
            <div class="form-group">
                <label for="prod_desc">Example textarea</label>
                <textarea class="form-control-sm" id="prod_desc" rows="2" name="product_description"></textarea>
            </div>
            <div class="form-group">
                <label for="prod_image">Изображение товара</label>
                <input type="file" class="form-control-file" id="prod_image" name="product_image"
                       accept="*.jpg, *.png, *.jpeg">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

</div>