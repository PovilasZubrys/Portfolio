#!/bin/sh

CYAN="\e[46m"
ENDCOLOR="\e[0m"

echo -e "${CYAN}Pulling from git${ENDCOLOR}"
git pull
echo -e "${CYAN}Updating composer${ENDCOLOR}"
./composer.phar update
#composer update
echo -e "${CYAN}Pushing new migrations to database${ENDCOLOR}"
php bin/console doctrine:migrations:migrate --no-interaction
