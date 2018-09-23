<?php

function imprimir($mensagem) {
	echo($mensagem."\n");
}


if( isset($argv[1]) && $argv[1] == "install" ) {
	imprimir("Gerando backup das configurações padrões...");
	system("cp -R /etc/apache2/ /servidor/apache2/");
	system("cp -R /etc/php/ /servidor/php/");
	imprimir("backup gerado.");
}  else {

	imprimir("Carregando arquivos de configuração...");

	$arquivosApache = new FilesystemIterator('/etc/apache2/', FilesystemIterator::SKIP_DOTS);
	if(iterator_count($arquivosApache) <= 0) {
		system("cp -R /servidor/apache2/* /etc/apache2/ ");
	}
	$arquivosApache = new FilesystemIterator('/etc/php/', FilesystemIterator::SKIP_DOTS);
	if(iterator_count($arquivosApache) <= 0) {
		system("cp -R /servidor/php/* /etc/php/ ");
	}

	imprimir("Arquivos carregados");

	system("/usr/sbin/apache2ctl -D FOREGROUND");
}
