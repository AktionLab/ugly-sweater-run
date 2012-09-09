<footer id="content-info" class="container" role="contentinfo">
  <nav id="nav-footer" role="navigation">
    <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav snow')); ?>
  </nav>
  <a class="sponsor  sprite" href="" target="_blank">Samuel Adams, Official Sponsor of the Ugly Sweater Run</a>
  <p>&copy;<?php echo date('Y'); ?> Human Movement, LLC. All rights reserved.</p>
</footer>

</div><!--container-->
<?php wp_footer(); ?>