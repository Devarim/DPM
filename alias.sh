#!/bin/sh

BASEDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

echo "$BASEDIR";

if(![ -x "$(command -v php)" ])
	alias php='docker run -ti --rm --name codephp -v "$PWD":/servidor/tmp -w /servidor/tmp  php:7.1 php'

alias bash_php="docker-compose -f $BASEDIR/docker-compose.yml exec php71 bash"
alias bash_mysql="docker-compose -f $BASEDIR/docker-compose.yml exec db bash"

