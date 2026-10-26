<?php
/** Native page links: keyboard activation and tab order are provided by the browser. */
$is_french = isset($_SESSION['slang']) && $_SESSION['slang'] === 'fr';
$previous_page = get_field('previous_page');
$next_page = get_field('next_page');
$home_page = add_query_arg('l', $is_french ? 'fr' : 'en', home_url('/'));
?>
<nav class="content-bottom-navigation-page-controls" aria-label="<?php echo $is_french ? 'Navigation du module' : 'Module page navigation'; ?>"<?php echo $is_french ? ' lang="fr"' : ''; ?>>
    <?php if ($previous_page) : ?>
        <a href="<?php echo esc_url($previous_page); ?>" class="content-bottom-back-button" rel="prev" aria-label="<?php echo $is_french ? 'Page précédente' : 'Previous page'; ?>">
            <span aria-hidden="true">←</span> <?php echo $is_french ? 'Précédent' : 'Previous'; ?>
        </a>
    <?php else : ?>
        <span class="content-bottom-back-button-x" aria-hidden="true"></span>
    <?php endif; ?>
    <?php if ($next_page) : ?>
        <a href="<?php echo esc_url($next_page); ?>" class="content-bottom-next-button" rel="next" aria-label="<?php echo $is_french ? 'Page suivante' : 'Next page'; ?>">
            <span aria-hidden="true">→</span> <?php echo $is_french ? 'Suivant' : 'Next'; ?>
        </a>
    <?php else : ?>
        <a href="<?php echo esc_url($home_page); ?>" class="content-bottom-home-button" aria-label="<?php echo $is_french ? 'Accueil SPARK' : 'SPARK Home'; ?>">
            <span aria-hidden="true">⌂</span> <?php echo $is_french ? 'Accueil' : 'Home'; ?>
        </a>
    <?php endif; ?>
</nav>
