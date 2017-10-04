<?php

if ( isset( $_POST['gc_emp_pin'] ) ) {


  $enteredPin = esc_html( $_POST['gc_emp_pin'] ) ;

  $args = array(
    'post_type' => 'employee',
  );
  $query = new WP_Query( $args );

  $loginSuccess = false;
  if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();

    if ( get_field( 'employee_pin' ) == $enteredPin ) {
      $loginSuccess = true;
      $empName = get_the_title();
      $empPIN = get_field( 'employee_pin' );
      $empPostID = $post->ID;
      //$empNo = get_row_index();
    }

  endwhile; endif; wp_reset_postdata();

  if ( $loginSuccess == true ) {
    update_field( 'logged_in_employee', $empName );
    update_field( 'logged_in_employee_pin', $empPIN );
    update_field( 'logged_in_employee_id', $empPostID );
  } else {
    $home = bloginfo( 'url' );
    wp_redirect( $home );
    exit;
  }

}

  acf_form_head();
  get_header( 'dashboard' );



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

    <?php get_template_part( '/templates/dashboard', 'menu' ); ?>
    <?php get_template_part( '/templates/dashboard', 'center' ); ?>
    <?php get_template_part( '/templates/dashboard', 'right' ); ?>


  </div>




<?php get_footer(); ?>
