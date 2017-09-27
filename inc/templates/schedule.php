<?php

  $empID = get_field( 'logged_in_employee_id' );


  if ( have_rows( 'schedule', 'option' ) ) :

?>

  <div class="tab-pane gc-schedule fade" id="list-schedule" role="tabpanel" aria-labelledby="list-schedule-list">

    <h4 class="text-center">My Schedule</h4>

    <ul class="list-group">

      <?php

        $hadShifts = false;

        while ( have_rows( 'schedule', 'option' ) ) : the_row();

          $sched = get_sub_field( 'sched_date' );

          $schedDay = substr( $sched, 0, 3 );
          $schedDate = substr( $sched, -2 );
          $schedMonth = substr( $sched, 4, -3 );

          if ( get_row_index() == 1 ) :
            $currMonth = $schedMonth; ?>
            <li class="list-group-item">
              <b><?php echo $schedMonth; ?></b>
            </li>
          <?php endif;

          if ( $schedMonth != $currMonth ) :
               $currMonth = $schedMonth; ?>
           <li class="list-group-item">
             <b><?php echo $schedMonth; ?></b>
           </li>
          <?php endif;



          if ( have_rows( 'shifts', 'option' ) ) : while ( have_rows( 'shifts', 'option' ) ) : the_row();

            $emp = get_sub_field( 'employee' );

            if ( $emp->ID == $empID ) :

              $hadShifts = true;

              ?>

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

        if ( ! $hadShifts ) :
          ?>
            <li class="list-group-item">
              <div class="gc-schedule-item">
                No shifts currently scheduled.
              </div>
            </li>
          <?php
        endif;
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
