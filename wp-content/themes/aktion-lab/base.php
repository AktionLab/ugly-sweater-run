<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <?php get_template_part('templates/header'); ?>

  <div id="content" class="row" role="document">
    <?php if (roots_sidebar()) : ?>
      <aside id="sidebar" class="<?php roots_sidebar_class(); ?>" role="complementary">
        <?php get_template_part('templates/sidebar'); ?>
      </aside>
    <?php endif; ?>
    <div id="main" class="<?php roots_main_class(); ?>" role="main">
      <?php include roots_template_path(); ?>
    </div>
  </div><!--content-->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
