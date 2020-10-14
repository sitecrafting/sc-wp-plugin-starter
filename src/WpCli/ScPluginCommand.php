<?php

/**
 * ScPlugin\WpCli\ScPluginCommand class
 *
 * @copyright 2020 SiteCrafting, Inc.
 * @author    Coby Tamayo <ctamayo@sitecrafting.com>
 */

namespace ScPlugin\WpCli;

use WP_CLI;

/**
 * Class for implementing all WP-CLI `sc-plugin` subcommands.
 */
class ScPluginCommand {
  /**
   * DO A THING
   *
   * ## OPTIONS
   *
   * <arg>
   * : Describe your arg here
   *
   * [--option=<option>]
   * : Describe your option
   * ---
   * default: 100
   * ---
   *
   * [--flag]
   * : Describe your flag
   * ---
   *
   * ## EXAMPLES
   *
   *     wp sc-plugin thing abc
   *     wp sc-plugin thing --option=foo xyz
   *     wp sc-plugin thing --flag blah
   *
   * @subcommand thing
   * @when after_wp_load
   */
  public function thing(array $args, array $options) {
    WP_CLI::success(sprintf('You passed: %s', $args[0]));
  }
}
