
<?php

  if ( isset( $_POST['emp_exit'] ) ) {

    gc_log_out_employee();

  }

  get_header();

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <div class="gc-emp-login-logo">
        <?php the_custom_logo(); ?>
      </div>

      <div class="gc-emp-card">

        <form name="gc_emp_login_form" method="post" action="<?php bloginfo('url'); ?>/employee-dash/" class="gc-emp-login-form">

          <input type="hidden" name="gc_emp_login_submitted" value="Y">

          <input type="password" class="form-control gc-emp-password" name="gc_emp_pin" id="exampleInputPassword1" placeholder="PIN">

          <button id="gc-login" class="form-control btn btn-outline-secondary gc-login-btn" type="submit">Login</button>
        </form>

      </div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
