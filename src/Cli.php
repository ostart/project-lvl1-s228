<?php
	namespace BrainGames\Cli;

	$autoloadPath = __DIR__ . '/../vendor/autoload.php';

	if (file_exists($autoloadPath)) {
		require_once $autoloadPath;
	}

	use function \cli\line;

	function run() {
		line('Welcome to the Brain Game!');
		$name = \cli\prompt('May I have your name?');
		line("Hello, %s!", $name);
	}
