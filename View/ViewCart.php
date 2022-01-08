<?php $this->title = "Panier"; ?>
<!-- PARTIE PANIER -->

<div class="container">
<?php foreach ($products as $product):?>

<div class="col-lg-3 col-md-6">
    <div class="catalogBox">
        <a href="<?= "index.php?page=product&id=" . $product['id'] ?>">
        <div class="clickableBox">
            <h3><?= $product['name'] ?></h3>
            
            <?php 
            $image = $product['image'];
            $chemin="assets/img/".$image;
            $img = "<img src = \"" . $chemin ."\" class =\"articleImg\">";
            echo ($img);
            ?>
            
            <p><?= $product['description'] ?></p>
            <div class="smallLine"></div>
            <?php $price = $product['price'];
            echo("<h5>". $price . "€ </h5>");?>
            <div class="smallLine"></div>
        </div>
        </a>
        <button class="btn1" type="submit">Ajouter au panier</button>
    </div>
</div>
<?php endforeach; ?>

</div>

<!--  PARTIE ACHAT   -->

<div class="container">


</div>
