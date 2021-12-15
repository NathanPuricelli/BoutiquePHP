<?php $this->titre = "Catalogue"; ?>



<?php foreach ($products as $product):
    ?>
    <h2>
        <header>
            <a href="<?= "index.php?action=product&id=" . $product['id'] ?>">
                <h1 class="titreBillet"><?= $product['name'] ?></h1>
            </a>
            <?php $image = $product['image'] ?>
            <?php 
            $chemin="assets/img/".$image;
            $img = "<img src = \"" . $chemin ."\"/>";
            echo ($img); 
            ?>
        </header>
    </h2>
    <hr />
<?php endforeach; ?>
