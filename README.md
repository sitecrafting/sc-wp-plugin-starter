# SC PLUGIN

Starter WordPress plugin project.

To get started, clone this repo and run the project startup project script:

```sh
git clone git@github.com:sitecrafting/sc-wp-plugin-starter.git your-new-project
cd your-new-project
bin/project-setup.sh
```

This script will:
* prompt you for the project name in a couple different formats
* do a find/replace in the codebase to rename it
* rename the plugin entrypoint file (from `sc-plugin.php`)

Finally, the script will delete itself and start a fresh Git repo in the current directory.

After you delete this README section, fill in the blanks to describe what your plugin does.

---

TODO describe what this plugin is for

## Installation

TODO

## Actions & Filters

TODO

## Development

Clone this repo and start the dev environment using Lando:

```sh
lando start
```

## Testing

```sh
lando unit # run unit tests
lando integration # run integration tests
lando test # run all tests
```
