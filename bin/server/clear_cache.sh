#!/usr/bin/env bash

#Script directory
dir=$(CDPATH= cd -- "$(dirname -- "$0")" && pwd)

rm ${dir}/../../var/logs/dev.log;