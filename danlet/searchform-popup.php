<div id="danletSearch" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e('Close X','danlet')?></button>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="content-search">
            <h4><?php esc_html_e('Search anytime by typing','danlet')?></h4>
            <form action="<?php echo esc_url(home_url( '/' ));?>" method="get" class="danlet-search">
                <i class="icon-search"></i>
                <input name="s" value="" placeholder="<?php esc_html_e('Search ... ', 'danlet'); ?>" type="text">
            </form>
          </div>
        </div>
      </div>
    </div>
</div>