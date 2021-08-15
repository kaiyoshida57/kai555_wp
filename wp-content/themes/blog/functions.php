<?php

function add_files() {
	// WordPress本体のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	
}
add_action( 'wp_enqueue_scripts', 'add_files' );

function my_scripts() {
  // common css/js
  // enqueueの第1引数は、'-style','-script'形式にする 第5引数をtrueにすると終了body前に出力される。
  wp_enqueue_style( 'common-style', get_template_directory_uri() . '/common/css/style.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', "", "20210809", false );
  wp_enqueue_script( 'common-script', get_template_directory_uri() . '/common/js/common.js', array( 'jquery' ), '1.0.0', true );

  // part css/js
  if ( is_singular('news') ) {
    wp_enqueue_script( 'smart-single-script', get_template_directory_uri() . 'common/js/news.js', "", '1.0.0', true );
  }
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


// meta title output
add_theme_support( 'title-tag' );


// アイキャッチ画像を有効にする
add_theme_support('post-thumbnails');

// the_dateで同じ日付でも日付を表示
function my_the_post() {
  global $previousday;
  $previousday = '';
}
add_action( 'the_post', 'my_the_post' );

// デフォルトは無効なので投稿アーカイブの作成
function post_has_archive( $args, $post_type ) {
  if ( 'post' == $post_type ) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'articles';
  }
  return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

// -------カスタム投稿----------

function create_my_post_types() {
  register_post_type(
    'other',
    array(
      'label' => 'その他投稿',
      'labels' => array(
        'add_new' => '新規その他投稿追加',
        'edit_item' => 'その他投稿の編集',
        'view_item' => 'その他投稿を表示',
        'search_items' => 'その他投稿を検索',
        'not_found' => 'その他投稿は見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱にその他投稿はありませんでした。',
      ),
      'public' => true,
      'description' => 'カスタム投稿タイプ「その他投稿」の説明文です。',
      'hierarchicla' => false, 
      'has_archive' => true,
      'show_in_rest' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt', 
        'custom-fields',
        'revisions'
      ),
      'menu_position' => 5,
      'taxonomies' => array('cat_other', 'tag_other')
    )
  );

  // taxonomy category
  register_taxonomy(
    'cat_other',
    'other',
    array(
      'label' => 'その他投稿カテゴリー',
      'labels' => array(
        'popular_items' => 'よく使うその他投稿カテゴリー',
        'edit_item' =>'その他投稿カテゴリーを編集',
        'add_new_item' => '新規その他投稿カテゴリーを追加',
        'search_items' => 'その他投稿カテゴリーを検索'
      ),
      'public' => true,
      'description' => 'その他投稿カテゴリーの説明文です。',
      'hierarchical' => true,
      'show_in_rest' => true
    )
  );
  
  // taxonomy tag
  register_taxonomy(
    'tag_other',
    'other',
    array(
      'label' => 'その他投稿タグ',
      'labels' => array(
        'popular_items' => 'よく使うその他投稿タグ',
        'edit_item' =>'その他投稿タグを編集',
        'add_new_item' => '新規その他投稿タグを追加',
        'search_items' => 'その他投稿タグを検索'
      ),
      'public' => true,
      'description' => 'その他投稿タグの説明文です。', 
      'hierarchical' => false, //タグ形式
      'update_count_callback' => '_update_post_term_count', 
      'show_in_rest' => true //Gutenberg で表示
    )
    );
}
add_action('init', 'create_my_post_types'); 

?>
