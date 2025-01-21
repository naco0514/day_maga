<?php
/*----------------------------------------------------------*/
/* 標準機能を拡張 */
/*----------------------------------------------------------*/
function my_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action("after_setup_theme", "my_setup");

/*----------------------------------------------------------*/
/* CSSとJavaScriptの読み込み */
/*----------------------------------------------------------*/

function my_script_init()
{
    // スワイパーCSS
    wp_enqueue_style("swiper-css", get_template_directory_uri() . "/assets/css/lib/swiper-bundle.min.css", array(), filemtime(get_theme_file_path('/assets/css/lib/swiper-bundle.min.css')), "all");
    // 自作CSS
    wp_enqueue_style("my-css", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path('/assets/css/style.css')), "all");
    // スワイパーJS
    wp_enqueue_script("swiper-js", get_template_directory_uri() . "/assets/js/lib/swiper-bundle.min.js", array("jquery"), filemtime(get_theme_file_path('/assets/js/lib/swiper-bundle.min.js')), true);
    // 自作JS
    wp_enqueue_script("my-js", get_template_directory_uri() . "/assets/js/script.js", array("jquery"), filemtime(get_theme_file_path('/assets/js/script.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");; ?>



<?php
    /*----------------------------------------------------------*/
    /* 投稿の表示変更 */
    /*----------------------------------------------------------*/; ?>


