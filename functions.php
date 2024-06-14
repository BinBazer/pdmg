<?php
    add_action( 'wp_enqueue_scripts', function() {  
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
        wp_enqueue_style( 'carousel', get_template_directory_uri() . '/assets/css/owlCarousel.min.css' );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css' );
        wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );

        wp_deregister_script( 'jquery-core' );
        wp_register_script( 'jquery-core', get_template_directory_uri() .'/assets/js/vendor/jquery-1.12.4.min.js');
        wp_enqueue_script( 'jquery' );
               
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', array('jquery'), 'null' , true );
        wp_enqueue_script( 'mailchimp', get_template_directory_uri() . '/assets/js/mailchimp.min.js', array('jquery'), 'null' , true );
        wp_enqueue_script( 'сarousel-js', get_template_directory_uri() . '/assets/js/owlCarousel.min.js', 'null' , true ); 
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), 'null' , true ); 
        wp_enqueue_script( 'tamjid', get_template_directory_uri() . '/assets/js/tamjid-counter.min.js', array('jquery'), 'null' , true );
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 'null' , true );
    });

    add_theme_support( 'post-thumbnails' );
 

    function my_favicon() {
        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/assets/img/favicon.ico" />';
    }
    add_action('wp_head', 'my_favicon');

    add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
        function remove_jquery_migrate( $scripts ) {
            if ( empty( $scripts->registered['jquery'] ) || is_admin() ) {
                return;
            }
            $deps = & $scripts->registered['jquery']->deps;
            $deps = array_diff( $deps, [ 'jquery-migrate' ] );
        }



        function pdmg_project_custom_post_type() {
            $labels = array(
                'name'          => __('Проєкти'),
                'singular_name' => __('Проєкт'),
                'add_new'       => __('Новий проєкт')
            );
    
            $args = array(
                'labels'        => $labels,
                'menu_icon'     => 'dashicons-flag',
                'menu_position' => 5,
                'supports'      => array('title', 'editor', 'thumbnail'), 
                'public'        => true,
                'has_archive'   => true,
            );
    
            register_post_type('pdmg_project', $args);
        }
    
        add_action('init', 'pdmg_project_custom_post_type');
    
        function add_pdmg_project_main_page_post_custom_meta_box() {
            add_meta_box(
                'pdmg_project_main_page_post_custom_meta_box', 
                'Данні поста проєкти на головній сторінці', 
                'show_pdmg_project_main_page_post_custom_meta_box', 
                'pdmg_project', 
                'normal', 
                'high' 
            );
        }
    
        add_action('add_meta_boxes', 'add_pdmg_project_main_page_post_custom_meta_box');
        
        function show_pdmg_project_main_page_post_custom_meta_box($post) {
            $pdmg_project_main_page_post_title = get_post_meta($post->ID, 'pdmg_project_main_page_post_title', true);
            $pdmg_project_main_page_post_content = get_post_meta($post->ID, 'pdmg_project_main_page_post_content', true);
            ?>
            <label for="pdmg_project_main_page_post_title">Заголовок на головній сторінці:</label>
            <input type="text" id="pdmg_project_main_page_post_title" name="pdmg_project_main_page_post_title" value="<?php echo esc_attr($pdmg_project_main_page_post_title); ?>" style="width: 100%;">
            <br>
            <label for="pdmg_project_main_page_post_content">Текст на головній стрінці:</label>
            <textarea id="pdmg_project_main_page_post_content" name="pdmg_project_main_page_post_content" style="width: 100%; height: 150px;"><?php echo esc_textarea($pdmg_project_main_page_post_content); ?></textarea>
            <br>
            <?php
        }
        
        function save_pdmg_project_main_page_post_custom_meta_data($post_id) {
            if (isset($_POST['pdmg_project_main_page_post_title'])) {
                update_post_meta($post_id, 'pdmg_project_main_page_post_title', sanitize_text_field($_POST['pdmg_project_main_page_post_title']));
            }
            if (isset($_POST['pdmg_project_main_page_post_content'])) {
                update_post_meta($post_id, 'pdmg_project_main_page_post_content', sanitize_text_field($_POST['pdmg_project_main_page_post_content']));
            }
        }
    
        add_action('save_post', 'save_pdmg_project_main_page_post_custom_meta_data');

    function pdmg_blog_custom_post_type() {
        $labels = array(
            'name'          => __('Новини'),
            'singular_name' => __('Новина'),
            'add_new'       => __('Створити новину')
        );

        $args = array(
            'labels'        => $labels,
            'menu_icon'     => 'dashicons-flag',
            'menu_position' => 5,
            'supports'      => array('title', 'editor', 'thumbnail'), 
            'public'        => true,
            'has_archive'   => true,
        );

        register_post_type('pdmg_blog', $args);
    }

    add_action('init', 'pdmg_blog_custom_post_type');

    function add_pdmg_blog_main_page_post_custom_meta_box() {
        add_meta_box(
            'pdmg_blog_main_page_post_custom_meta_box', 
            'Данні поста новини на головній сторінці', 
            'show_pdmg_blog_main_page_post_custom_meta_box', 
            'pdmg_blog', 
            'normal', 
            'high' 
        );
    }

    add_action('add_meta_boxes', 'add_pdmg_blog_main_page_post_custom_meta_box');
    
    function show_pdmg_blog_main_page_post_custom_meta_box($post) {
        $pdmg_blog_main_page_post_title = get_post_meta($post->ID, 'pdmg_blog_main_page_post_title', true);
        $pdmg_blog_main_page_post_content = get_post_meta($post->ID, 'pdmg_blog_main_page_post_content', true);
        ?>
        <label for="pdmg_blog_main_page_post_title">Заголовок на головній сторінйі:</label>
        <input type="text" id="pdmg_blog_main_page_post_title" name="pdmg_blog_main_page_post_title" value="<?php echo esc_attr($pdmg_blog_main_page_post_title); ?>" style="width: 100%;">
        <br>
        <label for="pdmg_blog_main_page_post_content">Текст на головній стрінці:</label>
        <textarea id="pdmg_blog_main_page_post_content" name="pdmg_blog_main_page_post_content" style="width: 100%; height: 150px;"><?php echo esc_textarea($pdmg_blog_main_page_post_content); ?></textarea>
        <br>
        <?php
    }
    
    function save_pdmg_blog_main_page_post_custom_meta_data($post_id) {
        if (isset($_POST['pdmg_blog_main_page_post_title'])) {
            update_post_meta($post_id, 'pdmg_blog_main_page_post_title', sanitize_text_field($_POST['pdmg_blog_main_page_post_title']));
        }
        if (isset($_POST['pdmg_blog_main_page_post_content'])) {
            update_post_meta($post_id, 'pdmg_blog_main_page_post_content', sanitize_text_field($_POST['pdmg_blog_main_page_post_content']));
        }
    }

    add_action('save_post', 'save_pdmg_blog_main_page_post_custom_meta_data');
    
    function pdmg_team_custom_post_type() {
        $labels = array(
            'name'          => __('Команда'),
            'singular_name' => __('Спеціаліст'),
            'add_new'       => __('Додати спеціаліста')
        );

        $args = array(
            'labels'        => $labels,
            'menu_icon'     => 'dashicons-flag',
            'menu_position' => 5,
            'supports'      => array('title', 'editor', 'thumbnail'), 
            'public'        => true,
            'has_archive'   => true,
        );

        register_post_type('pdmg_team', $args);
    }

    add_action('init', 'pdmg_team_custom_post_type');

    function pdmg_founder_custom_post_type() {
        $labels = array(
            'name'          => __('Засновники'),
            'singular_name' => __('Засновник'),
            'add_new'       => __('Додати ')
        );

        $args = array(
            'labels'        => $labels,
            'menu_icon'     => 'dashicons-flag',
            'menu_position' => 5,
            'supports'      => array('title', 'editor', 'thumbnail'), 
            'public'        => true,
            'has_archive'   => true,
        );

        register_post_type('pdmg_founder', $args);
    }

    add_action('init', 'pdmg_founder_custom_post_type');

    function add_pdmg_team_main_page_post_custom_meta_box() {
        add_meta_box(
            'pdmg_team_main_page_post_custom_meta_box', 
            'Данні поста команда на головній сторінці', 
            'show_pdmg_team_main_page_post_custom_meta_box', 
            'pdmg_team', 
            'normal', 
            'high' 
        );
    }
 
    add_action('add_meta_boxes', 'add_pdmg_team_main_page_post_custom_meta_box');

    function show_pdmg_team_main_page_post_custom_meta_box($post) {
        $pdmg_team_main_page_post_position = get_post_meta($post->ID, 'pdmg_team_main_page_post_position', true);
        ?>
        <label for="pdmg_team_main_page_post_position">Посада:</label>
        <input type="text" id="pdmg_team_main_page_post_position" name="pdmg_team_main_page_post_position" value="<?php echo esc_attr($pdmg_team_main_page_post_position); ?>" style="width: 100%;">
        <?php
    }

    function save_pdmg_team_main_page_post_custom_meta_data($post_id) {
        if (isset($_POST['pdmg_team_main_page_post_position'])) {
            update_post_meta($post_id, 'pdmg_team_main_page_post_position', sanitize_text_field($_POST['pdmg_team_main_page_post_position']));
        }
    }

    add_action('save_post', 'save_pdmg_team_main_page_post_custom_meta_data');
?>
  

  
