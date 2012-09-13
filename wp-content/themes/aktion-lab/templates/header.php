<div class="container">

<header id="banner" role="banner">
  <a class="brand sprite" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
  <nav id="nav-main" role="navigation">
    <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav snow')); ?>
  </nav>
  <ul id="socials">
    <li><a class="facebook sprite" href="http://www.facebook.com/TheUglySweaterRun" target="_blank">Facebook</a></li>
    <li><a class="twitter sprite" href="" target="_blank">Twitter</a></li>
    <li><a class="youtube sprite" href="" target="_blank">YouTube</a></li>
    <li><a class="pinterest sprite" href="" target="_blank">Pinterest</a></li>
  </ul>
</header>