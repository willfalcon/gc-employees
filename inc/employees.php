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



  function gc_log_out_employee() {

    $empExit = esc_html( $_POST['emp_exit'] );

    if ( $empExit == 'Y' ) {

      update_field( 'field_59c29d6a3d5c8', 'none', 11 );
      update_field( 'field_59c2cef84b188', 'none', 11 );
      update_field( 'field_59c2f8caeb53e', 0, 11 );

    }
  }


 ?>
