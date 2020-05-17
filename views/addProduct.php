<?php
?>

<form action="/dev/" method="post" enctype="multipart/form-data">
    <label>Name
        <input type="text" name="product_name">
    </label><br/>
    <input type="file" name="product_image" accept="*.jpg, *.png, *.jpeg"><br/>
    <label>Price
        <input type="text" name="product_price">
    </label><br/>
    <label>Desc
        <input type="text" name="product_description">
    </label>
    <input type="submit">
</form>
