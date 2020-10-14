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
* rename the plugin entrypoint file (from `sc-plugin.php`) and various other files

The script will then prompt you to delete itself and start a fresh Git repo in the current directory.

At that point, you can start your plugin dev environment:

```sh
lando start
```

Now you're ready to delete this README section, fill in the blanks to describe what your plugin does, and then make it so. Happy hacking!

---

SC PLUGIN DESCRIPTION

## Installation

TODO

## Actions & Filters

TODO

## Customization

Override template files from your theme by placing them in a directory called `sc-plugin`.

## Command Line Interface (CLI)

SC PLUGIN comes with some custom WP-CLI tooling:

```sh
wp sc-plugin
```

(In the dev environment, prefix this with `lando` to run it inside Lando!)

## REST Endpoints

Defines the endpoint at `/wp-json/sc-plugin/v1/thing/:id` (in `src/Rest/RestController.php`).

## Development

Clone this repo and start the dev environment using Lando:

```sh
lando start
```

NOTE: you may need to flush permalinks manually (Settings > Permalinks) for sub-pages to work.

## Testing

```sh
lando unit # run unit tests
lando integration # run integration tests
lando test # run all tests
```

This code was generated from the [SC WP Plugin Starter](https://github.com/sitecrafting/sc-wp-plugin-starter) project.
