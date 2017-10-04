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

  function gc_excerpt( $message ) {

    $excerpt = substr( $message, 0, 90 );

    if ( strlen( $message ) > strlen( $excerpt ) ) {

      $excerpt .= '...';

    }

    echo $excerpt;

  }

  function gcTwelveToTwentyfourHours( $time ) {
    $amOrPm = substr( $time, -2 );
    $hours = substr( $time, 0, -6 );

    if ( $amOrPm == 'AM' ) {
      if ( strlen( $hours ) == 1 ) {
        $hours = '0' . $hours;
        return $hours;
      } else {
        return $hours;
      }
    }

    if ( $amOrPm == 'PM' ) {
      switch ( $hours ) {
        case '12':
          return $hours;
          break;
        case '1':
          $hours = '13';
          break;
        case '2':
          $hours = '14';
          break;
        case '3':
          $hours = '15';
          break;
        case '4':
          $hours = '16';
          break;
        case '5':
          $hours = '17';
          break;
        case '6':
          $hours = '18';
          break;
        case '7':
          $hours = '19';
          break;
        case '8':
          $hours = '20';
          break;
        case '9':
          $hours = '21';
          break;
        case '10':
          $hours = '22';
          break;
        case '11':
          $hours = '23';
          break;
        case '12':
          $hours = '24';
          break;
      }
      return $hours;
    }

  }

function gcGetFullMonth( $date ) {

  $mm = substr( $date, 4, 2 );

  switch ( $mm ) {
    case '01':
      return 'January';
      break;
    case '02':
      return 'February';
      break;
    case '03':
      return 'March';
      break;
    case '04':
      return 'April';
      break;
    case '05':
      return 'May';
      break;
    case '06':
      return 'June';
      break;
    case '07':
      return 'July';
      break;
    case '08':
      return 'August';
      break;
    case '09':
      return 'September';
      break;
    case '10':
      return 'October';
      break;
    case '11':
      return 'November';
      break;
    case '12':
      return 'December';
      break;
  }
}






 ?>
