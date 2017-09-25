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


    if ( have_posts() ) : while ( have_posts() ) : the_post();



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

    <?php get_template_part( '/inc/templates/dashboard' ); ?>

    <div class="col-5">

        <div class="gc-dash-right gc-clock-in-out-container gc-card">

          <?php
            if ( isset( $_POST['gc_emp_pin'] ) ) {
              get_template_part( '/inc/templates/logged-in' );
            }

            // gc_update_logged_in_employee();

            if ( isset( $_POST['emp_clock_in'] ) ) {
              get_template_part( '/inc/templates/clocked-in' );
            }

            if ( isset( $_POST['emp_clock_out'] ) ) {
              get_template_part( '/inc/templates/clocked-out' );
            }
          ?>
        </div>

    </div>
  </div>

  <?php

  if ( have_rows( 'employees', 'option' ) ) : while ( have_rows( 'employees', 'option' ) ) : the_row();
    if ( get_sub_field( 'employee_name' ) == get_field( 'logged_in_employee' ) ) {
      $isClockedIn = get_sub_field( 'is_clocked_in' );
    }
  endwhile; endif;

?>





<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
