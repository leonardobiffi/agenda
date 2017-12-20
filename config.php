<?php

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/');

/** caminho do arquivo de banco de dados **/
if ( !defined('DB_PATH') )
	define('DB_PATH', ABSPATH . 'include/database.php');

/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'include/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'include/footer.php');