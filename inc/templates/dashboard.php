<div class="col-2 gc-dash-left gc-card">
  <div class="list-group" id="list-tab" role="tablist">

    <?php

    $empID = get_field( 'logged_in_employee_id' );

    if ( have_rows( 'schedule', 'option' ) ) :

      $schedules = true;

      ?>

        <a class="list-group-item list-group-item-action" id="list-schedule-list" data-toggle="list" href="#list-schedule" role="tab" aria-controls="schedule"><i class="fa fa-calendar fa-lg"></i>  Schedule</a>

      <?php

    endif;

      ?>

      <a class="list-group-item list-group-item-action" id="list-info-list" data-toggle="list" href="#list-info" role="tab" aria-controls="info">Info</a>

  </div>
</div>


<div class="col-5">
  <div class="tab-content gc-card gc-dash-center" id="nav-tabContent">

    <?php
      get_template_part( '/inc/templates/schedule' );
      get_template_part( '/inc/templates/info' );
     ?>

  </div>
</div>
