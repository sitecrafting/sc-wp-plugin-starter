<?php

/**
 * Base class for MultiCare integration test cases
 *
 * @copyright 2020 SiteCrafting, Inc.
 * @author    Coby Tamayo <ctamayo@sitecrafting.com>
 */

namespace MultiCare\Integration;

use Timber\Timber;
use WP_UnitTestCase;

use MultiCare\Post\Location;

/**
 * Base test class for the plugin. Declared abstract so that PHPUnit doesn't
 * complain about a lack of tests defined here.
 */
abstract class IntegrationTest extends WP_UnitTestCase {
  public function setUp() {
    parent::setUp();

    Location::register_type();
    Location::register_taxonomy('location_type');

    add_filter('timber/post/classmap', function(array $map) : array {
      return array_merge($map, [
        'location' => Location::class,
      ]);
    });
  }


  /**
   * Create a WP post with the given mcid and return its WP ID.
   */
  protected function create_post_with_mcid(int $mcid, array $data = []) : int {
    $id = $this->factory->post->create($data);

    update_post_meta($id, 'mcid', $mcid);

    return $id;
  }

  /**
   * Create a WP term with the given mcid and return its WP ID.
   */
  protected function create_term_with_mcid(int $mcid, array $data = []) : int {
    $id = $this->factory->term->create($data);

    update_term_meta($id, 'mcid', $mcid);

    return $id;
  }
}
