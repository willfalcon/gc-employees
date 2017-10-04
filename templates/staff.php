<?php

if ( isset( $_POST['emp_to_delete'] ) ) {

  $empToDelete = $_POST['emp_to_delete'];
  wp_delete_post( $empToDelete );

}

  $loggedInEmp = get_field( 'logged_in_employee_id', 11 );
  $isAdmin = get_field( 'has_timesheet_access', $loggedInEmp );


?>

<div class="col-5">

  <?php get_template_part( '/templates/staff/my-info' ); ?>

</div>


<div class="col-5">

  <?php

    get_template_part( '/templates/staff/staff-list' );

    if ( $isAdmin ) :

      get_template_part( '/templates/staff/add-employee' );

    endif;

  ?>

</div>
