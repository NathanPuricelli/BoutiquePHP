<?php $this->titre = $product['name']." | Infos"; ?>




<!-- PARTIE PRODUIT -->

<div class="container">
    <div class="row productBox">
        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-6 productImgSection">
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
        <div class="col-md-4 col-sm-12 productBuyingSection">
                <h3><?= $product['name'] ?></h3>
                <h5>Prix : <?= $product['price'] ?>€</h5>
                <p>Quantité disponible : <span class="quantityAvailable"><?= $product['quantity'] ?></span></p>
                <?php if ($product['quantity'] != 0):?>
                    <p>Combien en voulez-vous ?</p>
                    <p>
                        <!-- Sortir les boutons de la classe à modifier ou ajouter un span autour du 1-->
                        <button class="btn2 counterMinus" type="submit">-</button>
                        <span class="counterSection">1</span>
                        <button class="btn2 counterPlus" type="submit">+</button>
                    </p>
                    <button class="btn1" type="submit">Ajouter au panier</button>
                <?php else: ?>
                    <h5 class="unavailableProductText">Article en rupture de stock</h5>
                <?php endif; ?>
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

    <div class = "container">
        <?php echo $errormessage;
        echo ("<form action=\"index.php?page=product&id=".$product['id']." \" method='POST'"); ?>
        <label for='review_form_name_user'>Nom :</label>
        <input type='text' id = 'review_form_name_user' name = 'review_form_name_user'/>
        <br>
        <p>Sexe : </p>
        <input type="radio" name = "review_form_photo_user" id = "review_form_photo_user_male" value="homme.jpg" checked>
        <label for="review_form_photo_user_male">Homme</label>
        <input type="radio" name = "review_form_photo_user" id = "review_form_photo_user_female" value="femme.png">
        <label for="review_form_photo_user_female">Femme</label>
        <br>
        <p>Note /5 :</p>
        <input type="radio" name = "review_form_stars" id = "review_form_stars_0" value="0" checked>
        <label for="review_form_stars_male">0</label>
        <input type="radio" name = "review_form_stars" id = "review_form_stars_1" value="1">
        <label for="review_form_stars_male">1</label>
        <input type="radio" name = "review_form_stars" id = "review_form_stars_2" value="2">
        <label for="review_form_stars_male">2</label>
        <input type="radio" name = "review_form_stars" id = "review_form_stars_3" value="3">
        <label for="review_form_stars_male">3</label>
        <input type="radio" name = "review_form_stars" id = "review_form_stars_4" value="4">
        <label for="review_form_stars_male">4</label>
        <input type="radio" name = "review_form_stars" id = "review_form_stars_5" value="5">
        <label for="review_form_stars_male">5</label>
        <br>
        <label for='form_name_title'>Titre :</label>
        <input type='text' id = 'review_form_title' name = 'review_form_title'/>
        <br>
        <label for='review_form_description'>Description :</label>
        <textarea name='review_form_description' id='review_form_description' rows='4' cols='50'></textarea>
        <br>


        <input type = 'submit' name = 'confirm-review' value="poster">

        </form>

    </div>

</div>

<script type="text/javascript" src="assets/js/productCounter.js"></script>