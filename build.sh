#!/bin/sh

CYAN="\e[46m"
ENDCOLOR="\e[0m"

echo -e "${CYAN}Pulling from git${ENDCOLOR}"
git fetch origin master
git reset --hard origin/master
echo -e "${CYAN}Installing composer${ENDCOLOR}"
composer install
echo -e "${CYAN}Pushing new migrations to database${ENDCOLOR}"
php bin/console doctrine:migrations:migrate --no-interaction
echo -e "${CYAN}Clearing cache${ENDCOLOR}"
php bin/console cache:clear --env=prod