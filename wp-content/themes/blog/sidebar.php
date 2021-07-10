
<aside class="aside">
  <nav class="sidenav" aria-label="side bar">
    <ul class="sidenav_list">
      <li class="sidenav_item sidenav_item-first">
        <a href="<?php echo esc_url(home_url()); ?>" aria-label="blog's logo">TOP</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/about/">ABOUT</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/profile/">PROFILE</a>
      </li>
      <li class="sidenav_item">
        <a href="<?php echo esc_url(home_url()); ?>/news/">NEWS</a>
      </li>
    </ul>
    <ul class="sidenav_listCat">
      <li class="sidenav_item sidenav_item-first">
        <a href="<?php echo esc_url(home_url()); ?>" aria-label="blog's logo">
          <?php echo the_category(); ?>
        </a>
      </li>
    </ul>
  </nav><!-- /.nav -->
</aside>
