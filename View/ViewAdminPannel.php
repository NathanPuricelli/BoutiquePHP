<?php $this->title = "Admin pannel"; ?>




<!-- PARTIE COMMANDES -->

<div class="container">
    <div class="text-center">
        <h2>Liste des commandes passées</h2>
    </div>
    <div class="container">

        <?php foreach ($orders as $order):?>
        <div class="row orderBox">
            <div class="col">
                <div class="row text-center">
                    <p>Customer ID : <?= $order['customer_id'] ?></p>
                </div>
                <div class="row text-center">
                    <p>Register : <?= $order['registered'] ?></p>
                </div>
                <div class="row text-center">
                    <p>delivery_add_id : <?= $order['delivery_add_id'] ?></p>
                </div>
                <div class="row text-center">
                    <p>payment_type : <?= $order['payment_type'] ?></p>
                </div>
                <div class="row text-center">
                    <p>date : <?= $order['date'] ?></p>
                </div>
                <div class="row text-center">
                    <p>status : <?= $order['status'] ?></p>
                </div>
                <div class="row text-center">
                    <h5>total : <?= $order['total'] ?></h5>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>