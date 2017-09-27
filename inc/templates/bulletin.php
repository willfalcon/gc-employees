
<div class="tab-pane gc-schedule fade show active" id="list-bulletin" role="tabpanel" aria-labelledby="list-bulletin-list">

  <h3 class="text-center">Bulletin</h3>

  <?php

    $args = array(
      'post_type' => 'bulletin',
    );
    $query = new WP_Query( $args );

    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();



        ?>

      <h5><?php the_title(); ?></h5>
      <h6>From <strong><?php the_author(); ?></strong> on <?php the_time( 'F j'); ?> at <?php the_time('g:i a'); ?></h6>
      <p class="gc-bulletin-excerpt">
        <?php echo get_the_excerpt(); ?>
      </p>
        <button type="button" class="btn btn-outline-secondary gc-bulletin-more-btn" data-toggle="modal" data-target="#bulletin-<?php echo $post->ID; ?>">
          More
        </button>
      <div class="modal fade" id="bulletin-<?php echo $post->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="bulletin-<?php echo $post->ID; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="bulletin-<?php echo $post->ID; ?>-title"><?php the_title(); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h6>From <strong><?php the_author(); ?></strong> on <?php the_time( 'F j'); ?> at <?php the_time('g:i a'); ?></h6>

              <?php the_content(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<?php
    endwhile; endif; wp_reset_postdata();

  ?>

</div>
