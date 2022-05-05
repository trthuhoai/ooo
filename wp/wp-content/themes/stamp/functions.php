<?php
/**
 * stamp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stamp
 */

if ( ! function_exists( 'stamp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stamp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on stamp, use a find and replace
		 * to change 'stamp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'stamp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'stamp' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'stamp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'stamp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stamp_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'stamp_content_width', 640 );
}
add_action( 'after_setup_theme', 'stamp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stamp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stamp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stamp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'stamp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stamp_scripts() {
	wp_enqueue_style( 'stamp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'stamp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'stamp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stamp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 720, 720, true );


if ( ! function_exists( 'custom_breadcrumb' ) ) {
    function custom_breadcrumb( $wp_obj = null ) {

        // トップページでは何も出力しない
        if ( is_home() || is_front_page() ) return false;

        //そのページのWPオブジェクトを取得
        $wp_obj = $wp_obj ?: get_queried_object();

					
        echo '<nav aria-label="breadcrumb">'.  //id名などは任意で
                '<ol class="breadcrumb mb-0">'.
                    '<li class="breadcrumb-item">'.
                        '<a href="'. home_url() .'"><span>HOME</span></a>'.
                    '</li>';

        if ( is_attachment() ) {

            /**
             * 添付ファイルページ ( $wp_obj : WP_Post )
             * ※ 添付ファイルページでは is_single() も true になるので先に分岐
             */
            echo '<li class="breadcrumb-item"><span>'. $wp_obj->post_title .'</span></li>';

        } elseif ( is_single() ) {

            /**
             * 投稿ページ ( $wp_obj : WP_Post )
             */
            $post_id    = $wp_obj->ID;
            $post_type  = $wp_obj->post_type;
            $post_title = $wp_obj->post_title;

            // カスタム投稿タイプかどうか
            if ( $post_type !== 'post' ) {

                $the_tax = "";  //そのサイトに合わせ、投稿タイプごとに分岐させて明示的に指定してもよい

                // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
                $tax_array = get_object_taxonomies( $post_type, 'names');
                foreach ($tax_array as $tax_name) {
                    if ( $tax_name !== 'post_format' ) {
                        $the_tax = $tax_name;
                        break;
                    }
                }

                //カスタム投稿タイプ名の表示
                echo '<li class="breadcrumb-item">'.
                        '<a href="'. get_post_type_archive_link( $post_type ) .'">'.
                            '<span>'. get_post_type_object( $post_type )->label .'</span>'.
                        '</a>'.
                     '</li>';

            } else {
                $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
            }

            // タクソノミーが紐づいていれば表示
            if ( $the_tax !== "" ) {

                $child_terms = array();   // 子を持たないタームだけを集める配列
                $parents_list = array();  // 子を持つタームだけを集める配列

                // 投稿に紐づくタームを全て取得
                $terms = get_the_terms( $post_id, $the_tax );

                if ( !empty( $terms ) ) {

                    //全タームの親IDを取得
                    foreach ( $terms as $term ) {
                        if ( $term->parent !== 0 ) $parents_list[] = $term->parent;
                    }

                    //親リストに含まれないタームのみ取得
                    foreach ( $terms as $term ) {
                        if ( ! in_array( $term->term_id, $parents_list ) ) $child_terms[] = $term;
                    }

                    // 最下層のターム配列から一つだけ取得
                    $term = $child_terms[0];

                    if ( $term->parent !== 0 ) {

                        // 親タームのIDリストを取得
                        $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );

                        foreach ( $parent_array as $parent_id ) {
                            $parent_term = get_term( $parent_id, $the_tax );
                            echo '<li class="breadcrumb-item">'.
                                    '<a href="'. get_term_link( $parent_id, $the_tax ) .'">'.
                                      '<span>'. $parent_term->name .'</span>'.
                                    '</a>'.
                                 '</li>';
                        }
                    }

                    // 最下層のタームを表示
                    echo '<li class="breadcrumb-item">'.
                            '<a href="'. get_term_link( $term->term_id, $the_tax ). '">'.
                              '<span>'. $term->name .'</span>'.
                            '</a>'.
                         '</li>';
                }
            }

            // 投稿自身の表示
            echo '<li class="breadcrumb-item active"><span>'. $post_title .'</span></li>';

        } elseif ( is_page() ) {

            /**
             * 固定ページ ( $wp_obj : WP_Post )
             */
            $page_id    = $wp_obj->ID;
            $page_title = $wp_obj->post_title;

            // 親ページがあれば順番に表示
            if ( $wp_obj->post_parent !== 0 ) {
                $parent_array = array_reverse( get_post_ancestors( $page_id ) );
                foreach( $parent_array as $parent_id ) {
                    echo '<li class="breadcrumb-item">'.
                            '<a href="'. get_permalink( $parent_id ).'">'.
                                '<span>'.get_the_title( $parent_id ).'</span>'.
                            '</a>'.
                         '</li>';
                }
            }
            // 投稿自身の表示
            echo '<li class="breadcrumb-item active" aria-current="page"><span>'. $page_title .'</span></li>';

        } elseif ( is_post_type_archive() ) {

            /**
             * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
             */
            echo '<li class="breadcrumb-item"><span>'. $wp_obj->label .'</span></li>';

        } elseif ( is_date() ) {

            /**
             * 日付アーカイブ ( $wp_obj : null )
             */
            $year  = get_query_var('year');
            $month = get_query_var('monthnum');
            $day   = get_query_var('day');

            if ( $day !== 0 ) {
                //日別アーカイブ
                echo '<li class="breadcrumb-item"><a href="'. get_year_link( $year ).'"><span>'. $year .'年</span></a></li>'.
                     '<li class="breadcrumb-item"><a href="'. get_month_link( $year, $month ). '"><span>'. $month .'月</span></a></li>'.
                     '<li class="breadcrumb-item"><span>'. $day .'日</span></li>';

            } elseif ( $month !== 0 ) {
                //月別アーカイブ
                echo '<li class="breadcrumb-item"><a href="'. get_year_link( $year ).'"><span>'.$year.'年</span></a></li>'.
                     '<li class="breadcrumb-item"><span>'.$month . '月</span></li>';

            } else {
                //年別アーカイブ
                echo '<li class="breadcrumb-item"><span>'.$year.'年</span></li>';

            }

        } elseif ( is_author() ) {

            /**
             * 投稿者アーカイブ ( $wp_obj : WP_User )
             */
            echo '<li class="breadcrumb-item"><span>'. $wp_obj->display_name .' の執筆記事</span></li>';

        } elseif ( is_archive() ) {

            /**
             * タームアーカイブ ( $wp_obj : WP_Term )
             */
            $term_id   = $wp_obj->term_id;
            $term_name = $wp_obj->name;
            $tax_name  = $wp_obj->taxonomy;

            /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

            // 親ページがあれば順番に表示
            if ( $wp_obj->parent !== 0 ) {

                $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
                foreach( $parent_array as $parent_id ) {
                    $parent_term = get_term( $parent_id, $tax_name );
                    echo '<li class="breadcrumb-item">'.
                            '<a href="'. get_term_link( $parent_id, $tax_name ) .'">'.
                                '<span>'. $parent_term->name .'</span>'.
                            '</a>'.
                         '</li>';
                }
            }

            // ターム自身の表示
            echo '<li class="breadcrumb-item active" aria-current="page">'.
                    '<span>'. $term_name .'</span>'.
                '</li>';


        } elseif ( is_search() ) {

            /**
             * 検索結果ページ
             */
            echo '<li class="breadcrumb-item active"><span>「'. get_search_query() .'」で検索した結果</span></li>';

        
        } elseif ( is_404() ) {

            /**
             * 404ページ
             */
            echo '<li class="breadcrumb-item active"><span>お探しの記事は見つかりませんでした。</span></li>';

        } else {

            /**
             * その他のページ（無いと思うが一応）
             */
            echo '<li class="breadcrumb-item active"><span>'. get_the_title() .'</span></li>';
        }

        echo '</ol></nav>';  // 冒頭に合わせて閉じタグ

    }
}

remove_action('do_feed_rdf', 'do_feed_rdf');
remove_action('do_feed_rss', 'do_feed_rss');
remove_action('do_feed_rss2', 'do_feed_rss2');
remove_action('do_feed_atom', 'do_feed_atom');

remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
?>