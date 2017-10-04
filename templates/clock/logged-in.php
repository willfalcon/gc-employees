<?php

  $empPostID = get_field( 'logged_in_employee_id' );
  $date = date_i18n( 'l, F j, Y' );
  $empIsClockedIn = get_field( 'is_clocked_in', $empPostID );

?>



<h3><?php gc_greeting(); gc_display_name( $empPostID ); ?>!</h3>

<h5 class="my-3"><?php echo $date; ?></h5>

<?php if ( $empIsClockedIn ) : ?>
  
  <form name="emp-clock-out-form" method="post" action="">
    <input type="hidden" name="emp_clock_out" value="Y">
    <button type="submit" class="btn btn-outline-danger btn-lg mt-5">Clock Out</button>
  </form>

<?php else : ?>

<form name="emp-clock-in-form" method="post" action="">
  <input type="hidden" name="emp_clock_in" value="Y">
  <button type="submit" class="btn btn-outline-success btn-lg my-3">Clock In</button>
</form>

<?php endif; ?>
