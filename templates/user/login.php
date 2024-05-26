<h1 class="title">Se connecter</h1>

<?php if (isset($_GET['state']) && $_GET['state'] == 'success') { ?>
  <div class="notification is-primary">
    <button class="delete"></button>
    Connexion réussie, vous pouvez désormais
    <a href="/public/index.php?path=epreuves">vous inscrire à des épreuves</a>
  </div>
<?php } ?>

<?php if (isset($data) && isset($data['errors'])) { ?>
  <div class="notification is-danger">
    <button class="delete"></button>
    <?php print($data['errors']) ?>
  </div>
<?php } ?>

<form method="post" target="?path=register">
  <div class="field">
    <label for="email" class="label">
      Votre email
    </label>
    <div class="control">
      <input class="input" type="email" name="email"
        placeholder="Votre email"
        value="<?php if (isset($_POST['email'])) {
          print($_POST['email']);
        } ?>"
      />
    </div>
  </div>
  <div class="field">
    <label for="password" class="label">
      Votre mot de passe
    </label>
    <div class="control">
      <input class="input" type="password" name="password"
        placeholder="Votre mot de passe"
      />
    </div>
  </div>
  <div class="field is-grouped">
    <div class="control">
      <button class="button is-primary"">Se connecter</button>
    </div>
  </div>
</form>
