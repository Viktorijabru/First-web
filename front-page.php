<?php
	get_header();
  ?>
    <main>
      <?php
        $serviceQuery = new WP_Query( array(
          'post_type'             => 'service',
          'posts_per_page'        => 4,
          'order'                 => 'ASC'
          ));
          ?>
        <section class="services-section">
          <div class="container">
            <div class="services-container">
							<button onclick="topFunction()" id="myBtn" title="Go to top"><div class="arrow-up"></div></button>
              <ul class="services-list flex-container">
                <?php if( $serviceQuery->have_posts() ) :
                        while( $serviceQuery->have_posts() ) :
                          $serviceQuery->the_post();
                          ?>
                <li class="item">
                  <div class="icon-image">
                    <i class="<?php the_field( 'icon_name', get_the_ID() ) ?>"></i>
                  </div>
                  <div class="item-text">
                    <h1><?php the_field( 'service_name', get_the_ID() ) ?></h1>
                    <p><?php the_field( 'service_description', get_the_ID() ) ?></p>
                  </div>
                </li>
                  <?php endwhile;endif; ?>
                <!-- <li class="item">
                  <div class="icon-image">
                    <i class="icon-pencil"></i>
                  </div>
                    <div class="item-text">
                      <h1>GRAPHIC DESIGN</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </li>
                <li class="item">
                  <div class="icon-image">
                    <i class="icon-cog"></i>
                  </div>
                    <div class="item-text">
                      <h1>PROGRAMMING</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                      elit, sed do</p>
                    </div>
                </li>
                <li class="item">
                  <div class="icon-image">
                    <i class="icon-camera2"></i>
                  </div>
                    <div class="item-text">
                      <h1>PHOTOGRAPHY</h1>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                      elite</p>
                    </div>
                </li> -->
                  </ul>
                <div class="service-button">
                  <button type="button" name="button">
                    <?php the_field( 'service_button', 15 ) ?>
                  </button>
                </div>
              </div>
            </div>
          </section>
          <section class="web-section">
            <div class="web-container flex-container">
              <div class="webtext">
                <h3><?php the_field( 'design_title', 15 ) ?></h3>
                <p><?php the_field( 'design_description', 15 ) ?></p>
              </div>
              <div class="webimg">
                <?php
                  $image_id = get_field('design_image', 15);
                  $image_url = wp_get_attachment_image_src( $image_id, 'web_image' );
                  ?>
                <img src="<?= $image_url[0] ?>" alt="<?php the_field( 'design_title', get_the_ID() ) ?>">
              </div>
            </div>
          </section>
          <section class="phone-section">
            <div class="container">
              <div class="phone-container flex-container">
                <div class="phones">
                  <div class="phone1">
                    <?php
                      $image_id = get_field('phone1', 15);
                      $image_url = wp_get_attachment_image_src( $image_id, 'phone1' );
                      ?>
                    <img src="<?= $image_url[0] ?>" alt="phone1">
                      <div class="phone2">
                        <?php
                          $image_id = get_field('phone2', 15);
                          $image_url = wp_get_attachment_image_src( $image_id, 'phone2' );
                          ?>
                        <img src="<?= $image_url[0] ?>" alt="phone2">
                          <!-- tai div turejo uzsidaryti po telefonu tik?-->
                        </div>
                      </div>
                    </div>
                  <div class="phoneitem">
                <div class="phone-text">
                  <h4><?php the_field( 'mobile_design_title', 15 ) ?></h4>
                  <p><?php the_field( 'mobile_design_description', 15 ) ?></p>
                </div>
                  <div class="phone-button">
                    <button type="button" name="button">
                      <?php the_field( 'mobile_button', 15 ) ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="portfolio-section">
            <div class="container">
              <div class="portfolio">
                <h3><?php the_field( 'portfolio_heading', 15 ) ?></h3>
                <p><?php the_field( 'portfolio_subheading', 15 ) ?></p>
              <div class="main">
                <?php
                  $categories = get_categories( array(
                      'post_type'               => 'portfolio',
                      'hide_empty'              => false
                    ) );

                  $portfolioQuery = new WP_Query( array(
                      'post_type'             => 'portfolio',
                      'posts_per_page'        => 6,
                      'orderby'               => 'date',
                      'order'                 => 'DESC'
                    ) );
                  ?>
              <div id="myBtnContainer" class="buttons">
                <?php foreach( $categories as $category ):
                      if( $category->slug !== 'uncategorized' ):
                      ?>
                <button onclick="<?=$category->slug === 'ALL' ? 'filterSelection("all")' : "filterSelection('$category->slug')"; ?>"
                        class="<?=$category->slug === 'all' ? 'active' : ''; ?>"><?=$category->name?></button>
                <?php endif;endforeach; ?>
              </div>
              <div class="row">
                <?php while( $portfolioQuery->have_posts() ):
                      $portfolioQuery->the_post();
                        //get current post categories
                      $post_categories = get_the_category( get_the_ID() );
                        //empty string for adding classes
                      $classes_string = '';
                      $name_string = '';
                        //add all slug names to variable
                        foreach($post_categories as $category) {
                          if( $category->slug !== 'all' ) {
                            $classes_string .= ' ' . $category->slug;
                            $name_string .= $category->name . ', ';
                          }
                        }

                      ?>
                <div class="column <?=$classes_string?>">
                  <div class="content">
                    <img src="<?php the_post_thumbnail_url('portfolio') ?>"
                         class="img-responsive" style="width:100%"
                         alt="<?php the_title() ?>">
                    <p><?php the_title() ?></p>
                      <?php the_content() ?>
                  </div>
                </div>
                      <?php endwhile; ?>
                  <!-- <div class="column web">
                    <div class="content">
                    <img src="/w3images/WEB.jpg" alt="WEB" style="width:100%">
                      <p>WEB</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>
                  <div class="column web">
                    <div class="content">
                    <img src="/w3images/web.jpg" alt="web" style="width:100%">
                      <p>WEB</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>

                  <div class="column photography">
                    <div class="content">
                      <img src="/w3images/photography1.jpg" alt="photography" style="width:100%">
                      <p>PHOTOGRAPHY</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>
                  <div class="column photography">
                    <div class="content">
                    <img src="/w3images/photography2.jpg" alt="photography" style="width:100%">
                      <p>PHOTOGRAPHY</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>
                  <div class="column photography">
                    <div class="content">
                    <img src="/w3images/photography3.jpg" alt="Car" style="width:100%">
                      <p>PHOTOGRAPHY</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>

                  <div class="column graphic">
                    <div class="content">
                      <img src="/w3images/graphic1.jpg" alt="Car" style="width:100%">
                      <p>GRAPHIC DESIGN</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>
                  <div class="column graphic">
                    <div class="content">
                    <img src="/w3images/graphic2.jpg" alt="Car" style="width:100%">
                      <p>GRAPHIC DESIGN</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>
                  <div class="column graphic">
                    <div class="content">
                    <img src="/w3images/graphic3.jpg" alt="Car" style="width:100%">
                      <p>GRAPHIC DESIGN</p>
                      <p>Lorem ipsum dolor..</p>
                    </div>
                  </div>
                </div> -->
                </div>
                  <div class="portfolio-icon">
                    <button type="button" name="button">
                      <i class="<?php the_field( 'portfolio_icon_button', 15 ) ?>"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </section>
            <?php
              $statisticsQuery = new WP_Query( array(
                'post_type'             => 'statistics',
                'posts_per_page'        => 4,
                'order'                 => 'ASC'
              ));
              ?>
          <section class="number-section">
            <div class="container">
              <div class="number-icons">
                <ul class="number-item flex-container">
                  <?php if( $statisticsQuery->have_posts() ) :
                      while( $statisticsQuery->have_posts() ) :
                          $statisticsQuery->the_post();
                          ?>
                  <li>
                    <i class="<?php the_field( 'statistics_icon', get_the_ID() ) ?>"></i>
                    <h4><?php the_field( 'statistics_numbers', get_the_ID() ); ?></h4>
                    <p><?php the_field( 'statistics_title', get_the_ID() ); ?></p>
                    </li>
                  <?php endwhile;endif; ?>
                    <!-- <li>
                      <i class="icon-mouse"></i>
                      <h4>9726621</h4>
                      <p>CLICK PRESSED</p>
                    </li>
                    <li>
                      <i class="icon-mail-envelope-open"></i>
                      <h4>7152</h4>
                      <p>MAILS SENT & RECEIVED</p>
                    </li>
                    <li>
                      <i class="icon-comment"></i>
                      <h4>491</h4>
                      <p>JOKES TOLD</p>
                  </li> -->
                </ul>
              </div>
            </div>
          </section>
            <?php
              $teamQuery = new WP_Query( array(
                'post_type'             => 'team',
                'posts_per_page'        => 4,
                'order'                 => 'ASC'
                ));
                ?>
          <section class="about-section">
            <div class="container">
              <div class="heading-container">
                <p><?php the_field( 'team_heading', 15 ); ?></p>
              </div>
              <div class="description-container">
                <p><?php the_field( 'team_content', 15 ); ?></p>
              </div>
                <div class="about-container">
                  <ul class="about-list flex-container">
                    <?php if( $teamQuery->have_posts() ) :
                        while( $teamQuery->have_posts() ) :
                            $teamQuery->the_post();

                          $image_id = get_field( 'team_image', get_the_ID() );
                          $image_url = wp_get_attachment_image_src( $image_id, 'medium' );
                          ?>
                    <li class="item">
                      <div class="image-container">
                        <img src="<?php echo $image_url[0] ?>"
                             alt="<?php the_field( 'person_name', get_the_ID() ) ?>" />
                      </div>
                      <div class="about-text">
                        <div class="name-container">
                          <h5><?php the_field( 'person_name', get_the_ID() ) ?></h5>
                        </div>
                        <div class="job-title-container">
                          <h6><?php the_field( 'person_job_title', get_the_ID() ) ?></h6>
                        </div>
                        <div class="description-container">
                          <p><?php the_field( 'person_description', get_the_ID() ) ?></p>
                        </div>
                      </div>
                    </li>
                    <?php endwhile;endif; ?>
                  <!-- <li class="item">
                    <div class="image-container">
                      <img src="assets/pictures/team2.jpg" alt="team">
                    </div>
                    <div class="name-container">
                      <h5>Carl Deen</h5>
                    </div>
                    <div class="job-title-container">
                      <h6>Graphic Designer</h6>
                    </div>
                    <div class="description-container">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea illum nisi veniam repellat nam in similique mollitia tempora ipsam.</p>
                    </div>
                  </li>
                  <li class="item">
                    <div class="image-container">
                      <img src="assets/pictures/team3.jpg" alt="team">
                    </div>
                    <div class="name-container">
                      <h5>Harry Ash</h5>
                    </div>
                    <div class="job-title-container">
                      <h6>Graphic Designer</h6>
                    </div>
                    <div class="description-container">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea illum nisi veniam repellat nam in similique mollitia tempora ipsam.</p>
                    </div>
                  </li>
                  <li class="item">
                    <div class="image-container">
                      <img src="assets/pictures/team4.jpg" alt="team">
                    </div>
                    <div class="name-container">
                      <h5>John Doe</h5>
                    </div>
                    <div class="job-title-container">
                      <h6>Graphic Designer</h6>
                    </div>
                    <div class="description-container">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea illum nisi veniam repellat nam in similique mollitia tempora ipsam.</p>
                    </div>
                    </div>
                  </li> -->
                </ul>
              </div>
            </div>
          </section>
          <?php
            $sliderQuery = new WP_Query( array(
              'post_type'             => 'slider',
              'posts_per_page'        => -1,
              'order'                 => 'DESC'
            ));
            ?>
          <section class="carousel-section">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <?php if( $sliderQuery->have_posts() ) :
                        while( $sliderQuery->have_posts() ) :
                          $sliderQuery->the_post();
                          ?>
                <div class="carousel-item <?php if( $sliderQuery->current_post == 0 ) {echo 'active';}?> ">
                  <i class="<?php the_field( 'slider_icon', get_the_ID() ) ?>"></i>
                  <p><?php the_field( 'slider_citation', get_the_ID() ) ?></p>
                  <p><?php the_field( 'slider_name', get_the_ID() ) ?></p>
                </div>
                <?php endwhile;endif; ?>
                <!-- <div class="carousel-item">
                  <i class="icon-quotes-right"></i>
                  <p>You think, we make</p>
                  <p>John Deer Graphic Designer</p>
                </div>
                <div class="carousel-item">
                  <i class="icon-quotes-right"></i>
                  <p>Nothing is impossible</p>
                  <p>Carl Dirl</p>
                </div> -->
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span><i class="icon-circle-left"></i></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span><i class="icon-circle-right"></i></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </section>
          <section class="subscribe-section">
            <div class="container">
              <div class="subscribe-container flex-container">
                <p><?php the_field( 'subscribe_title', 15 ); ?></p>
                  <button type="button" name="button">
                    <?php the_field( 'subscribe_button', 15 ); ?>
                  </button>
              </div>
            </div>
          </section>
          <?php
            $clientQuery = new WP_Query( array(
              'post_type'             => 'client',
              'posts_per_page'        => 3,
              'order'                 => 'ASC'
            ));
            ?>
          <section class="client-section">
            <div class="container">
              <div class="client-container">
                <div class="client-title">
                  <p><?php the_field( 'client_heading', 15 ); ?></p>
                  <p><?php the_field( 'client_subheading', 15 ); ?></p>
                </div>
                <div class="client-box">
                  <ul class="client-item flex-container">
                    <?php if( $clientQuery->have_posts() ) :
                            while( $clientQuery->have_posts() ) :
                              $clientQuery->the_post();
                              ?>
                    <li>
                      <p><?php the_field( 'client_name', get_the_ID() ) ?></p>
                      <p><?php the_field( 'client_job', get_the_ID() ) ?></p>
                      <p><?php the_field( 'client_citation', get_the_ID() ) ?></p>
                    </li>
                    <?php endwhile;endif; ?>
                    <!-- <li>
                      <p>Joe Carry</p>
                      <p>Businessman</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor</p>
                    </li>
                    <li>
                      <p>Anny Fork</p>
                      <p>Happy client</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor</p>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <section class="contact-section">
            <div class="container">
              <div class="contact-container">
                <p>Contact Us</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                  elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua</p>
                <form class="contact">
                  <!-- <div class="enter-container flex-container">
                    <input type="text" name="firstname" placeholder="Your name">
                   <input type="text" name="email" placeholder="E-mail">
                  </div>
                  <div class="text-area">
                    <textarea name="subject" placeholder="Your message"></textarea>
                  </div>
                  <div class="contact-button flex-container">
                    <button>
                    Send Message
                    </button>
                  </div> -->
            				<?php echo strip_tags(do_shortcode('[contact-form-7 id="17" title="Projekto forma"]'),'<input><form><textarea><div>') ?>
                </form>
              </div>
            </div>
          </section>
              <?php
                $image_id = get_field('adress_background', 15);
                $image_url = wp_get_attachment_image_src( $image_id, 'adress_background' );
              ?>
          <section class="adress-section" style="background-image: url('<?= $image_url[0] ?>');">
            <div class="container">
              <div class="adress-container">
                <p><?php the_field( 'adress', 15 ) ?></p>
                <p><?php the_field( 'email', 15 ) ?></p>
                <p><?php the_field( 'phone_number', 15 ) ?></p>
              </div>
            </div>
          </section>
        </main>
      <?php
        get_footer();
        ?>
