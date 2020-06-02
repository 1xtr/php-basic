<div class="alert alert-primary" role="alert">Make order</div>
<div class="container">
    <form action="/orders/place_order.php" method="post">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading1">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            #1 Получатель
                        </button>
                    </h2>
                </div>

                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">ФИО</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-sm" value="<?=$buyer['login']?>" name="recipient">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Телефон</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-sm" value="+79000000000" name="phone">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading2">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                            #2 Варианты оплаты
                        </button>
                    </h2>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_type" id="exampleRadios1"
                                   value="cash">
                            <label class="form-check-label" for="exampleRadios1">
                                Наличными
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_type" id="exampleRadios2"
                                   value="bankcard" checked>
                            <label class="form-check-label" for="exampleRadios2">
                                Банковской картой
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading4">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                            #3 Варианты получения заказа
                        </button>
                    </h2>
                </div>

                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="getting_order" id="exampleRadios3"
                                   value="pickup">
                            <label class="form-check-label" for="exampleRadios3">
                                Самовывоз
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="getting_order" id="exampleRadios4"
                                   value="express_delivery" checked>
                            <label class="form-check-label" for="exampleRadios4">
                                Доставка курьером
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading3">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                            #4 Товары в заказе
                        </button>
                    </h2>
                </div>

                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Qtt</th>
                                    <th scope="col">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cart as $product) : ?>
                                <tr>
                                    <th scope="row"><?=$product['name']?></th>
                                    <td><?=$product['qtt']?></td>
                                    <td><?=$product['subtotal']?></td>
                                </tr>
                            <? endforeach; ?>
                            <tr>
                                <td colspan="2" class="text-right">Total</th>
                                <td ><?=$cartTotal?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="agree" id="defaultCheck1" checked name="152fz">
            <label class="form-check-label" for="defaultCheck1">
                Нажимая кнопку «Оформить заказ», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в Согласии на обработку персональных данных
            </label>
        </div>
        <button type="submit" class="btn btn-success btn-sm btn-block">Оформить заказ</button>
    </form>

</div>
