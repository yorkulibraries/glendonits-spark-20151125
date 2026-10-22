<article id="post-<?php the_ID(); ?>" role="article">
    <header>    
        <div class="page-header-no-title"></div>
    </header> <!-- end article header -->
    <section class="post_content">
        <?php
        if (has_post_thumbnail()) {

            the_post_thumbnail();
        }

        the_content();
        ?>
    </section> <!-- end article section -->

</article> <!-- end article -->
