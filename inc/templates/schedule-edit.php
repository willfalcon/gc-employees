<?php

  $schedArgs = array(
    'post_type' => 'weekly_schedule',
    'order' => 'ASC',
    'posts_per_page' => '5'
  );

  $schedQuery = new WP_Query( $schedArgs );

?>

<div class="col-10">
  <div class="gc-mt-15 gc-schedule-edit">

    <?php

      if ( $schedQuery->have_posts() ) : while ( $schedQuery->have_posts() ) : $schedQuery->the_post();

        get_template_part( '/inc/templates/admin-schedule/tue' );
        get_template_part( '/inc/templates/admin-schedule/wed' );
        get_template_part( '/inc/templates/admin-schedule/thu' );
        get_template_part( '/inc/templates/admin-schedule/fri' );
        get_template_part( '/inc/templates/admin-schedule/sat' );
        get_template_part( '/inc/templates/admin-schedule/edit' );

      endwhile; endif;

      get_template_part( '/inc/templates/admin-schedule/new', 'week' );
    ?>

  </div>
</div>
