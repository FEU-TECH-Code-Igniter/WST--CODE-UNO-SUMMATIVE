
    <div class="container">
        <div class="col-md-8 d-flex align-items-center justify-content-center m-auto">
            <table class="table table-stripe table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user):?>
                    <tr>
                        <td> <?= $user['ID'] ?> </td>
                        <td> <?= $user['Product_Name'] ?> </td>
                        <td> <?= $user['price'] ?> </td>
                        <td> <?= $user['quantity'] ?> </td>+
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
