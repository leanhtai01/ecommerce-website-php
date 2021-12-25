#!/usr/bin/env bash

set -e

mysql -u root -p123 < ecommerce_db.sql
mysql -u root -p123 < sample_data.sql
