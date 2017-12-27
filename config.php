<?php

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/agenda/');

/** caminho do arquivo de banco de dados **/
if ( !defined('DB_PATH') )
	define('DB_PATH', ABSPATH . 'include/database.php');

/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'include/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'include/footer.php');

function datetimeNow() {

	/* Fuso Horario padrão Campo_Grande | Horario de Verão Sao_Paulo*/
	$now = date_create('now', new DateTimeZone('America/Campo_Grande'));
	return $now->format("Y-m-d H:i:s");
}