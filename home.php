<?php
/*
Template Name: home
*/

?>
<?php get_header();?>
<body class="rtl">
  <header class="st-header st-style1 st-sticky-menu">
    <div class="st-main-header">
      <div class="container">
        <div class="st-main-header-in">
          <div class="st-site-branding" >
            <a href="#home" class="st-logo-link">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="logo">
            </a>
          </div>
          <div class="st-footer-social">
            <ul class="st-footer-social-btn st-flex st-mp1">
              <li><a href="https://www.facebook.com/mirne.zhittya/"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://www.instagram.com/povernis_do_mirnogo_zhittya/"><i class="fab fa-instagram"></i></a></li>
              <li><a href="tel:0637029797"><i class="fas fa-phone"></i></a></li>
              <li><a href="mailto:ngo.RPL@gmail.com"><i class="fas fa-envelope"></i></a></li>
            </ul>
          </div>
          <div class="st-nav-wrap st-fade-down">
            <div class="st-nav-toggle st-style1">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <nav class="st-nav st-desktop-nav">
            <ul class="st-nav-list onepage-nav">
                <li><a href="#home" class="smooth-scroll">Головна</a></li>
                <li><a href="#project" class="smooth-scroll">Проєкти</a></li>
                <li><a href="#service" class="smooth-scroll">Послуги</a></li>
                <li><a href="#team" class="smooth-scroll">Команда</a></li>
                <li><a href="#blog" class="smooth-scroll">Новини</a></li>
                <li><a href="#contact" class="smooth-scroll">Контакти</a></li>
              </ul>  
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="st-content">
      <div class="st-hero-slide st-style1 st-flex" id="home">
        <div class="container">
          <div class="st-hero-text st-style1">
            <h1 class="st-hero-title">Наша команда - <br />досвідчені <br />психологи та <br />психотерапевти</h1>
            <div class="st-hero-subtitle">
              Ми поруч, ми знаємо та розуміємо<br /> як вам може бути складно і готові допомогти
            </div>
            <div class="st-btn-group st-style1">
              <a href="tel:0637029797" class="st-btn st-style1 st-color1">Зв'язатись</a>
            </div>
          </div>          
        </div>
        <div class="st-hero-img"><img src="<?php bloginfo('template_url'); ?>/assets/img/main-img.jpg" alt="demo"></div>
      </div>
      <div class="st-hero-slide-dop st-gray-bg" >
        <div class="container">
          <p class="st-hero-slide-dop-text st-style text-left">Колектив ГО «ПМЖ» складається з фахівців з ментального здоров’я, психологічної та фізичної реабілітації, соціальної
            роботи, а також з ветеранів російсько-української війни, які на своєму досвіді розуміють потреби та проблеми з якими
            стикаються українці. Нашою ключовою перевагою є висока компетентність спеціалістів та потужна теоретична та практична
            база навичок для надання якісної психосоціальної допомоги різним категоріям населення.
          </p>
        </div>
      </br>
      </div>

    <!-- Start Project Section -->
    <section class="st-cta-wrap" id="project">
      <div class="container">
        <div class="st-cta-slider owl-carousel st-owl-controler2">
        <?php
            $args = array(
            'post_type'      => 'pdmg_project',
            'posts_per_page' => -1,
          );
          $loop = new WP_Query($args);
          while ( $loop->have_posts() ) {
            $loop->the_post();
            $pdmg_project_main_page_post_title = get_post_meta(get_the_ID(), 'pdmg_project_main_page_post_title', true);
            $pdmg_project_main_page_post_content = get_post_meta(get_the_ID(), 'pdmg_project_main_page_post_content', true);
            ?>
            <div class="row min-height-row">
              <div class="col-lg-7 offset-lg-1">
                <div class="st-cta text-left st-section">
                  <h3 class="st-cta-h3"><?php echo esc_html($pdmg_project_main_page_post_title); ?></h3>
                  <div class="st-cta-text"><?php echo wp_kses_post($pdmg_project_main_page_post_content); ?></div>
                  <div class="st-cta-btn">
                    <a href="<?php echo the_permalink(); ?>" class="st-btn st-style1 st-size1 st-color1">Дізнатись більше</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="st-vertical-middle">
                  <div class="st-vertical-middle-in st-flex">
                    <div class="st-cta-img wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                      <?php the_post_thumbnail();?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        ?>
    </section>

    <!-- Start About Section -->
    <div class="st-about-wrap st-section-top st-gray-bg" id="service">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="st-vertical-middle">
              <div class="st-vertical-middle-in">
                <div class="st-about-img wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/service-img.jpg" alt="foto"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="st-section-heading st-style1">
              <h2>Наші послуги</h2>
            </div>
            <div class="st-about-text">
              <p>Основними напрямами роботи фахівців організації є надання допомоги при:</p>
              <ul class="tr-list my-ul">
                <li>посттравматчному стресовому розладі;</li>
                <li>нав'язливих страхах, тривогах, фобіях;</li>
                <li>хронічному стресі, відчутті постійної напруги та неможливості розслабитись;</li>
                <li>вживанні алкоголю та психоактивних речовин в наслідок травми;</li>
                <li>тривожно-депресивних станах, включаючи (але не обмежуючись) відчуттям безнадійності, втрати сенсу, безсилля та інше;</li>
                <li>емоційних проблемах, включаючи (але не обмежуючись) почуттям провини, сорому, роздратування, різких спалахів агресії;</li>
                <li>проблемах соціальної дезадаптації;</li>
                <li>інших наслідках психологічної травми;</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Team Section -->
    <section class="st-team-wrap st-section" id="team">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2>Команда</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/light-img/seperator-icon.png" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p class="text-left">ГО «ПМЖ» складається з висококваліфікованих спеціалістів у сфері психічного здоров’я та соціальної роботи. Структура
          центру побудована за принципом парасольки під якою ми зібрали самих крутих спеціалістів, кожен з яких має високу
          компетенцію в якомусь із напрямів психологічної допомоги – робота з травмою, робота з проживанням втрати, психоемоційні
          труднощі, адикції та інше. Коли до нас звертається людина за допомогою, ми на основі виявлених потреб підбираємо
          спеціалістів, які найкраще зможуть надати допомогу саме в цьому індивідуальному випадку.
          </p>
        </div>
      </div>
      <div class="st-owl-controler3-hover">
        <div class="container">
          <h3 class="st-style2 text-center">Засновники ГО «ПМЖ»</h3>
          </br>
          </br>
          <div class="st-service-carousel owl-carousel st-style2 st-owl-controler3">
          <?php
              $args = array(
              'post_type'      => 'pdmg_founder',
              'posts_per_page' => -1,
            );
            $loop = new WP_Query($args);
            while ( $loop->have_posts() ) {
              $loop->the_post();
              $size = array(370, 290); 
              ?>
                <div class="st-image-box st-style1 text-center wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.25s">
                  <?php the_post_thumbnail($size);?>
                  <div class="st-image-box-info">
                    <h3 class="st-image-box-title"><?php the_title();?></h3>
                    <div class="st-image-box-text cst-image-box-info">                      
                      <a href="<?php echo the_permalink(); ?>" > Данні засновника
                      <i class="fas fa-chevron-right"></i></a>
                  </div>
                  </div>
                </div>
              <?php
            }
          ?>
          </div>
        </div>
      </div>
      </br>
      </br>
      <h3 class="st-style2 text-center">Залучені спеціалісти</h3>
      </br>
      </br>
      <div class="st-owl-controler3-hover">
        <div class="container">
          <div class="st-member-carousel owl-carousel st-style2 st-owl-controler3">
          <?php
              $args = array(
              'post_type'      => 'pdmg_team',
              'posts_per_page' => -1,
            );
            $loop = new WP_Query($args);
            while ( $loop->have_posts() ) {
              $loop->the_post();
              $pdmg_team_main_page_post_position = get_post_meta(get_the_ID(), 'pdmg_team_main_page_post_position', true);
              $size = array(207, 174); 
              ?>
                <div class="st-team-member text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">            
                  <div class="st-member-img">
                    <?php the_post_thumbnail($size);?>
                  </div>
                  <div class="st-member-info">
                    <h3 class="st-member-name"><?php the_title();?></h3>
                    <div class="st-member-position"><?php echo wp_kses_post($pdmg_team_main_page_post_position); ?></div>
                    <h6 class="st-member-link">
                      <a href="<?php echo the_permalink(); ?>" > Данні спеціаліста
                      <i class="fas fa-chevron-right"></i></a>
                    </h6>
                  </div>
                </div>
              <?php
            }
          ?>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Start Blog Section -->
    <section class="st-blog-wrap st-section st-gray-bg" id="blog">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2>Новини</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/light-img/seperator-icon.png" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p>Тут ви зможете прочитати багато цікавого,<br> також Ви зможете краще себе розуміти маючи необхідні знання</p>
        </div>
      </div>
      <div class="container">
        <div class="row">
        <?php
          $args = array(
              'post_type'      => 'pdmg_blog',
              'posts_per_page' => -1,   
          );
          $loop = new WP_Query($args);
          if ( $loop->have_posts() ) { 
              while ($loop->have_posts()) {
                  $loop->the_post();
                  $pdmg_blog_main_page_post_title = get_post_meta(get_the_ID(), 'pdmg_blog_main_page_post_title', true);
                  $pdmg_blog_main_page_post_content = get_post_meta(get_the_ID(), 'pdmg_blog_main_page_post_content', true);
                  $pdmg_blog_main_page_img_url = get_the_post_thumbnail_url( get_the_ID(), 'pdmg_blog_main_page_post_content', true );
                  ?>
                    <div class="col-lg-4">
                      <div class="st-blog st-style1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="st-zoom">
                        <a href="#" class="st-blog-thumb st-bg st-zoom-in" data-src="<?php echo $pdmg_blog_main_page_img_url;?>" style="background-image: url(&quot;<?php echo $pdmg_blog_main_page_img_url;?>&quot;);"></a>
                          
                        </div>
                        <div class="st-blog-info">
                          <h2 class="st-blog-title"><?php echo esc_html($pdmg_blog_main_page_post_title); ?></h2>
                          <div class="st-blog-text"><?php echo wp_kses_post($pdmg_blog_main_page_post_content); ?></div>
                          <div class="st-blog-meta">
                            <div class="st-blog-meta-right"><a href="<?php echo the_permalink(); ?>" class="st-blog-btn">Докладніше
                            <i class="fas fa-chevron-right"></i></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
              }
            }
          ?>
        </div>
      </div>
    </section>

    <!-- Start Contact Section -->
    <section class="st-contact-wrap st-gray-bg st-section" id="contact">
      <div class="container">
        <div class="st-section-heading st-style2 text-center">
          <h2>Наші контакти</h2>
          <div class="st-seperator">
            <div class="st-seperator-left-bar wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"></div>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/light-img/seperator-icon.png" alt="demo" class="st-seperator-icon">
            <div class="st-seperator-right-bar wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s"></div>
          </div>
          <p>Ви можете зателефонувати або наисати листа, <br> Ми завжди Вам раді</p>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div id="cf-msg"></div>
			  <?php echo do_shortcode('[contact-form-7 id="866ec50" title="form1"]') ?>
          </div>
          <div class="col-lg-6">
            <div class="st-contact-info st-style1">
              <div class="st-contact-info-in">
                <h3 class="st-contact-info-title">Ми завжди на зв'язку</h3>
                <div class="st-contact-info-text">Зв'яжітся з нами для того, щоб дізнатись, як отримати допомогу або для співпраці</div>
                <h3 class="st-contact-info-title">Контактна інформація</h3>
                <ul>
                  <!--<li><i class="fas fa-map-signs"></i>вул. Качалова 5а</li>-->
                  <li><i class="fas fa-phone"></i>+38 063 702 97 97</li>
                  <li><i class="fas fa-envelope"></i><a href="mailto:ngo.RPL@gmail.com">ngo.RPL@gmail.com</a></li>
                </ul>
              </div>
              <div class="st-svg-animation1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="590px"
                  height="436px">
                  <defs>
                    <filter filterUnits="userSpaceOnUse" id="Filter_0" x="0px" y="0px" width="590px" height="436px">
                      <feOffset in="SourceAlpha" dx="0" dy="5" />
                      <feGaussianBlur result="blurOut" stdDeviation="3.162" />
                      <feFlood flood-color="rgb(106, 106, 106)" result="floodOut" />
                      <feComposite operator="atop" in="floodOut" in2="blurOut" />
                      <feComponentTransfer>
                        <feFuncA type="linear" slope="0.15" />
                      </feComponentTransfer>
                      <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                      </feMerge>
                    </filter>
                  </defs>
                  <g filter="url(#Filter_0)">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                      d="M359.506,400.811 C311.350,416.741 266.303,427.200 215.885,416.924 C166.065,406.770 119.155,382.030 83.358,345.883 C32.880,294.910 5.320,222.074 9.403,150.433 C11.889,106.817 27.202,61.676 61.083,34.027 C101.026,1.428 158.043,-0.486 208.701,8.960 C259.358,18.407 308.226,37.556 359.592,41.763 C414.001,46.218 473.787,34.861 519.488,64.652 C532.722,73.279 543.780,84.912 553.231,97.563 C563.583,111.419 572.219,126.797 576.587,143.532 C584.814,175.056 577.226,208.904 563.417,238.444 C538.267,292.240 493.162,335.144 441.630,364.721 C415.638,379.639 387.934,391.407 359.506,400.811 Z" />
                  </g>
                </svg>
              </div><!-- .st-svg-animation1 -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Start Map Section -->
    <!--<div class="st-map-wrap">
      <div class="st-map-bar st-flex">
        <div class="st-map-bar-img">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/light-img/map-icon-img.png" alt="demo">
          <div class="st-map-bar-icon"><i class="fas fa-map-marker-alt"></i></div>
        </div>
      </div>
      <div class="st-map-wrpa">
        <div class="st-google-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2137.5620344920862!2d30.411445905732872!3d50.422397475889916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cbfbcdb00b8f%3A0xd9cb270d8fbc9196!2zNUEsINCy0YPQu9C40YbRjyDQktC-0LvQvtC00LjQvNC40YDQsCDQmtCw0YfQsNC70LgsIDXQkCwg0JrQuNGX0LIsIDAyMDAw!5e0!3m2!1suk!2sua!4v1709481860748!5m2!1suk!2sua"></iframe>
    </div>-->
    <?php get_footer();?>





