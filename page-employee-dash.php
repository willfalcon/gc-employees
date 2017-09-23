<?php

  get_header();

  if ( have_posts() ) : while ( have_posts() ) : the_post();

    get_template_part( '/inc/templates/exit' );

?>

    <div class="row">
      <div class="col-12">
        <div class="gc-emp-card gc-emp-card-loggedin">


          <?php

            if ( isset( $_POST['gc_emp_pin'] ) ) {

              get_template_part( '/inc/templates/logged-in' );

            }


            gc_update_logged_in_employee();


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

<?php  ?>

<?php  ?>







<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
