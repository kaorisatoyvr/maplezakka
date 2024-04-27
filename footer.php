<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    
    <button id="goToTopBtn" title="Go to Top">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

                <?php
                    /**
                     * Functions hooked in to storefront_footer action
                     *
                     * @hooked storefront_footer_widgets - 10
                     * @hooked storefront_credit         - 20
                     */
                    do_action( 'storefront_footer' );
                ?>
		<div class="col-full">

                <div class="footer_logo">
                    <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="This is a logo with light pink heart and letter 'M'"/></a>
                </div>
                <div class="footer_navigation">
                        <?php
                            if (has_nav_menu('footer-left')) :
                        ?>
                        <nav>
                            <h2>Links</h2>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-left',
                                    'menu_id'        => 'quick-link-menu',
                                )
                            );
                            ?>
                        </nav>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="footer_contact">
                    <?php
                    if (has_nav_menu('footer-middle')) :
                    ?>
                        <h2>Contact Us</h2>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-middle',
                                )
                            );
                            ?>
                    <?php
                    endif;
                    ?>
                </div>
                
                <div class="footer_social_media">
                    <?php
                    if (has_nav_menu('footer-left')) :
                    ?>
                    
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'social-media',
                            )
                        );
                    ?>
                    <?php
                    endif;
                    ?>
                </div>
		</div><!-- .col-full -->
        
        <div>
            <div class="policy">
            <p><a href="https://maplezakka.com/privacy-policy/">Privacy Policy</a></p>
            </div>
            <div class="copy_write">
                <p>&copy; <?php echo date('Y'); ?> Maple Zakka <span></span> <a href="#"></a></p>
            </div>
        </div>

	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>