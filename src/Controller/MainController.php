<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;

class MainController extends AbstractController {
  public function home() {
		return $this->renderView('main/home.php', ['title' => 'Accueil']);
	}

  public function contact() {
		// Imaginons ici traiter la soumission d'un formulaire de contact et envoyer un mail...
		return $this->redirectToRoute('home', ['state' => 'success']);
	}
}