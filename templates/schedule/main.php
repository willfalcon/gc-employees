<?php

  $loggedInEmp = get_field( 'logged_in_employee_id', 11 );
  $isAdmin = get_field( 'has_timesheet_access', $loggedInEmp );

  $schedArgs = array(
    'post_type' => 'weekly_schedule',
    'order' => 'ASC',
    'posts_per_page' => '5'
  );

  $schedQuery = new WP_Query( $schedArgs );

?>

<div class="col-10">
  <?php if ( $isAdmin ) : ?>
    <div class="gc-mt-15 gc-schedule-main-admin">
  <?php else: ?>
    <div class="gc-mt-15 gc-schedule-main">
  <?php endif; ?>

    <?php

      if ( $schedQuery->have_posts() ) : while ( $schedQuery->have_posts() ) : $schedQuery->the_post();

        get_template_part( '/templates/schedule/tue' );
        get_template_part( '/templates/schedule/wed' );
        get_template_part( '/templates/schedule/thu' );
        get_template_part( '/templates/schedule/fri' );
        get_template_part( '/templates/schedule/sat' );

        if ( $isAdmin ) {
          get_template_part( '/templates/schedule/edit' );
        }

      endwhile; endif;

      if ( $isAdmin ) {
        get_template_part( '/templates/schedule/new' );
      }

    ?>

  </div>
</div>
