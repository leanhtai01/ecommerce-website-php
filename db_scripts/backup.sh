#!/usr/bin/env bash

set -e

mysqldump -u root -p123 --no-create-info ecommerce_db > sample_data.sql
sed -i "1 i USE ecommerce_db;\n" sample_data.sql
