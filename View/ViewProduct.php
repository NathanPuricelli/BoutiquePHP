<?php $this->titre = $product['name']." | Infos"; ?>
<!-- PARTIE PRODUIT -->

<div class="container">
    <div class="row productBox">
        <div class="col-md-9 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-6 productImg">
                    <?php 
                    $image = $product['image'];
                    $chemin="assets/img/".$image;
                    $img = "<img src = \"" . $chemin ."\" class =\"productImg\">";
                    echo ($img);
                    ?>
                </div>
                <div class="col-md-12 col-sm-6 productDescription">
                    <h5>Description :</h5>
                    <?= $product['description'] ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 productBuyingSection">
                <h3><?= $product['name'] ?></h3>
                <h5>Prix : <?= $product['price'] ?> €</h5>
                <p>Quantité disponible : <?= $product['quantity'] ?></p>
                <p>Combien en voulez-vous ?</p>
                <!-- Bail de bouton - et +  -->
                <button class="btn1" type="submit">Ajouter au panier</button>
        </div>
    </div>

</div>

<!--  PARTIE AVIS   -->

<div class="container">
    <div class="text-center">
        <h2>Avis des consommateurs sur ce produit</h2>
    </div>

    <div class="container">

        <?php foreach ($reviews as $review):?>
        <div class="row reviewBox">
            <div class="col-1 reviewUserPhoto">
            <?php 
            $image = $review['photo_user'];
            $chemin="assets/img/".$image;
            $img = "<img src = \"" . $chemin ."\" class =\"reviewImg\">";
            echo ($img);
            ?>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2 reviewUserName"><?= $review['name_user'] ?></div>
                    <div class="col"><?= "( ".$review['stars'] ." étoiles ) ". $review['title'] ?></div>
                </div>
                <div class="row">
                    <div class="col reviewDescription"><?= $review['description'] ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

</div>