<?php $this->titre = "Connexion"; ?>




<div class="container">
    <div class="text-center">
        <h1>Connexion</h1>
    </div>
    <div class="containerLogin">
        <form action="index.php?page=login" method='POST'>
            <div class="form-group">
                <label for="inputUsername">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="login_form_username" placeholder="Votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="inputPassword">Mot de passe</label>
                <input type="password" class="form-control" id="login_form_password" placeholder="Votre mot de passe">
            </div>
            <button class="btn1" type="submit" name='login-request'>Se connecter</button>
        </form>
    </div>
</div>