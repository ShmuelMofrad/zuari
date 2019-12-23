#!/bin/sh
# This file make clean deploy directory for test and deploy on wordpress.
rm -R deploy
mkdir deploy
cp -r *.php style.css phpcs.xml.dist ./inc ./js ./template-parts/ -t ./deploy
rm ./deploy/template-parts/*.scss