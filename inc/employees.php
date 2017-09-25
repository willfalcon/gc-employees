<?php


  function gc_update_logged_in_employee( $pin ) {

    $args = array(
      'post_type' => 'employee',
    );
    $query = new WP_Query( $args );

    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();

      if ( get_field( 'employee_pin' ) == $pin ) {
        $empName = get_the_title();
        $empPIN = get_field( 'employee_pin' );
        $empPostID = $post->ID;
        //$empNo = get_row_index();
      }

    endwhile; endif; wp_reset_postdata();


    update_field( 'logged_in_employee', $empName );
    update_field( 'logged_in_employee_pin', $empPIN );
    update_field( 'logged_in_employee_id', $empPostID );

  }



  function gc_log_out_employee() {

    $empExit = esc_html( $_POST['emp_exit'] );

    if ( $empExit == 'Y' ) {

      update_field( 'field_59c29d6a3d5c8', 'none', 11 );
      update_field( 'field_59c2cef84b188', 'none', 11 );
      update_field( 'field_59c2f8caeb53e', 0, 11 );

    }
  }

  function gc_display_name( $empPostID ) {



    if ( get_field( 'display_name', $empPostID ) ) {
      echo get_field( 'display_name', $empPostID );
    } else {
      echo get_the_title( $empPostID );
    }

  }

  function gc_greeting() {

    $hour = date_i18n( 'H' );

    if ( $hour < 12 ) {
      echo 'Good morning, ';
    } elseif ( $hour >= 12) {
      echo 'Good afternoon, ';
    } elseif ( $hour > 16 ) {
      echo 'Good evening, ';
    }

  }

 ?>
