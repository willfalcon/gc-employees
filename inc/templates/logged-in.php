<?php

  $enteredPin = esc_html( $_POST['gc_emp_pin'] ) ;

  $args = array(
    'post_type' => 'employee',
  );
  $query = new WP_Query( $args );

  if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();

    if ( get_field( 'cpt_employee_pin' ) == $enteredPin ) {
      $empName = get_the_title();
      $empPIN = get_field( 'cpt_employee_pin' );
      $empPostID = $post->ID;
      //$empNo = get_row_index();
    }

  endwhile; endif; wp_reset_postdata();


  update_field( 'logged_in_employee', $empName );
  update_field( 'logged_in_employee_pin', $empPIN );
  update_field( 'logged_in_employee_id', $empPostID );
?>

<h3>Welcome, <?php the_field( 'logged_in_employee' ); ?>!</h3>

<form name="emp-clock-in-form" method="post" action="">
  <input type="hidden" name="emp_clock_in" value="Y">
  <button type="submit" class="btn btn-outline-success btn-lg mt-5">Clock In</button>
</form>
