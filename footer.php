<footer class="container-fluid" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row">
        <div class="the-footer col-12">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'sidebar_footer' ) ) : ?>
                    <div class="footer-menu col">
                        <ul id="sidebar-footer">
                            <?php dynamic_sidebar( 'sidebar_footer' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar_footer-2' ) ) : ?>
                    <div class="footer-menu col">
                        <ul id="sidebar-footer">
                            <?php dynamic_sidebar( 'sidebar_footer-2' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar_footer-3' ) ) : ?>
                    <div class="footer-menu col">
                        <ul id="sidebar-footer">
                            <?php dynamic_sidebar( 'sidebar_footer-3' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar_footer-4' ) ) : ?>
                    <div class="footer-menu col">
                        <ul id="sidebar-footer">
                            <?php dynamic_sidebar( 'sidebar_footer-4' ); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-copyright col-12">
            <script language="JavaScript" type="text/javascript">
                TrustLogo("https://sombrasarmy.com/wp-content/themes/sombras-mk01-theme/images/logo.png", "CL1", "none");
            </script>
            <a  href="https://ssl.comodo.com" id="comodoTL">Comodo SSL</a>
            <h6>2017 - <?php _e('Todos los derechos reservados', 'sonbras'); ?> - <?php _e('Desarrollado por ')?><a href="http://robertochoa.com.ve/?utm_source=footer&utm_medium=link&utm_content=sombrasarmy" target="_blank" title="<?php _e('Visita mi sitio web', 'sombras'); ?>">Robert Ochoa</a></h6>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
