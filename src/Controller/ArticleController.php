<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use Olympics\Controller\AbstractController;

class ArticleController extends AbstractController {

	public function index() {
    $articleManager = new ArticleManager();
    $articles = $articleManager->findAll();
		// for ($i = 0; $i < count($articles); $i++) {
		// 	print($articles[$i]->getTitle());
		// }
		return $this->renderView('article/index.php', [
			'articles' => $articles
		]);
	}

}
