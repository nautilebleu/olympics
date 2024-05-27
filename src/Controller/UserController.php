<?php

namespace App\Controller;

use Olympics\Controller\AbstractController;

use App\Entity\User;
use App\Manager\UserManager;

class UserController extends AbstractController {
	private $userManager;

	public function __construct() {
		parent::__construct();
		$this->userManager = new UserManager();
	}

	private function validateLogin() {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			return [
				'isValid' => false,
				'errors' => 'L\'email n\'est pas valide'
			];
		}
		else {
			$user = $this->userManager->findOneBy([
				'email' => $_POST['email']
			]);
			if (!$user) {
				return [
					'isValid' => false,
					'errors' => 'L\'utilisateur est inconnu'
				];
			} else if (!password_verify($_POST['password'], $user->getPassword())) {
				return [
					'isValid' => false,
					'errors' => 'Le mot de passe est incorrect'
				];
			}
		}
		return [
			'isValid' => true,
			'errors' => null
		];
	}

	private function validateRegister() {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			return [
				'isValid' => false,
				'errors' => 'L\'email n\'est pas valide'
			];
		}
		if ($_POST['password1'] !== $_POST['password2']) {
			return [
				'isValid' => false,
				'errors' => 'Les mots de passe ne correspondent pas'
			];
		}
		$user = $this->userManager->findOneBy([
			'email' => $_POST['email']
		]);
		if ($user) {
			return [
				'isValid' => false,
				'errors' => 'Un utilisateur avec le même email existe déjà'
			];
		}

		return [
			'isValid' => true,
			'errors' => null
		];
	}

	public function login() {
		$data = [];
		if ($_POST) {
			$validation = $this->validateLogin();
			if ($validation['isValid'] === true) {
				$user = $this->userManager->findOneBy([
					'email' => $_POST['email']
				]);
				$_SESSION['user_id'] = $user->getId();
				return $this->redirectToRoute('login', ['state' => 'success']);
			} else {
				$data = [
					'errors' => $validation['errors']
				];
			}
		}
		return $this->renderView('user/login.php', $data);
	}

  public function register() {
		$data = [];
		if ($_POST) {
			$validation = $this->validateRegister();
			if ($validation['isValid'] === true) {
				$user = new User();
				$user->setFullname($_POST['fullname']);
				$user->setEmail($_POST['email']);
				$user->setPassword($_POST['password1']);

				$res = $this->userManager->add($user);
				return $this->redirectToRoute('register', ['state' => 'success']);
			} else {
				$data = [
					'errors' => $validation['errors']
				];
			}
		}
		return $this->renderView('user/register.php', $data);
	}

  // public function contact() {
	// 	// Imaginons ici traiter la soumission d'un formulaire de contact et envoyer un mail...
	// 	return $this->redirectToRoute('home', ['state' => 'success']);
	// }
}