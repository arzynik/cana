<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors',true);
putenv('PHPUNIT=1');

if (trim(`whoami`) == 'arzynik') {
	ini_set('mysqli.default_socket','/Applications/MAMP/tmp/mysql/mysql.sock');
}

class Cana_Test extends PHPUnit_Framework_TestCase {
	public function ob($start = true) {
		if (!$this->useOb) {
			return;
		}
		if ($start) {
			ob_clean();
			ob_start();
		} else {
			$check = ob_get_contents();
			if (!$this->useOb) {
				ob_end_flush();
			} else {
				ob_end_clean();
			}

			return $check;
		}
	}
}


require_once __DIR__ . '/app/app.php';

