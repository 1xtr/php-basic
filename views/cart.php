
<?php if (empty($_SESSION['cart'])) : ?>
<div class="alert alert-danger" role="alert">
    Корзина пуста!
</div>
<?php else: ?>
<div class="alert alert-primary" role="alert">Корзина</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">SKU#</th>
            <th scope="col">Product name</th>
            <th scope="col">Qtt</th>
            <th scope="col">Price</th>
            <th scope="col">SubTotal</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $product) : ?>
        <tr>
            <th scope="row"><?=$product['id']?></th>
            <td><?=$product['name']?></td>
            <td><?=$product['qtt']?></td>
            <td><?=$product['price']?></td>
            <td><?=$product['subtotal']?></td>
            <td><a href="/cart/remove_from_cart.php?id=<?=$product['id']?>">Remove</a></td>
        </tr>
        <? endforeach; ?>
        <tr>
            <td colspan="4" class="text-right">Total</th>
            <td colspan="2"><?=$cartTotal?></td>
        </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="/orders/make.php">Make order</a>
    </div>
</div>
<?php endif; ?>