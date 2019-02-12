<?php
define('DS', DIRECTORY_SEPARATOR);
define('ENV', getenv('APP_ENV'));
define('VERSION', '0.12.7');
define('MIGRATION_NUMBER', 220);

define('PATH', __DIR__ . DS);
define('APP', PATH . 'anchor' . DS);
define('SYS', PATH . 'system' . DS);
define('EXT', '.php');

use System\config;
use System\input;
use System\request;
use System\router;
use System\session;

// Composer
/** @noinspection PhpIncludeInspection */
require PATH . 'vendor/autoload' . EXT;

// Boot the environment
/** @noinspection PhpIncludeInspection */
require SYS . 'boot' . EXT;

// Boot the application
/** @noinspection PhpIncludeInspection */
require APP . 'run' . EXT;

function ret_auth() {
	// Set input
	Input::detect(Request::method());

	// Load session config
	Session::setOptions(Config::get('session', []));

	// Read session data
	Session::start();

	$auth = user_authed();

	// Update session
	Session::close();

	return( $auth );
}
