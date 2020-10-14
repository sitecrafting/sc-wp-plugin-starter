#!/usr/bin/env bash

read -p 'Human Readable Project Name (e.g. "Jedi Academy"): ' HUMAN_NAME
read -p 'Short description (e.g. "It does a thing"): ' DESCRIPTION
read -p 'PHP Namespace (e.g. "JediAcademy"): ' NAMESPACE
read -p 'PHP Constant Name (e.g. "JEDI_ACADEMY"): ' CONST_NAME
read -p 'kebab-case-project-name (e.g. "jedi-academy"): ' KEBAB_NAME
read -p 'snake_case_project_name (e.g. "jedi_academy"): ' SNAKE_NAME

grep -rl --exclude-dir=.git "$HUMAN_NAME" . | while read f; do echo sed -i'' -e "s/sc-plugin/${HUMAN_NAME}" $f; done
grep -rl --exclude-dir=.git "$DESCRIPTION" . | while read f; do echo sed -i'' -e "s/SC PLUGIN DESCRIPTION/${DESCRIPTION}" $f; done
grep -rl --exclude-dir=.git "$NAMESPACE" . | while read f; do echo sed -i'' -e "s/ScPlugin/${NAMESPACE}" $f; done
grep -rl --exclude-dir=.git "$CONST_NAME" . | while read f; do echo sed -i'' -e "s/SC_PLUGIN/${CONST_NAME}" $f; done
grep -rl --exclude-dir=.git "$KEBAB_NAME" . | while read f; do echo sed -i'' -e "s/sc-plugin/${KEBAB_NAME}" $f; done
grep -rl --exclude-dir=.git "$SNAKE_NAME" . | while read f; do echo sed -i'' -e "s/sc_plugin/${SNAKE_NAME}" $f; done

# There are some instances of CONST_NAME and NAMESPACE that occur twice in one line, so take care of those here.
grep -rl --exclude-dir=.git "$CONST_NAME" . | while read f; do echo sed -i'' -e "s/SC_PLUGIN/${CONST_NAME}" $f; done
grep -rl --exclude-dir=.git "$NAMESPACE" . | while read f; do echo sed -i'' -e "s/ScPlugin/${NAMESPACE}" $f; done

echo 'Initializing files...'
echo mv sc-plugin.php ${KEBAB_NAME}.php
echo mv assets/js/sc-plugin.js assets/js/${KEBAB_NAME}.js
echo mv assets/js/admin/sc-plugin-admin.js assets/js/admin/${KEBAB_NAME}-admin.js
