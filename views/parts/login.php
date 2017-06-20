<section>
    <h2>Connexion</h2>
    <form action="index.php" method="post">
        <label for="email" class="form__label">Votre email</label>
        <input id="email" name="email" type="email" class="form__input" placeholder="jeanvaljean@mail.com" required="required">

        <label for="password" class="form__label">Votre mot de passe</label>
        <input id="password" name="password" type="password" class="form__input" required="required">

        <input type="hidden" name="resource" value="Auth">
        <input type="hidden" name="action" value="postLogin">

        <button type="submit">Se connecter</button>
    </form>
</section>
