<header>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/public/">
      Olympics
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <!-- a class="navbar-item">
        Home
      </a-->

      <?php if (isset($data['sessionUser']) && $data['sessionUser']->getRole() === 'organisateur') { ?>
        <a class="navbar-item" href="admin">
          Créer des épreuves
        </a >
      <?php } ?>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
				Epreuves
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            Par sport
          </a>
          <a class="navbar-item is-selected">
            Par date
          </a>
          <a class="navbar-item">
            Par lieu
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php if (isset($data['sessionUser'])) { ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a href="" class="navbar-link" >
                <?php print($data['sessionUser']->getFullname()); ?>
              </a>

              <div class="navbar-dropdown">
                <a class="navbar-item">
                  Mon compte
                </a>
                <a class="navbar-item">
                  Changer de mot de passe
                </a>
                <a class="navbar-item">
                  Déconnexion
                </a>
              </div>
            </div>
          <?php } else { ?>
            <a class="button is-primary" href="/public/index.php?path=register">
              <strong>Enregistrement</strong>
            </a>
            <a class="button is-light" href="/public/index.php?path=login">
              Connexion
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</nav>
</header>
