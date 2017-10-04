<div class="col-2 gc-dash-left gc-card">
  <div class="list-group" id="list-tab" role="tablist">

    <?php

    $empID = get_field( 'logged_in_employee_id', 11 );
    $isAdmin = get_field( 'has_timesheet_access', $empID );


      $schedules = true;

      ?>

      <a class="list-group-item list-group-item-action" href="dashboard"><i class="fa fa-tachometer fa-lg"></i>  Dashboard</a>


      <a class="list-group-item list-group-item-action" href="schedule"><i class="fa fa-calendar fa-lg"></i>  Schedule</a>


      <a class="list-group-item list-group-item-action" href="staff"><i class="fa fa-users fa-lg"></i>  Staff</a>

  </div>
</div>
