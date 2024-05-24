<?php

namespace Plugo\Router;

require dirname(__DIR__, 2) . '/config/routes.php';

class Router {

	private $routes;
	private $availablePaths;
	private $requestedPath;

	public function __construct() {
		$this->routes = ROUTES;
		$this->availablePaths = array_keys($this->routes);
		$this->requestedPath = isset($_GET['path']) ? $_GET['path'] : '/';
		$this->parseRoutes();
	}

	private function parseRoutes(): void {
		$explodedRequestedPath = $this->explodePath($this->requestedPath);
		$params = [];

		foreach ($this->availablePaths as $candidatePath) {

			$foundMatch = true;
			$explodedCandidatePath = $this->explodePath($candidatePath);

			if (count($explodedCandidatePath) == count($explodedRequestedPath)) {
				foreach ($explodedRequestedPath as $key => $requestedPathPart) {
					$candidatePathPart = $explodedCandidatePath[$key];

					if ($this->isParam($candidatePathPart)) {
						$params[substr($candidatePathPart, 1, -1)] = $requestedPathPart;
					} else if ($candidatePathPart !== $requestedPathPart) {
						$foundMatch = false;
						break;
					}
				}

				if ($foundMatch) {
					$route = $this->routes[$candidatePath];
					break;
				}
			}
		}

		if (isset($route)) {
			$controller = new $route['controller'];
			$controller->{$route['method']}(...$params);
		}

	}

	private function explodePath(string $path): array {
		return explode("/", rtrim(ltrim($path, '/'), '/'));
	}

	private function isParam(string $candidatePathPart): bool {
		return str_contains($candidatePathPart, '{') && str_contains($candidatePathPart, '}');
	}

}
