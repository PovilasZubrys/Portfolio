#!/bin/sh

CYAN="\e[46m"
ENDCOLOR="\e[0m"

echo -e "${CYAN}Pulling from git${ENDCOLOR}"
git fetch origin master
git reset --hard origin/master
git clean -fdx
echo -e "${CYAN}Updating composer${ENDCOLOR}"
./composer.phar update
#composer update
echo -e "${CYAN}Pushing new migrations to database${ENDCOLOR}"
php bin/console doctrine:migrations:migrate --no-interaction
