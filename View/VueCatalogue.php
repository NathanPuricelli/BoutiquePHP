<?php $this->titre = "Catalogue"; ?>


<div class="container catalogue">
    <div class="text-center">
        <h1>Qu'est-ce qui vous ferait plaisir ?</h1>
    </div>
    <div class="row">

    <?php foreach ($products as $product):?>

        <div class="col-lg-3 col-md-6">
            <div class="box">
                <a href="<?= "index.php?action=product&id=" . $product['id'] ?>">
                    <h3><?= $product['name'] ?></h3>
                </a>
                <?php $image = $product['image'];
                $chemin="assets/img/".$image;
                $img = "<img src = \"" . $chemin ."\" class =\"articleImg\">";
                echo ($img);?>
                <p><?= $product['description'] ?></p>
                <div class="smallLine"></div>
                <?php $price = $product['price'];
                echo("<h5>". $price . "€ </h5>");?>
                <div class="smallLine"></div>
                <button class="btn1" type="submit">Ajouter au panier</button>
            </div>
        </div>

    <?php endforeach; ?>

    </div>
</div>