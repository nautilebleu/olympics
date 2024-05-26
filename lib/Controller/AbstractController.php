<?php

namespace Plugo\Controller;

use App\Manager\UserManager;

abstract class AbstractController {
	private $sessionUser = null;

	public function __construct() {
		$this->isAuthenticated();
	}

	protected function isAuthenticated (): bool {
		if (isset($_SESSION) && isset($_SESSION['user_id'])) {
			$userManager = new UserManager();
			$this->sessionUser = $userManager->find($_SESSION['user_id']);
			if ($this->sessionUser) {
				// print('USER OK');
			}
		} else {
			print('NO SESSION');
		}
		return false;
	}

  protected function redirectToRoute(string $path, array $params = []): void {
		$uri = $_SERVER['SCRIPT_NAME'] . "?path=" . $path;

		if (!empty($params)) {
			$strParams = [];
			foreach ($params as $key => $val) {
				array_push($strParams, urlencode((string) $key) . '=' . urlencode((string) $val));
			}
			$uri .= '&' . implode('&', $strParams);
		}

		header("Location: " . $uri);
		die;
	}

	protected function renderView(string $template, array $data = []): string {
		if ($this->sessionUser) {
			$data['sessionUser'] = $this->sessionUser;
		}
		$templatePath = dirname(__DIR__, 2) . '/templates/' . $template;
		return require_once dirname(__DIR__, 2) . '/templates/layout.php';
	}

}
