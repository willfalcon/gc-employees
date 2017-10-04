<?php

  $staffArgs = array(
    'post_type' => 'employee',
    'order' => 'ASC'
  );

  $staffQuery = new WP_Query( $staffArgs );

  $loggedInEmp = get_field( 'logged_in_employee_id', 11 );
  $isAdmin = get_field( 'has_timesheet_access', $loggedInEmp );

 ?>

<div class="gc-mt-15 gc-staff-list">

  <?php if ( $staffQuery->have_posts() ) : while ( $staffQuery->have_posts() ) : $staffQuery->the_post(); ?>

    <?php $pic = get_field( 'picture' ); ?>

    <div class="gc-card my-2 pt-3">

      <div class="gc-staff-list-item">
        <a data-toggle="collapse" href="#empCollapse<?php echo $post->ID; ?>" onclick="gcEmpCollapse(<?php echo $post->ID; ?>)" aria-expanded="false" aria-controls="empCollapse<?php echo $post->ID; ?>">
          <h4 class="gc-emp-list-name text-center"><?php gc_display_name( $post->ID ); ?></h4>
        </a>
      </div>

      <?php /*=========== Switch to an Accordian setup rather than collapse ====== */ ?>

      <div class="collapse multi-collapse gc-emp-collapse" id="empCollapse<?php echo $post->ID; ?>">
        <div class="card card-body">
          <?php if ( ! empty( $pic ) ) : ?><img src="<?php echo $pic['url']; ?>" alt="<?php echo $pic['alt']; ?>" class="img-fluid rounded-circle gc-emp-pic"/><?php endif; ?>
          <?php if ( get_field( 'phone' ) ) : ?><p class="pl-5 pt-5"><b>Phone:</b> <?php the_field( 'phone' ); ?></p><?php endif; ?>
          <?php if ( get_field( 'email' ) ) : ?><p class="pl-5"><b>Email:</b> <?php the_field( 'email' ); ?></p><?php endif; ?>

          <?php if ( $isAdmin ) : ?>
            <button type="button" class="btn btn-outline-secondary gc-edit-emp-btn" data-toggle="modal" data-target="#admin_edit_emp_<?php echo $post->ID; ?>">
              Edit Employee
            </button>
          <?php endif; ?>
        </div>
      </div>

    </div>


    <?php if ( $isAdmin ) : ?>
      <div class="modal fade" id="admin_edit_emp_<?php echo $post->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="admin_edit_emp_<?php echo $post->ID; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?php the_title(); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php
                $adminEmpEditForm = array(
                  'id' => 'edit_emp_' . $post->ID,
                  'fields'=> array(
                    'field_59c5ca263e7f1',
                    'field_59d4805cb7c89',
                    'field_59d4808cb7c8a',
                    'field_59d4816cb7c8b',
                    'field_59c59909bca46',
                    'field_59c5992dbca47',
                    'field_59c5c80675f52'
                  ),
                  'submit_value' => 'Save Changes',
                  'html_submit_button'	=> '<input type="submit" class="btn btn-outline-secondary" value="%s" />',
                  'updated_message' => false
                );

                acf_form( $adminEmpEditForm );

              ?>

              <div class="gc-delete-emp">
                <button class="btn btn-outline-danger gc-delete-emp-btn gc-delete-emp-start-<?php echo $post->ID; ?>" onclick="gcDeleteEmpStart(<?php echo $post->ID; ?>)">
                  Delete Employee
                </button>
                <form class="d-none fade gc-delete-emp-<?php echo $post->ID; ?>" name="gc-delete-emp-<?php echo $post->ID; ?>" method="post" action="">
                  <input type="hidden" name="emp_to_delete" value="<?php echo $post->ID; ?>">
                  <button type="submit" class="btn btn-outline-secondary gc-delete-emp-btn">Confirm Delete</button>
                </form>
              </div>


            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

  <?php endwhile; endif; wp_reset_postdata(); ?>

</div>
