<div id="hero">
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
  <nav id="nav-cities" role="navigation">
    <?php wp_nav_menu(array('theme_location' => 'cities_navigation', 'menu_class' => 'nav')); ?>
  </nav>
</div>
<div id="home-boxes" class="row">
  <div class="hb-about span3">
    <h2><a href="">What is it?</a></h2>
  </div>
  <div class="hb-find span3">
    <h2><a href="">Find a run</a></h2>
  </div>
  <div class="hb-gallery span3">
    <h2><a href="">Gallery</a></h2>
  </div>
  <div class="hb-press span3">
    <h2><a href="">Press</a></h2>
  </div>
</div><!--row-->  