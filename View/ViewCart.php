<?php $this->title = "Panier"; ?>
<!-- PARTIE PANIER -->

<div class="container">
    <div class="text-center">
        <h1>Votre panier :</h1>
    </div>

    <form action="index.php?page=checkout" method='post'>
        <div class="buttonHolder">
            <button class="btn1" type="submit" name='continueToCheckout'>Passer au paiement</button>
        </div>
    </form>

    <?php foreach ($products as $product):?>
    <div class="productInCart">
        <div class="row">
            <h3><?= $product['name'] ?></h3>
        </div>
        <div class="row">
            <div class="col-2 centerElementCart">
                <h1>x<?= $product['quantity'] ?></h1>
            </div>
            <div class="col centerElementCart">
                <?= "<img src = \"assets/img/". $product['image'] ."\" class ='mediumItemImage'>" ?>
            </div>
            <div class="col-3 centerElementCart">
                <h2><?= $product['price']*$product['quantity'].' €' ?></h2> <?php if($product['quantity'] != 1) echo "<h3>(".$product['price']." € chacun)</h3>"; ?>
            </div>
            <div class="col-2 centerElementCart ">
                <form action = "index.php?page=Cart" method="POST" id="addToCartForm" name="removeItem">
                    <input type='hidden' id='itemToRemoveId' name='itemToRemoveId' value='<?= $product['id'] ?>'>
                    <button class="btn2" name="removeItemRequest" type="submit">X</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="productInCart text-center">
        <h2>Total : BEAUCOUP D'ARGENT</h2>
    </div>

    <form action="index.php?page=checkout" method='post'>
        <div class="buttonHolder">
            <button class="btn1" type="submit" name='continueToCheckout'>Passer au paiement</button>
        </div>
    </form>

</div>

<!--  PARTIE ACHAT   -->

<div class="container">


</div>
