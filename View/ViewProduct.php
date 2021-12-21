<?php $this->titre = "Product"; ?>


<div class="container catalogue">
    <div class="text-center">
        <h1><?= $product['name']?> ?</h1>
    </div>
    <div class="row">

    <?php foreach ($reviews as $review):?>

        <div class="col-lg-3 col-md-6">
            <div class="box">
                <a href="<?= "index.php?page=product&id=" . $product['id'] ?>">
                    <h3><?= $review['name_user'] ?></h3>
                </a>
                <p><?= $review['description'] ?></p>
                <!--<?php $image = $product['image'];
                $chemin="assets/img/".$image;
                $img = "<img src = \"" . $chemin ."\" class =\"articleImg\">";
                echo ($img);?>
                <p><?= $product['description'] ?></p>
                <div class="smallLine"></div>
                <?php $price = $product['price'];
                echo("<h5>". $price . "€ </h5>");?>
                <div class="smallLine"></div>
                <button class="btn1" type="submit">Ajouter au panier</button> -->
            </div>
        </div>

    <?php endforeach; ?>

    </div>
</div>