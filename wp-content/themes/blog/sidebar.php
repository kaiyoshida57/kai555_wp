
<aside class="aside">
  <nav class="sidenav" aria-label="side bar">
    <ul class="sidenav_list">
      <li class="sidenav_item sidenav_item-first">
        <a href="<?php echo esc_url(home_url()); ?>">TOP</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/articles/">ARTICLES</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/other/">OTHER ARTICLES</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/about/">ABOUT</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/profile/">PROFILE</a>
      </li>

    </ul>
    <ul class="sidenav_listCat">
      <li class="sidenav_item sidenav_item-first">
        <!-- <a href="<?php echo esc_url(home_url()); ?>">
          <?php echo the_category(); ?>
        </a> -->
      </li>
      <!-- <li>検索</li>
      <li>年別アーカイブ</li>
      <li>人気記事一覧</li> -->
      <li class="sidenav_item mt-5">Arsenal投稿のタグ<span class="icon_tag"></span>
        <ul class="tagBox">
        <?php
          // カテゴリータグをリンク・カウント付で出力
          $tags = get_tags();
          foreach( $tags as $tag) { 
          echo '<li class="sidenav_text"><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '(' . $tag->count . ')</a></li>';
          }
          ?>
        </ul>
      </li>
      <li class="sidenav_item mt-10">その他投稿のカテゴリー<span class="icon_category"></span>
        <ul class="tagBox">
        <?php
          // otherのタクソノミーをリンク・カウント付で出力
          $catlist = wp_list_categories(array(
            'taxonomy' => 'cat_other', // タクソノミーの指定
            'title_li' => '', // リストの外側に表示されるタイトルを非表示
            'show_count' => 1, // カテゴリの投稿数を表示
            'echo' => 0 // 設定した値を返す
          ));
          $catlist = preg_replace('/<\/a> (\([0-9]*\))/', ' <span>$1</span></a>', $catlist); // 投稿数をタグで囲う
          // $catlist = str_replace(array('(',')'), '', $catlist); // 投稿数を囲う（）を削除
          echo $catlist;
        ?>
        </ul>
      </li>
    </ul>
  </nav><!-- /.nav -->
</aside>
