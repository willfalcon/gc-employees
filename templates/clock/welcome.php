
<div class="gc-card gc-dashboard-module">

  <?php

    if ( isset( $_POST['emp_clock_in'] ) ) {

      get_template_part( '/templates/clock/clocked-in' );

    } elseif ( isset( $_POST['emp_clock_out'] ) ) {

      get_template_part( '/templates/clock/clocked-out' );

    } else {

      get_template_part( '/templates/clock/logged-in' );

    }

  ?>

</div>
