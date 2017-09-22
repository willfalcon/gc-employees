<?php

  $clockIn = esc_html( $_POST['emp_clock_in'] );

  if ( $clockIn == 'Y' ) {

    $loggedInEmp = get_field( 'logged_in_employee' );
    $loggedInEmpPIN = get_field( 'logged_in_employee_pin' );
    $loggedInEmpIndex = get_field( 'logged_in_employee_index' );

    $time_id = $loggedInEmpPIN . date_i18n( 'Ymd' ) . date_i18n( 'H:i:s' );

    $empClockIn = array(
      'clocked_in_employee' => $loggedInEmp,
      'clocked_in_employee_pin' => $loggedInEmpPIN,
      'current_timestamp_id' => $time_id,
      'current_clock_in_time' => date_i18n( 'H:i:s' ),
      'clock_in_hour' => date_i18n( 'H' ),
      'clock_in_minute' => date_i18n( 'i' )
    );

    add_row( 'clocked_in_employees', $empClockIn );
    update_sub_field( array('employees', $loggedInEmpIndex, 'is_clocked_in'), true, 'option' );

  }

?>

<h3>Welcome, <?php the_field( 'logged_in_employee' ); ?>!</h3>

<form name="emp-clock-out-form" method="post" action="">
  <input type="hidden" name="emp_clock_out" value="Y">
  <button type="submit" class="btn btn-outline-danger btn-lg mt-5">Clock Out</button>
</form>
