<?php

session_start();
header("Cache-control: private");
header("Content-Type: text/html; charset=utf-8");

$g_default_language       = "en_us.php";
$g_ft_installation_folder = __DIR__;


// all session information for the installation script is stored in the $_SESSION["ft_install"] key
if (!isset($_SESSION["ft_install"])) {
	$_SESSION["ft_install"] = array();
}

// include the language file
if (!isset($_SESSION["ft_install"]["lang_file"])) {
	$_SESSION["ft_install"]["lang_file"] = $g_default_language;
}

$g_defer_init_page = true;
require_once("../global/library.php");
require_once("files/code.php");
require_once("files/sql.php");

// autoload all composer dependencies
require __DIR__ . '/../vendor/autoload.php';
// http://www.smarty.net/docs/en/api.set.plugins.dir.tpl


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$lang_file = ft_load_field("lang_file", "lang_file", $g_default_language, "ft_install");
include("../global/lang/{$_SESSION["ft_install"]["lang_file"]}");
