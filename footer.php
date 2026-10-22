<?php ?>
<div id="mobile-search" class="container container-fluid">
    <form id="main-search-mobile" class="form-inline" action="<?php echo _e('Site search url', 'glendon'); ?>" method="get">
        <div class="form-group">
            <!--<label class="sr-only" for="q"></label>-->
            <input type="text" class="form-control" id="q-mobile" name="q" placeholder="<?php echo _e('Search Glendon', 'glendon'); ?>" title="<?php echo _e('Search Glendon', 'glendon'); ?>">
            <button type="submit" class="btn btn-glendon-blue"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </form>
</div>
</div> <!--Close original container-->
<div  id="glendon-footer"  >

    <div class="container">
        <div id="footer-links-wrapper" class="row">
            <ul class="footer-links">
                <li><a href="<?php echo _e('Glendon footer url', 'glendon'); ?>"><?php echo _e('Glendon', 'glendon'); ?></a></li>
                <li><a href="<?php echo _e('Yorku footer url', 'glendon'); ?>"><?php echo _e('York University', 'glendon'); ?></a></li>
                <li><a href="<?php echo _e('Contact Glendon url', 'glendon'); ?>"><?php echo _e('Contact Glendon', 'glendon'); ?></a></li>
                <li><a href="<?php echo _e('Website comment url', 'glendon'); ?>"><?php echo _e('Website comment', 'glendon'); ?></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php if (is_active_sidebar('footer-sidebar-1')) : ?>

                    <?php dynamic_sidebar('footer-sidebar-1'); ?>

                <?php endif; ?>
            </div><!-- .first column -->
            <div class="col-md-4">
                <?php if (is_active_sidebar('footer-sidebar-2')) : ?>

                    <?php dynamic_sidebar('footer-sidebar-2'); ?>

                <?php endif; ?>
            </div><!-- .second column -->
            <div class="col-md-4">
                <?php
                $footer_menu = wp_nav_menu(array('theme_location' => 'footer-links', 'menu_id' => 'footerlinks', 'menu_id' => 'row', 'menu_class' => 'list-group', 'fallback_cb' => false, 'echo' => true));
                ?>
                <?php if (is_active_sidebar('footer-sidebar-3')) : ?>

                    <?php dynamic_sidebar('footer-sidebar-3'); ?>

                <?php endif; ?>
            </div><!-- .menu -->
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54028600-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
