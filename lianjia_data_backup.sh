#!/bin/bash
# @hequan
# 备份链家网的数据

cd /data/htdocs/lianjia_data/
datetime=`date +"%Y-%m-%d"`
/usr/local/mysql/bin/mysqldump --single-transaction -l --databases lianjia >  backup/lianjia_${datetime}.sql -h 127.0.0.1 -u root -p123456

git add .
git commit -a -m "backup sql ${datetime}"
git push
