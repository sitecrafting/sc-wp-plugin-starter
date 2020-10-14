#!/usr/bin/env bash

read -p 'Human Readable Project Name (e.g. "Jedi Academy"): ' HUMAN_NAME
read -p 'Short description (e.g. "It does a thing"): ' DESCRIPTION
read -p 'PHP Namespace (e.g. "JediAcademy"): ' NAMESPACE
read -p 'PHP Constant Name (e.g. "JEDI_ACADEMY"): ' CONST_NAME
read -p 'kebab-case-project-name (e.g. "jedi-academy"): ' KEBAB_NAME
read -p 'snake_case_project_name (e.g. "jedi_academy"): ' SNAKE_NAME

# Need to do description first, to avoid prematurely replacing "SC PLUGIN" instances
# that are actually part of "SC PLUGIN DESCRIPTION"
grep -rl --exclude-dir=.git "SC PLUGIN DESCRIPTION" . | while read f; do sed -i'' -e "s/SC PLUGIN DESCRIPTION/${DESCRIPTION}/" $f; done
grep -rl --exclude-dir=.git "SC PLUGIN" .             | while read f; do sed -i'' -e "s/SC PLUGIN/${HUMAN_NAME}/" $f; done
grep -rl --exclude-dir=.git "sc-plugin" .             | while read f; do sed -i'' -e "s/sc-plugin/${KEBAB_NAME}/" $f; done
grep -rl --exclude-dir=.git "sc_plugin" .             | while read f; do sed -i'' -e "s/sc_plugin/${SNAKE_NAME}/" $f; done
grep -rl --exclude-dir=.git "ScPlugin" .              | while read f; do sed -i'' -e "s/ScPlugin/${NAMESPACE}/" $f; done
grep -rl --exclude-dir=.git "SC_PLUGIN" .             | while read f; do sed -i'' -e "s/SC_PLUGIN/${CONST_NAME}/" $f; done

# There are some instances of certain names that occur twice in one line, so take care of those here.
# TODO is there an option to sed that does this?
grep -rl --exclude-dir=.git "sc-plugin" . | while read f; do sed -i'' -e "s/sc-plugin/${KEBAB_NAME}/" $f; done
grep -rl --exclude-dir=.git "ScPlugin" .  | while read f; do sed -i'' -e "s/ScPlugin/${NAMESPACE}/" $f; done
grep -rl --exclude-dir=.git "SC_PLUGIN" . | while read f; do sed -i'' -e "s/SC_PLUGIN/${CONST_NAME}/" $f; done

echo 'Initializing files...'
mv sc-plugin.php ${KEBAB_NAME}.php
mv assets/js/sc-plugin.js assets/js/${KEBAB_NAME}.js
mv assets/js/admin/sc-plugin-admin.js assets/js/admin/${KEBAB_NAME}-admin.js

# Delete this script and start a new Git repo
rm -rf $0
rm -rf .git
git init
