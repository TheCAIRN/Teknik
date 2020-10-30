#!/bin/sh

mysql -u root -p < dbinit.sql
mysql =u root -p teknik < country.sql
mysql -u root -p teknik < language.sql

