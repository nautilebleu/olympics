<h1 class="title">S'enregistrer</h1>

<?php if (isset($_GET['state']) && $_GET['state'] == 'success') { ?>
  <div class="notification is-primary">
    <button class="delete"></button>
    Enregistrement réussi, vous pouvez désormais
    <a href="/public/index.php?path=login">vous connecter</a>
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
    <label for="fullname" class="label">
      Votre nom
    </label>
    <div class="control">
      <input class="input" type="text" name="fullname"
        placeholder="Votre nom"
        value="<?php if (isset($_POST['fullname'])) {
          print($_POST['fullname']);
        } ?>"
      />
    </div>
  </div>
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
    <label for="password1" class="label">
      Votre mot de passe
    </label>
    <div class="control">
      <input class="input" type="password" name="password1"
        placeholder="Votre mot de passe"
      />
    </div>
  </div>
  <div class="field">
    <label for="password2"class="label">
      Répéter votre mot de passe
    </label>
    <div class="control">
      <input class="input" type="password" name="password2"
        placeholder="Répéter votre mot de passe"
      />
    </div>
  </div>
  <div class="field is-grouped">
    <div class="control">
      <button class="button is-primary"">S'enregistrer</button>
    </div>
  </div>
</form>
