<?php

  $empID = get_field( 'logged_in_employee_id' );
  $isAdmin = get_field( 'has_timesheet_access', $empID );

?>

<div class="col-5">
  <div class="tab-content gc-card gc-dash-center" id="nav-tabContent">

    <?php

      get_template_part( '/inc/templates/bulletin' );

      get_template_part( '/inc/templates/schedule' );

      get_template_part( '/inc/templates/info' );

     ?>

  </div>
</div>
