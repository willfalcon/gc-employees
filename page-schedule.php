<?php
  acf_form_head();
  get_header( 'dashboard' );

  //if ( have_posts() ) : while ( have_posts() ) : the_post();

?>


<nav class="navbar navbar-light gc-navbar">
  <div class="gc-emp-nav-logo navbar-brand">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-black.png" alt="Good Citizen Logo" class="img-fluid">
  </div>
  <div class="gc-exit-container">
    <form name="emp-exit" method="post" action="<?php bloginfo('url'); ?>">
      <input type="hidden" name="emp_exit" value="Y">
      <button type="submit" class="gc-exit-button btn btn-danger"><i class="fa fa-times fa-2x"></i></button>
    </form>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <?php get_template_part( '/inc/templates/dashboard', 'menu' ); ?>


    <?php get_template_part( '/inc/templates/schedule', 'edit' ); ?>


  </div>

<?php

  //endwhile; endif;
   get_footer();

 ?>
