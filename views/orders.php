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
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Order items
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    table
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