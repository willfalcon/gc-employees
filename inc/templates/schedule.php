<?php

  $empID = get_field( 'logged_in_employee_id' );
  

  if ( have_rows( 'schedule', 'option' ) ) :

?>

  <div class="tab-pane gc-schedule fade show active" id="list-schedule" role="tabpanel" aria-labelledby="list-schedule-list">

    <h4 class="text-center">My Schedule</h4>

    <ul class="list-group">

      <?php

        while ( have_rows( 'schedule', 'option' ) ) : the_row();

          $sched = get_sub_field( 'sched_date' );

          $schedDay = substr( $sched, 0, 3 );
          $schedDate = substr( $sched, -2 );

          if ( get_row_index() == 1 ) {
            $schedMonth = substr( $sched, 4, -3 );
          } else {
            if ( $schedMonth != substr( $sched, 4, -3 ) ) {
              $schedMonth = substr( $sched, 4, -3 );
            }
          }


          if ( have_rows( 'shifts', 'option' ) ) : while ( have_rows( 'shifts', 'option' ) ) : the_row();

            $emp = get_sub_field( 'employee' );

            if ( $emp->ID == $empID ) :

              ?>
              <?php if ( $schedMonth ) : ?>
                <li class="list-group-item">
                  <b><?php echo $schedMonth; ?></b>
                </li>
              <?php endif; ?>
              <li class="list-group-item gc-schedule-list">
                <div class="gc-date-block">
                  <div class="gc-date-block-top">
                    <?php echo $schedDay; ?>
                  </div>
                  <div class="gc-date-block-bottom">
                    <?php echo $schedDate; ?>
                  </div>
                </div>
                <div class="gc-schedule-item">
                 <?php the_sub_field( 'start_time' ); ?> - <?php the_sub_field( 'end_time' ); ?>
               </div>
              </li>

            <?php

          endif;

        endwhile; endif; endwhile;

      ?>

    </ul>

    <a class="gc-request-link" data-toggle="collapse" href="#requests" aria-expanded="false" aria-controls="requests">
      Requests
    </a>
    <div class="collapse" id="requests">
      <?php get_template_part( '/inc/templates/requests' ); ?>
    </div>
  </div>

<?php

 endif;

?>
