<div id="hero">
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
  <nav id="nav-cities" role="navigation">
    <?php wp_nav_menu(array('theme_location' => 'cities_navigation', 'menu_class' => 'nav')); ?>
  </nav>
</div><!--hero-->

  
<h1 id="hero-subhead">
  <span class="sprite"></span>
  The Ugliest 5k on the Planet!
  <span class="sprite"></span>
</h1>

<div id="home-boxes" class="row">
  <a class="hb-about sprite span3" href="/about">
    <h2>What is it?</h2>
  </a>
  <a class="hb-find sprite span3" href="/locations">
    <h2>Find a run</h2>
  </a>
  <a class="hb-gallery sprite span3" href="/gallery">
    <h2>Gallery</h2>
  </a>
  <a class="hb-press sprite span3" href="/press">
    <h2>Press</h2>
  </a>
</div><!--home-boxes-row-->  