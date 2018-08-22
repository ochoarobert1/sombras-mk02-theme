<footer class="container-fluid" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="row">
        <div class="the-footer col no-paddingl no-paddingr">
            <div class="container">
                <div class="row">
                    <div class="footer-menu col-12">
                        <?php wp_nav_menu(array('container_class' => 'menu-footer', 'theme_location' => 'footer_menu', 'items_wrap' => '<ul id="%1$s" class="%2$s nav">%3$s</ul>' )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
