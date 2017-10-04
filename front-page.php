
<?php

  if ( isset( $_POST['emp_exit'] ) ) {

    $empExit = esc_html( $_POST['emp_exit'] );

    if ( $empExit == 'Y' ) {

      update_field( 'field_59c29d6a3d5c8', 'none', 11 );
      update_field( 'field_59c2cef84b188', 'none', 11 );
      update_field( 'field_59c2f8caeb53e', 0, 11 );

    }
  }


  get_header();

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


  <div class="gc-emp-login-logo">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-white.png" alt="Good Citizen Logo" class="img-fluid">
  </div>

      <div class="gc-emp-card">

        <form name="gc_emp_login_form" method="post" action="<?php bloginfo('url'); ?>/dashboard/" class="gc-emp-login-form">

          <input type="hidden" name="gc_emp_login_submitted" value="Y">

          <input type="number" class="form-control gc-emp-password" name="gc_emp_pin" id="exampleInputPassword1" placeholder="PIN">

          <button id="gc-login" class="form-control btn btn-outline-secondary gc-login-btn" type="submit">Login</button>
        </form>

      </div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
