<?php
/**
 * 
 * Template name: Get meta key
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */

get_header(); ?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main services">
      <p class="field-desc"><?php the_field('description'); ?> </p>
      <?php
        $meta_key = "undefined";
        $page_ID = "undefined";
        if(isset($_GET['meta_key'])){
            $meta_key = $_GET['meta_key'];
        }
        if(isset($_GET['page_ID'])){
            $page_ID = $_GET['page_ID'];
        }
        global $wpdb;
        $get_meta = $wpdb->get_row( "SELECT `meta_value` FROM $wpdb->postmeta WHERE  `meta_key`='$meta_key'  AND `post_id`='$page_ID'", ARRAY_A ); 
        if ($get_meta['meta_value']) {
          echo '<h2 class="field-title">'.$get_meta['meta_value'].'</h2>';
        } else {
          echo '<p class="field-desc"> No results found</p>';
        }
      ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

