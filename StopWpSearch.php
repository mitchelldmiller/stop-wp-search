<?php
/**
 * Plugin Name: Block WP Search
 * Description: Block all WordPress Searches.
 * Version: 1.02
 * Author: Mitchell D. Miller
 * Author URI: https://mitchelldmiller.com/
 * Plugin URI: https://github.com/mitchelldmiller/block-wp-search
 * GitHub Plugin URI: https://github.com/mitchelldmiller/block-wp-search
 * License: MIT
 * License URI: https://github.com/mitchelldmiller/block-wp-search/blob/main/LICENSE
 */

/*
 * Block WP Search WordPress Plugin - Block all WordPress Searches.
 *
 * Copyright (C) 2022 Mitchell D. Miller
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
class BlockWpSearch {

    /**
     * Add init hook to intercept search requests.
     * @see https://developer.wordpress.org/reference/hooks/init/
     * @return BlockWpSearch
     */
    public static function no_searches_allowed() {
        $bs = new self();
        add_action('init', array($bs, 'block_searches'), 0, 0);
        return $bs;
    }

    /**
     * Block all searches. Redirect to /not_found/.
     * @todo Add option to change redirect.
     */
    public function block_searches() {
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
BlockWpSearch::no_searches_allowed();
