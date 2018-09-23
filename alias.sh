#!/bin/bash

BASEDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


if [ ! -x "$(command -v php)" ]; then
	alias php='docker run -ti --rm --name codephp -v "$PWD":/servidor/tmp -w /servidor/tmp  php:7.1 php'
fi

if [ ! -x "$(command -v composer)" ]; then
	function composer() {
		docker run -ti --rm --name codephp -v "$PWD":/servidor/tmp -w /servidor/tmp  php:7.1 php /servidor/composer.phar "$1-"
	}
	
fi

alias bash_php="docker-compose -f $BASEDIR/docker-compose.yml exec php71 bash"
alias bash_mysql="docker-compose -f $BASEDIR/docker-compose.yml exec db bash"
