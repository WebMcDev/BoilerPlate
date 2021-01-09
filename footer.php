    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-end">
                <p class="small"><a href="https://dxagency.com/" target="_blank">Dxagency.com</a> | <?php if (get_permalink( get_page_by_title( 'Privacy Policy' )) !== '' ) { ?><a href="<?php echo get_permalink( get_page_by_title( 'Privacy Policy' )); ?>">Privacy Policy</a> | <?php } ?> <?php echo date('Y'); ?> ©</p>
            </div>
        </div>
    </div>
    <?php wp_footer();?>
    </body>
</html>