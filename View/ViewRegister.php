<?php $this->titre = "Inscription"; ?>

<div class="container">
    <div class="text-center">
        <h1>Inscription</h1>
    </div>
    <div class="containerLogin">
        <form action="index.php?page=register" method='post'>
            <div class="form-group">
                <label for="inputUsername_register">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="register_form_username" placeholder="Votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="inputPassword_register">Mot de passe</label>
                <input type="password" class="form-control" name="register_form_password" placeholder="Votre mot de passe">
            </div>
            <div class="form-group">
                <label for="inputPasswordConfirmation_register">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" name="register_form_password_confirmation" placeholder="Confirmation">
            </div>
            <button class="btn1" type="submit" name='register-request'>S'inscrire</button>
        </form>
    </div>
</div>