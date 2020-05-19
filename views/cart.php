<?php
$qtt = 1;
$price = (int)$price;
?>
<div class="alert alert-primary" role="alert">Корзина</div>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">SKU#</th>
            <th scope="col">Product name</th>
            <th scope="col">Qtt</th>
            <th scope="col">Price</th>
            <th scope="col">Summ</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"><?=$id?></th>
            <td><?=$name?></td>
            <td><?=$qtt?></td>
            <td><?=$price?></td>
            <td><?=$price * $qtt?></td>
        </tr>

        </tbody>
    </table>
</div>
