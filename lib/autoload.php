<?php
session_start();

const ALIASES = [
	'Olympics' => 'lib',
	'App' => 'src'
];

spl_autoload_register(function (string $class): void {

	$namespaceParts = explode('\\', $class);

	if (in_array($namespaceParts[0], array_keys(ALIASES))) {
		$namespaceParts[0] = ALIASES[$namespaceParts[0]];
	} else {
		throw new Exception('Namespace « ' . $namespaceParts[0] . ' » invalide. Un namespace doit commencer par : « Olympics » ou « App »');
	}

	$filepath = dirname(__DIR__) . '/' . implode('/', $namespaceParts) . '.php';
	if (!file_exists($filepath)) {
		throw new Exception("Fichier « " . $filepath . " » introuvable pour la classe « " . $class . " ». Vérifier le chemin, le nom de la classe ou le namespace");
	}
	require $filepath;

});
