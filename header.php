<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title><?php bloginfo( 'name' ) ?></title>
    <meta name="title" content="<?php bloginfo( 'name' ) ?>">
    <meta name="description" content="<?php bloginfo( 'description' ) ?>">
    <!-- <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="C:/Users/Viktorija/Desktop/mano projektas/assets/icons/style.css"> -->
    <?php wp_head(); ?>
  </head>
    <body>
      <header class="header">
          <div class="header-container flex-container">
            <div class="logo">
              <?php
                $image_id = get_field('logo', 15);
                $image_url = wp_get_attachment_image_src( $image_id, 'logo' );
                ?>
                <img src="<?= $image_url[0] ?>" alt="logo">
            </div>
            <div class="menu flex-container">
              <div class="topnav" id="myTopnav">
                <?php
        					$menu = wp_nav_menu( array(
        						'theme_location'					=> 'top-menu',
        						'echo'										=> false
        					) );
        					     echo strip_tags($menu, '<a><nav>');
        					?>
                <a href="javascript:void(0);" style="font-size:30px;" class="icon" onclick="myFunction()">&#9776;</a>
              </div>
            </div>
          </div>
            <?php
              $image_id = get_field('banner_image', 15);
              $image_url = wp_get_attachment_image_src( $image_id, 'banner_image' );
              ?>
        <section class="banner-section" style="background-image: url('<?= $image_url[0] ?>');">
          <div class="banner-background">
            <p><?php the_field( 'web-heading', 15 ) ?></p>
          </div>
          <div class="banner-button">
            <button type="button"><?php the_field( 'heading_button', 15 ) ?></button>
          </div>
        </section>
      </header>
