<?php
/**
 * Plugin Name: Stop WP Search
 * Description: Stop users from searching your WordPress Website. Redirect search requests.
 * Version: 1.03
 * Author: Mitchell D. Miller
 * Author URI: https://mitchelldmiller.com/
 * Plugin URI: https://github.com/mitchelldmiller/stop-wp-search
 * GitHub Plugin URI: https://github.com/mitchelldmiller/stop-wp-search
 * License: MIT
 * License URI: https://github.com/mitchelldmiller/stop-wp-search/blob/main/LICENSE
 */

/*
 * Stop WP Search - WordPress Plugin - Redirect all WordPress Searches.
 * Formerly Block WP Search.
 *
 * Copyright (C) 2022-2023 Mitchell D. Miller
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
*/
class StopWpSearch {

    /**
     * Add init hook to intercept search requests.
     * @see https://developer.wordpress.org/reference/hooks/init/
     * @return StopWpSearch
     */
    public static function no_searches_allowed() {
        $bs = new self();
        add_action('init', array($bs, 'stop_searches'), 0, 0);
        return $bs;
    }

    /**
     * Block all searches. Redirect to /not_found/.
     * @todo Add option to change redirect.
     */
    public function stop_searches() {
        if (defined( 'WP_CLI' ) && WP_CLI) {
            return;
        }
        if (empty($_SERVER['REQUEST_URI']) || empty($_SERVER['REQUEST_METHOD'])) {
            return;
        }
        if (strstr($_SERVER['REQUEST_URI'], '/wp-admin/') || $_SERVER['REQUEST_METHOD'] != 'GET') {
            return;
        } // end if

        if (isset($_GET['s'])) {
            wp_safe_redirect('/not_found/', 307);
            exit;
        }
        return;
    }

    /**
     * Not used here.
     */
    public function __construct() { }

}
StopWpSearch::no_searches_allowed();
