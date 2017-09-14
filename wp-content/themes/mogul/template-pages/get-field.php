<?php
/**
 * 
 * Template name: Get field
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
        $field = "undefined";
        $page_ID = "undefined";
        if(isset($_GET['field'])){
            $field = $_GET['field'];
        }
        if(isset($_GET['page_ID'])){
            $page_ID = $_GET['page_ID'];
        }
        $get_field = get_post_meta( (int)$page_ID, $field, true );
        if ($get_field) {
          echo '<h2 class="field-title">'.$get_field.'</h2>';
        } else {
          echo '<p class="field-desc"> No results found</p>';
        }
        
        
      ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php

get_footer();

