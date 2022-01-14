<?php $this->title = "Profil"; ?>

<div class="container">
    <div class="container">
        <div class="text-center">
            <h2>Liste des commandes passées</h2>
        </div>

        <!-- AFFICHAGE DES COMMANDES -->
        <?php foreach ($ordersList as $order):?>
        <?php if($order['status'] == 10):?>
        <div class="orderBox confirmed">
        <?php else:?>
        <div class="orderBox">
        <?php endif;?>
            <div class="row">
                <div class="col-5" style="text-align:left;">
                    <h5>COMMANDE #<?= $order['id'] ?></h5>
                    <p><?= $order['date'] ?><br/>
                    <?= $order['total'] ?> €
                    <?php if($order['payment_type'] != null): ?>
                    (Par <?= $order['payment_type'] ?>)
                    <?php endif; ?></p>
                </div>
                <div class="col-3">
                    <p>Client : <?= $order['customer']['forname']." ".$order['customer']['surname'] ?></p>
                </div>
                <div class="col-4" style="text-align:right;">
                    <?php if($order['address'] != null):?>
                    <p>Adresse : <?= $order['address']['add1'] ?> <br/>
                    <?= $order['address']['city'] ?> <br/>
                    <?= $order['address']['postcode'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <h5>Détails commande :</h5>
            </div>
            <div class="row">
                <?php foreach ($order['itemList'] as $item):?>
                <div class="smallProductBox">
                    <?= "<img src = \"assets/img/". $item['image'] ."\" class ='smallItemImage'>" ?>
                    <p>x<?= $item['quantity'] ?><br/>
                    <?= $item['price']*$item['quantity'] ?> €</p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col">
                    <?php
                    switch ($order['status']) {
                        case 1:
                            $txtStatus = "Finalisée, prête à être payée";
                            break;
                        case 2:
                            $txtStatus = "Commande payée";
                            break;
                        case 10:
                            $txtStatus = "Commande confirmée et envoyée";
                            break;
                    }
                    ?>
                    <h5>Etat de la commande : <?= $txtStatus ?></h5>
                </div>
                
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>