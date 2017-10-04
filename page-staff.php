<?php

  acf_form_head();

  get_header( 'dashboard' );

  get_template_part( '/templates/exit' );

  ?>



<div class="container-fluid">
  <div class="row">

    <?php get_template_part( '/templates/dashboard', 'menu' ); ?>
    <?php get_template_part( '/templates/staff' ); ?>

  </div>




<?php get_footer(); ?>
