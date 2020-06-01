<div class="alert alert-primary" role="alert">Заказы</div>

<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Items</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">Total $</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <th scope="row"><?=$order['id']?></th>
                <td>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading<?=$order['id']?>">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#collapse<?=$order['id']?>" aria-expanded="true" aria-controls="collapse<?=$order['id']?>">
                                        Order items
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse<?=$order['id']?>" class="collapse" aria-labelledby="heading<?=$order['id']?>" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php foreach ($ordersItems as $item) {
                                        if ($item['order_id'] == $order['id']) {
                                            echo  $item['name'] . ' | ' .$item['quantity'] . ' | ' . (int) $item['price'] . '<br/>';
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><?=$order['status']?></td>
                <td><?=$order['date']?></td>
                <td><?=$order['total']?></td>

            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>