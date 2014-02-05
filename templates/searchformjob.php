<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url('/'); ?>">
  <div class="input-group">
   <input type="hidden" name="post_type" value="cisjob" />
    <input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'roots'); ?> CIS">
    <label class="hide"><?php _e('Search for:', 'roots'); ?></label>

    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-default"><?php _e('Go', 'roots'); ?></button>
    </span>
  </div>
</form>
