<?php

  $clockOut = esc_html( $_POST['emp_clock_out'] );

  if ( $clockOut == 'Y' ) {

    $loggedInEmpIndex = get_field( 'logged_in_employee_index' );

    if ( have_rows( 'clocked_in_employees' ) ) : while ( have_rows( 'clocked_in_employees' ) ) : the_row();

      if ( get_sub_field( 'clocked_in_employee_pin' ) == get_field( 'logged_in_employee_pin' ) ) {

        $deleteRow = get_row_index();
        $clockInTime = get_sub_field( 'current_clock_in_time');
        $clockInHour = get_sub_field( 'clock_in_hour' );
        $clockInMinute = get_sub_field( 'clock_in_minute' );
        $clockOutTime = date_i18n('H:i:s');
        $clockOutHour = date_i18n( 'H' );
        $clockOutMinute = date_i18n( 'i' );

        $timeElapsed = gc_get_time_elapsed( $clockInHour, $clockInMinute, $clockOutHour, $clockOutMinute );

        $timestamp = array(
          'time_id' => get_sub_field( 'current_timestamp_id' ),
          'date' => date_i18n('Ymd'),
          'clocked_in' => $clockInTime,
          'clocked_out' => $clockOutTime,
          'hours_clocked_in' => $timeElapsed['hours'],
          'minutes_clocked_in' => $timeElapsed['minutes']
        );

        add_sub_row( array('employees', $loggedInEmpIndex , 'timesheet'), $timestamp, 'option' );
        update_sub_field( array('employees', $loggedInEmpIndex, 'is_clocked_in'), false, 'option' );
        delete_row( 'clocked_in_employees', $deleteRow );

      }

    endwhile; endif;



  }

?>

<h3>Welcome, <?php the_field( 'logged_in_employee' ); ?>!</h3>

<form name="emp-clock-in-form" method="post" action="">
 <input type="hidden" name="emp_clock_in" value="Y">
 <button type="submit" class="btn btn-outline-success btn-lg mt-5">Clock In</button>
</form>
<h4><?php print_r( $timeElapsed ); ?></h4>

<h4>Time this shift: <?php echo $timeElapsed['hours'] . ' hours, ' . $timeElapsed['minutes'] . ' minutes.'; ?></h4>
