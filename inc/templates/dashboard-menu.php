<div class="col-2 gc-dash-left gc-card">
  <div class="list-group" id="list-tab" role="tablist">

    <?php

    $empID = get_field( 'logged_in_employee_id', 11 );
    $isAdmin = get_field( 'has_timesheet_access', $empID );


      $schedules = true;

      ?>
      <a class="list-group-item list-group-item-action" id="list-bulletin-list" data-toggle="list" href="#list-bulletin" role="tab" aria-controls="bulletin"><i class="fa fa-comments-o fa-lg"></i>  Bulletin</a>


      <a class="list-group-item list-group-item-action" id="list-schedule-list" data-toggle="list" href="#list-schedule" role="tab" aria-controls="schedule"><i class="fa fa-calendar fa-lg"></i>  Schedule</a>


      <a class="list-group-item list-group-item-action" id="list-info-list" data-toggle="list" href="#list-info" role="tab" aria-controls="info"><i class="fa fa-cog fa-lg"></i>  Info</a>

      <?php if ( $isAdmin ) : ?>

        <h5 class="list-group-item">Admin</h5>

        <a class="list-group-item" id="list-emp-schedule-list" href="emp-schedule"><i class="fa fa-calendar-o fa-lg"></i>  Schedules</a>

      <?php endif; ?>
  </div>
</div>
