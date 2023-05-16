#!/bin/sh

CYAN="\e[46m"
ENDCOLOR="\e[0m"

echo "${CYAN}Pulling from git${ENDCOLOR}"
git fetch origin master
git reset --hard origin/master
echo "${CYAN}Installing composer${ENDCOLOR}"
composer install
echo "${CYAN}Pushing new migrations to database${ENDCOLOR}"
php bin/console doctrine:migrations:migrate --no-interaction
echo "${CYAN}Clearing cache${ENDCOLOR}"
php bin/console cache:clear --env=prod