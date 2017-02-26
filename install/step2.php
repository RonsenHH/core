<?php

require_once("library.php");

// check valid PHP Version
$valid_php_version = (version_compare(phpversion(), $g_required_php_version, ">="));

// check PDO and PDO-MYSQL is available
$pdo_available = extension_loaded('PDO');
$pdo_mysql_available = extension_loaded('pdo_mysql');

// folder permissions
$upload_folder_writable            = is_writable(realpath("$g_ft_installation_folder/../upload"));
$default_theme_cache_dir_writable  = is_writable(realpath("$g_ft_installation_folder/../themes/default/cache"));
$core_field_types_module_available = ft_install_check_module_available("core_field_types");

$page_vars = array();
$page_vars["step"] = 2;
$page_vars["valid_php_version"] = $valid_php_version;
$page_vars["pdo_available"] = $pdo_available;
$page_vars["pdo_mysql_available"] = $pdo_mysql_available;
$page_vars["suhosin_loaded"] = extension_loaded("suhosin");
$page_vars["sessions_loaded"] = extension_loaded("session");
//$page_vars["overridden_invalid_db_version"] = $overridden_invalid_db_version;
$page_vars["phpversion"] = phpversion();
//$page_vars["mysql_get_client_info"] = mysql_get_client_info();
$page_vars["upload_folder_writable"]  = $upload_folder_writable;
$page_vars["default_theme_cache_dir_writable"]  = $default_theme_cache_dir_writable;
$page_vars["core_field_types_module_available"] = $core_field_types_module_available;
$page_vars["js_messages"] = array(
	"word_error", "validation_incomplete_license_keys", "notify_invalid_license_keys",
	"word_close", "word_invalid", "word_verified", "word_continue"
);

ft_install_display_page("templates/step2.tpl", $page_vars);
