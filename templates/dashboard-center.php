<?php

  $empID = get_field( 'logged_in_employee_id' );
  $isAdmin = get_field( 'has_timesheet_access', $empID );

?>

<div class="col-5 gc-dash-center">

    <?php

      get_template_part( '/templates/clock/welcome' );

      get_template_part( '/templates/bulletin' );

      get_template_part( '/templates/info' );

     ?>

</div>
