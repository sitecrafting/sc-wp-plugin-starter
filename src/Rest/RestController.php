<?php

/**
 * ScPlugin\Rest\RestController class
 *
 * @copyright 2020 SiteCrafting, Inc.
 * @author    Coby Tamayo <ctamayo@sitecrafting.com>
 */

namespace ScPlugin\Rest;

use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

/**
 * Base controller for SC PLUGIN REST API integration
 */
class RestController {
  const API_NAMESPACE = 'sc-plugin/v1';

  public function register_routes() {
    register_rest_route(static::API_NAMESPACE, '/stuff', [
      'methods' => 'GET',
      'callback' => [$this, 'stuff_action'],
    ]);
  }

  public function stuff_action(WP_REST_Request $request) : WP_REST_Response {
    if (empty($_GET['thing'])) {
      return new WP_REST_Response([
        'success' => false,
        'data'    => [],
        'error'   => 'The `thing` GET parameter is required',
      ], 400);
    }

    $response = [
      'success'      => true,
      'data'         => [
        'your_thing' => $_GET['thing'],
      ],
    ];

    // Return the thing
    return new WP_REST_Response($response);
  }
}
