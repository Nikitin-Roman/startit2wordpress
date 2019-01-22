<?php
// отключаем верхний админ бар
function my_function_admin_bar(){
return false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

// хуки для подключения стилей и скриптов
	add_action( 'wp_enqueue_scripts', 'theme_styles' );
	add_action('wp_enqueue_scripts', 'theme_scripts');
//хук для регистрации меню
	add_action('after_setup_theme', 'theme_after_setup');
// добавляем миниатюру записи
	add_theme_support( 'post-thumbnails' );

// регистрация верхнего меню
	function theme_after_setup(){
		register_nav_menu( 'top', 'Шапка' );
		add_image_size( 'logo-size', 78, 64, true );
		add_image_size( 'about-left-image', 480, 286, true );
		add_image_size( 'about-right-image', 263, 267, true );
		add_image_size( 'portfolio-image', 263, 263, true );
		add_image_size( 'portfolio-slider-image', 650, 650, true );
		add_image_size( 'articles-image', 360, 272, true );
	}

//подключение стилей и скриптов
	function theme_styles(){
		wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700/Lora:400' );
		wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/fonts/ionicons/css/ionicon.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fonts/font-awesome/css/font-awesome.css' );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
		wp_enqueue_style( 'menu', get_template_directory_uri() . '/css/menu.css' );
		wp_enqueue_style( 'owl-carusel', get_template_directory_uri() . '/css/owl.carousel.css' );
		wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.default.css' );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
		wp_enqueue_style('style', get_stylesheet_uri());

	}

	function theme_scripts(){
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js');
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
		wp_enqueue_script( 'jqmixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js');
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js');
		wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.js');
		wp_enqueue_script( 'typed', get_template_directory_uri() . '/js/typed.min.js');
		wp_enqueue_script('startit-script-menu', get_template_directory_uri() . '/js/menu.js' );
		wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js');
	}

// создание новых типов записай и таксономии
	add_action( 'init', 'carrby_custom_post_type' );

	function carrby_custom_post_type(){
			register_post_type('services', array(
				'label'  => null,
				'labels' => array(
					'name'               => 'Сервисы', // основное название для типа записи
					'singular_name'      => 'Сервис', // название для одной записи этого типа
					'add_new'            => 'Добавить новый', // для добавления новой записи
					'add_new_item'       => 'Добавление сервиса', // заголовка у вновь создаваемой записи в админ-панели.
					'edit_item'          => 'Редактирование сервиса', // для редактирования типа записи
					'new_item'           => 'Новый сервис', // текст новой записи
					'view_item'          => 'Смотреть сервис', // для просмотра записи этого типа.
					'search_items'       => 'Искать сервисы', // для поиска по этим типам записи
					'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
					'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
					'parent_item_colon'  => '', // для родителей (у древовидных типов)
					'menu_name'          => 'Our Services', // название меню
				),
				'description'         => '',
				'public'              => true,
				'publicly_queryable'  => 25, // зависит от public
				'exclude_from_search' => null, // зависит от public
				'show_ui'             => null, // зависит от public
				'show_in_menu'        => null, // показывать ли в меню адмнки
				'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
				'show_in_nav_menus'   => null, // зависит от public
				'show_in_rest'        => null, // добавить в REST API. C WP 4.7
				'rest_base'           => null, // $post_type. C WP 4.7
				'menu_position'       => null,
				'menu_icon'           => 'dashicons-admin-tools', 
				'capability_type'   => 'post',
				//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
				//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
				'hierarchical'        => false,
				'supports'            => array('title','editor'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
				'taxonomies'          => array(),
				'has_archive'         => true,
				'rewrite'             => true,
				'query_var'           => true,
			) );

			register_post_type('portfolio', array(
				'label'  => null,
				'labels' => array(
					'name'               => 'Портфолио', // основное название для типа записи
					'singular_name'      => 'Портфолио', // название для одной записи этого типа
					'add_new'            => 'Добавить новое', // для добавления новой записи
					'add_new_item'       => 'Добавление портфолио', // заголовка у вновь создаваемой записи в админ-панели.
					'edit_item'          => 'Редактирование портфолио', // для редактирования типа записи
					'new_item'           => 'Новое портфолио', // текст новой записи
					'view_item'          => 'Смотреть портфолио', // для просмотра записи этого типа.
					'search_items'       => 'Искать портфолио', // для поиска по этим типам записи
					'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
					'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
					'parent_item_colon'  => '', // для родителей (у древовидных типов)
					'menu_name'          => 'Our Portfolio', // название меню
				),
				'description'         => '',
				'public'              => true,
				'publicly_queryable'  => 25, // зависит от public
				'exclude_from_search' => null, // зависит от public
				'show_ui'             => null, // зависит от public
				'show_in_menu'        => null, // показывать ли в меню адмнки
				'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
				'show_in_nav_menus'   => null, // зависит от public
				'show_in_rest'        => null, // добавить в REST API. C WP 4.7
				'rest_base'           => null, // $post_type. C WP 4.7
				'menu_position'       => null,
				'menu_icon'           => 'dashicons-portfolio', 
				'capability_type'   => 'post',
				//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
				//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
				'hierarchical'        => false,
				'supports'            => array('title','editor', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
				//'taxonomies'          => array(''),
				'has_archive'         => true,
				'rewrite'             => true,
				'query_var'           => true,
			) );

			register_taxonomy('portfolio_category', array('portfolio'), array(
				'label'                 => '', // определяется параметром $labels->name
				'labels'                => array(
					'name'              => 'Категории портфолио',
					'singular_name'     => 'Категории портфолио',
					'search_items'      => 'Найти категории портфолио',
					'all_items'         => 'Все категории',
					'view_item '        => 'Посмотреть категории',
					'edit_item'         => 'Редактировать категории',
					'update_item'       => 'Обновоить категории',
					'add_new_item'      => 'Добавить новую категорию портфолио',
					'new_item_name'     => 'Новое имя категории',
					'menu_name'         => 'Portfolio category',
				),
				'description'           => '', // описание таксономии
				'public'                => true,
				'publicly_queryable'    => null, // равен аргументу public
				'show_in_nav_menus'     => true, // равен аргументу public
				'show_ui'               => true, // равен аргументу public
				'show_in_menu'          => true, // равен аргументу show_ui
				'show_tagcloud'         => true, // равен аргументу show_ui
				'show_in_rest'          => null, // добавить в REST API
				'rest_base'             => null, // $taxonomy
				'hierarchical'          => false,
				'update_count_callback' => '',
				'rewrite'               => true,
				//'query_var'             => $taxonomy, // название параметра запроса
				'capabilities'          => array(),
				'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
				'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
				'_builtin'              => false,
				'show_in_quick_edit'    => null, // по умолчанию значение show_ui
			) );
		}

// страница настроек

		if( function_exists('acf_add_options_page') ) {
			
			acf_add_options_page(array(
				'page_title' 	=> 'Страница настроек',
				'menu_title'	=> 'Настройки сайта',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
			
		}
// анонс поста

		add_filter( 'excerpt_length', function(){
			return 15;
		} );

		add_filter('excerpt_more', function($more) {
			return '';
		});