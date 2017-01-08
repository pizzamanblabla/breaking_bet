#!/bin/bash

cronfile=`cat ./bin/server/cron/crontab.txt`
echo $cronfile >> tmp
crontab tmp
rm tmp