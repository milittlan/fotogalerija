<?php

// Definisanje putanja

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', DS.'home'.DS.'milanbildhosting'.DS.'public_html'.DS.'php'.DS.'photo_gallery');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// Ucitavanje config-a - konekcija sa bazom
require_once(LIB_PATH.DS.'config.php');

// Ucitavanje funkcija
require_once(LIB_PATH.DS.'functions.php');

// Ucitavanje objects-a //
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'pagination.php');

// Ucitavanje objects-a //
require_once(LIB_PATH.DS.'user.php');
require_once(LIB_PATH.DS.'photograph.php');
require_once(LIB_PATH.DS.'comment.php');

?>