# Dpm-server (Docker, PHP and MySQL)
___
**This project was tested on `ubuntu 18.04`**
## Introdution

A simple way to create a development enviroment with **D**ocker  to  build applications with **P**HP7.1, apache and **M**ySql 8.0.

## Requirements
You must have installed `docker` and `docker-compose`

## How to use
You need open file `docker-compose.yml` and change enviroment `MYSQL_ROOT_PASSWORD` to set the password of database. After this, execute this command in the directory of the project:

> docker-compose up

If you desire keep up after restart the host, you need change the file `docker-compose.yml` to add [`restart`](https://docs.docker.com/compose/compose-file/#restart) configuration in the services.

The project include the file `alias.sh`, that include some aliases to simple your life. The alias are:

| Plugin | README |
| ------ | ------ |
| php | A alias to command php inside image, but before set this alias, the bash script check if a php command exist in the host |
| bash_php | Access bash of container php, possibility change some configurations |
| bash_mysql | Access bash of container mysql, possibility change some configurations |

To use this alias you need execute this command:

> source alias.sh

To keep this alias after restart, you need append this command in your `.bashrc`, change the path file, or exeute this command in the project directory:

> echo "source ${PWD}/alias.sh" >> ~/.bashrc


