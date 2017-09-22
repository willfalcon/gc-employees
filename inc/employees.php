<?php


  function gc_update_logged_in_employee() {

    if ( get_field( 'logged_in_employee' ) ) {

      $loggedInEmp = get_field( 'logged_in_employee' );

    }

    if ( get_field( 'logged_in_employee_pin' ) ) {

      $loggedInEmpPIN = get_field( 'logged_in_employee_pin' );

    }

    if (get_field( 'logged_in_employee_index' ) ) {

      $loggedInEmpIndex = get_field( 'logged_in_employee_index' );

    }

  }



  function gc_get_time_elapsed( $ih, $im, $oh, $om ) {

    $im += $ih * 60;

    $om += $oh * 60;

    $difm = $oh - $ih;

    $difhdec = $difm / 60;


    if ( $difhdec >= 0 && $difhdec < 1 ) {
      $n = 0;
    } elseif ( $difhdec >= 1 && $difhdec < 2 ) {
      $n = 1;
    } elseif ( $difhdec >= 2 && $difhdec < 3 ) {
      $n = 2;
    } elseif ( $difhdec >= 3 && $difhdec < 4 ) {
      $n = 3;
    } elseif ( $difhdec >= 4 && $difhdec < 5 ) {
      $n = 4;
    } elseif ( $difhdec >= 5 && $difhdec < 6 ) {
      $n = 5;
    } elseif ( $difhdec >= 6 && $difhdec < 7 ) {
      $n = 6;
    } elseif ( $difhdec >= 7 && $difhdec < 8 ) {
      $n = 7;
    } elseif ( $difhdec >= 8 && $difhdec < 9 ) {
      $n = 8;
    } elseif ( $difhdec >= 9 && $difhdec < 10 ) {
      $n = 9;
    } elseif ( $difhdec >= 10 && $difhdec < 11 ) {
      $n = 10;
    } elseif ( $difhdec >= 11 && $difhdec < 12 ) {
      $n = 11;
    } elseif ( $difhdec >= 12 && $difhdec < 13 ) {
      $n = 12;
    }

    $difh = $n;
    $difmdec = $difhdec - $n;
    $difm = $difmdec * 60;

    $timeElapsed = array(
      'hours' => $difh,
      'minutes' => $difm
     );

    return $timeElapsed;

  }



  function gc_actually_get_time_elapsed() {

    $ih = get_sub_field( 'clock_in_hour' );
    $im = get_sub_field( 'clock_in_minute' );
    $oh = date_i18n( 'H' );
    $om = date_i18n( 'i' );

    $im += $ih * 60;

    $om += $oh * 60;

    $difm = $oh - $ih;

    $difhdec = $difm / 60;


    if ( $difhdec >= 0 && $difhdec < 1 ) {
      $n = 0;
    } elseif ( $difhdec >= 1 && $difhdec < 2 ) {
      $n = 1;
    } elseif ( $difhdec >= 2 && $difhdec < 3 ) {
      $n = 2;
    } elseif ( $difhdec >= 3 && $difhdec < 4 ) {
      $n = 3;
    } elseif ( $difhdec >= 4 && $difhdec < 5 ) {
      $n = 4;
    } elseif ( $difhdec >= 5 && $difhdec < 6 ) {
      $n = 5;
    } elseif ( $difhdec >= 6 && $difhdec < 7 ) {
      $n = 6;
    } elseif ( $difhdec >= 7 && $difhdec < 8 ) {
      $n = 7;
    } elseif ( $difhdec >= 8 && $difhdec < 9 ) {
      $n = 8;
    } elseif ( $difhdec >= 9 && $difhdec < 10 ) {
      $n = 9;
    } elseif ( $difhdec >= 10 && $difhdec < 11 ) {
      $n = 10;
    } elseif ( $difhdec >= 11 && $difhdec < 12 ) {
      $n = 11;
    } elseif ( $difhdec >= 12 && $difhdec < 13 ) {
      $n = 12;
    }

    $difh = $n;
    $difmdec = $difhdec - $n;
    $difm = $difmdec * 60;

    $timeElapsed = array(
      'hours' => $difh,
      'minutes' => $difm
     );

    return $timeElapsed;

  }



  function gc_log_out_employee() {

    $empExit = esc_html( $_POST['emp_exit'] );

    if ( $empExit == 'Y' ) {

      update_field( 'field_59c29d6a3d5c8', 'none', 11 );
      update_field( 'field_59c2cef84b188', 'none', 11 );
      update_field( 'field_59c2f8caeb53e', 0, 11 );

    }
  }


 ?>
