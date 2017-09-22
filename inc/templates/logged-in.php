<?php

  $enteredPin = esc_html( $_POST['gc_emp_pin'] ) ;

  if ( have_rows( 'employees', 'option' ) ) : while ( have_rows( 'employees', 'option' ) ) : the_row();

    if ( get_sub_field( 'employee_pin' ) == $enteredPin ) {
      $empName = get_sub_field( 'employee_name' );
      $empPIN = get_sub_field( 'employee_pin' );
      $empRowIndex = get_row_index();
      update_field( 'logged_in_employee', $empName );
      update_field( 'logged_in_employee_pin', $empPIN );
      update_field( 'logged_in_employee_index', $empRowIndex );
      //$empNo = get_row_index();
    }

  endwhile; endif;

?>

<h3>Welcome, <?php the_field( 'logged_in_employee' ); ?>!</h3>

<form name="emp-clock-in-form" method="post" action="">
  <input type="hidden" name="emp_clock_in" value="Y">
  <button type="submit" class="btn btn-outline-success btn-lg mt-5">Clock In</button>
</form>
