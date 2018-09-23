#!/bin/bash

DPM_BASEDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


if [ ! -x "$(command -v php)" ]; then
	alias php='docker run -ti --rm --name codephp -v "$PWD":/servidor/tmp -w /servidor/tmp  php:7.1 php'
fi

if [ ! -x "$(command -v composer)" ]; then
	function composer() {
		docker-compose -f $DPM_BASEDIR/docker-compose.yml exec php71 /servidor/composer.phar "$@"
	}
	
fi

alias bash_php="docker-compose -f $DPM_BASEDIR/docker-compose.yml exec php71 bash"
alias bash_mysql="docker-compose -f $DPM_BASEDIR/docker-compose.yml exec db bash"
