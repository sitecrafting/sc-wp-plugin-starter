#!/usr/bin/env bash

read -p 'Human Readable Project Name (e.g. "Jedi Academy"): ' HUMAN_NAME
read -p 'kebab-case-project-name (e.g. "jedi-academy"): ' KEBAB_NAME

grep -rl "$HUMAN_NAME" . | while read f; do echo sed -i'' -e "s/sc-plugin/${HUMAN_NAME}" $f; done
grep -rl "$KEBAB_NAME" . | while read f; do echo sed -i'' -e "s/sc-plugin/${KEBAB_NAME}" $f; done

mv sc-plugin.php ${KEBAB_NAME}.php
