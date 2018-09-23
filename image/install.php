<?php

function imprimir($mensagem) {
	$msg = date('Y-m-d H:i:s - ').$mensagem."\n";
	echo($msg);
	file_put_contents('/var/log/apache2/docker.php',$msg,FILE_APPEND);
}


if( isset($argv[1]) && $argv[1] == "install" ) {
	imprimir("Copy backup default config files...");
	system("cp -R /etc/apache2/ /servidor/apache2/");
	system("cp -R /etc/php/ /servidor/php/");
	imprimir("backup copied.");
}  else {

	imprimir("Loading config files...");

	$arquivosApache = new FilesystemIterator('/etc/apache2/', FilesystemIterator::SKIP_DOTS);
	if(iterator_count($arquivosApache) <= 1) {
		system("cp -R /servidor/apache2/* /etc/apache2/ ");
	}
	$arquivosApache = new FilesystemIterator('/etc/php/', FilesystemIterator::SKIP_DOTS);
	if(iterator_count($arquivosApache) <= 1) {
		system("cp -R /servidor/php/* /etc/php/ ");
	}

	imprimir("Files loaded");

	system("/usr/sbin/apache2ctl -D FOREGROUND");
}

