<?php $this->title = "Admin pannel"; ?>




<!-- PARTIE COMMANDES -->

<div class="container">
    <div class="text-center">
        <h2>Liste des commandes passées</h2>
    </div>
    <div class="container">

        <?php foreach ($ordersList as $order):?>
        <div class="row orderBox">
            <div class="col">
                <div class="row text-center">
                    <p>Date : <?= $order['date'] ?></p>
                </div>
                <div class="row text-center">
                    <p>Type de paiement : <?= $order['payment_type'] ?></p>
                </div>
                <div class="row text-center">
                    <p>Total : <?= $order['total'] ?> €</p>
                </div>
                <br/>

                <h3 class="text-center">Infos client</h3>
                <div class="row text-center">
                    <p>Prénom : <?= $order['customer']['forname'] ?></p>
                </div>
                <div class="row text-center">
                    <p>Nom : <?= $order['customer']['surname'] ?></p>
                </div>

                <h3 class="text-center">Adresse</h3>
                <div class="row text-center">
                    <p>Adresse : <?= $order['address']['add1'] ?></p>
                </div>
                <div class="row text-center">
                    <p>Ville : <?= $order['address']['city'] ?></p>
                </div>
                <div class="row text-center">
                    <p>Code postal : <?= $order['address']['postcode'] ?></p>
                </div>
                
                <h3 class="text-center">=================</h3>
                <h3 class="text-center">Produits commandés</h3>
                <?php foreach ($order['itemList'] as $item):?>
                <p class="text-center">- <?= $item['name'] ?> (x<?= $item['quantity'] ?>) | <?= $item['price']*$item['quantity'] ?></p>
                <?php endforeach; ?>
                <h3 class="text-center">=================</h3>
                <div class="row text-center">
                    <p>Etat de la commande (status) : <?= $order['status'] ?></p>
                </div>

                <form action = "index.php?page=adminPannel" method="POST" class="text-center">
                    <?=  "<input type='hidden' id='idOrder' name='idOrder' value=".$order['id'].">" ?>
                    <input type="submit" name = "changeStatus" value="Confirmer la commande">
                </form>

            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>