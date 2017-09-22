<?php

  if ( isset( $_POST['gc_emp_pin'] ) ) {

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

  }

  //
  // if ( have_rows( 'employees', 'option' ) ) : while ( have_rows( 'employees', 'option' ) ) : the_row();
  //
  //   if ( get_sub_field( 'employee_name' ) == get_field( 'logged_in_employee' ) ) {
  //
  //     $rowIndex = get_row_index();
  //     // $isClockedIn = get_sub_field( 'is_clocked_in' );
  //
  //   }
  //
  // endwhile; endif;

  if ( get_field( 'logged_in_employee' ) ) {
    $loggedInEmp = get_field( 'logged_in_employee' );
  }
  if ( get_field( 'logged_in_employee_pin' ) ) {
    $loggedInEmpPIN = get_field( 'logged_in_employee_pin' );
  }
  if (get_field( 'logged_in_employee_index' ) ) {
    $loggedInEmpIndex = get_field( 'logged_in_employee_index' );
  }

  if ( isset( $_POST['emp_clock_in'] ) ) {

    $clockIn = esc_html( $_POST['emp_clock_in'] );

    if ( $clockIn == 'Y' ) {

      $time_id = $loggedInEmpPIN . date_i18n('Ymd') . date_i18n('H:i:s');

      // MOVE THIS TO CLOCK OUT FUNCTION
      // $timestamp = array(
      // 	'date' => date_i18n('Ymd'),
      // 	'clocked_in' => date_i18n('H:i:s'),
      //   'time_id' => $time_id
      // );
      //
      // add_sub_row( array('employees', $rowIndex , 'timesheet'), $timestamp, 'option' );

      $empClockIn = array(
        'clocked_in_employee' => $loggedInEmp,
        'clocked_in_employee_pin' => $loggedInEmpPIN,
        'current_timestamp_id' => $time_id,
        'current_clock_in_time' => date_i18n('H:i:s')
      );

      add_row( 'clocked_in_employees', $empClockIn );
      // update_sub_field( 'logged_in_employees');
      update_sub_field( array('employees', $loggedInEmpIndex, 'is_clocked_in'), true, 'option' );

    }

  }


  if ( isset( $_POST['emp_clock_out'] ) ) {

    $clockOut = esc_html( $_POST['emp_clock_out'] );

    if ( $clockOut == 'Y' ) {


      if ( have_rows( 'clocked_in_employees' ) ) : while ( have_rows( 'clocked_in_employees' ) ) : the_row();

          //finish clock out code
        if ( get_sub_field( 'clocked_in_employee_pin' ) == get_field( 'logged_in_employee_pin' ) ) {

          $deleteRow = get_row_index();

          $timestamp = array(
            'time_id' => get_sub_field( 'current_timestamp_id' ),
          	'date' => date_i18n('Ymd'),
          	'clocked_in' => get_sub_field( 'current_clock_in_time'),
            'clocked_out' => date_i18n('H:i:s')
          );

          add_sub_row( array('employees', $loggedInEmpIndex , 'timesheet'), $timestamp, 'option' );
          update_sub_field( array('employees', $loggedInEmpIndex, 'is_clocked_in'), false, 'option' );

        }

      endwhile; endif;

      delete_row( 'clocked_in_employees', $deleteRow );

    }

  }



  get_header();


  if ( have_rows( 'employees', 'option' ) ) : while ( have_rows( 'employees', 'option' ) ) : the_row();
    if ( get_sub_field( 'employee_name' ) == get_field( 'logged_in_employee' ) ) {
      $isClockedIn = get_sub_field( 'is_clocked_in' );
    }
  endwhile; endif;

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="row">
  <div class="col-12 gc-exit">
    <form name="emp-exit" method="post" action="<?php bloginfo('url'); ?>">
      <input type="hidden" name="emp_exit" value="Y">
      <button type="submit" class="gc-exit-button btn btn-danger"><i class="fa fa-times fa-3x"></i></button>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="gc-emp-card gc-emp-card-loggedin">
      <h3>Welcome, <?php the_field( 'logged_in_employee' ); ?>!</h3>

      <?php if ( $isClockedIn == true ) : ?>
        <form name="emp-clock-out-form" method="post" action="">
          <input type="hidden" name="emp_clock_out" value="Y">
          <button type="submit" class="btn btn-outline-danger btn-lg mt-5">Clock Out</button>
        </form>
      <?php else : ?>
        <form name="emp-clock-in-form" method="post" action="">
          <input type="hidden" name="emp_clock_in" value="Y">
          <button type="submit" class="btn btn-outline-success btn-lg mt-5">Clock In</button>
        </form>
      <?php endif; ?>

  </div>
</div>





<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>
