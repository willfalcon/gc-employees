<?php

  $rawDate = get_field( 'thu_date', false, false );

  $month = gcGetFullMonth( $rawDate );

?>

<button type="button" data-toggle="modal" data-target="#sched-modal-<?php echo $rawDate; ?>">

  <div class="gc-card gc-sched-day">

    <h5>Thursday</h5>
    <h6><?php echo $month; ?></h6>
    <p><?php the_field( 'thu_date' ); ?></p>

  </div>

</button>


<div class="modal fade" id="sched-modal-<?php echo $rawDate; ?>" tabindex="-1" role="dialog" aria-labelledby="thu_<?php echo $month . '_'; the_field( 'thu_date' ); ?>_label" aria-hidden="true">
  <div class="modal-dialog gc-shifts-modal" role="document">
    <div class="modal-content">

      <div class="modal-header gc-week-header">
        <h5 class="modal-title">Thursday, <?php echo $month . ' '; the_field( 'thu_date' ); ?></h5>
      </div>

      <div class="modal-body">
        <div class="gc-sched-shifts">

          <?php

            $shiftOptions = array(
              'id' => 'add_shifts_' . $rawDate,
              'fields' => array(
                'field_59d3a2cf72ba5'
              ),
              'submit_value' => 'Save Shifts',
              'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
              'updated_message' => false
            );

            acf_form( $shiftOptions );

          ?>

        </div>
      </div>

    </div>
  </div>
</div>
