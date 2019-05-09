</div><!-- #content -->

<footer>
    <div class="container">
        <div class="copyright">
            Copyright &copy;<?php echo date('Y') ?> <strong>Krip</strong>dom
        </div>
        <?php wp_nav_menu(array(
                'menu' => 'Footer Nav',
                'container' => '',
                'menu_class' => 'nav navbar-nav'
            )
        ); ?>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>