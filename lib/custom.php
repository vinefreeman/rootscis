<?php
/**
 * Custom functions
 */
/* Define the custom box */

add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'myplugin_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function myplugin_add_custom_box() {
    $screens = array( 'post', 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
            'myplugin_sectionid',
            __( 'Nice large summary or description', 'myplugin_textdomain' ),
            'myplugin_inner_custom_box',
            $screen
        );
    }
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_nicetitle', true );
  echo '<label for="myplugin_new_field">';
  echo  _e("Text", 'myplugin_textdomain' ); //2 5/10/13 VF added the echo line at the start as this was causing an error adding and removing categories, and adding cats on the post pages.
  echo '</label> ';
  echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="'.esc_attr($value).'" size="100" style="width: 100%" />';
}

/* When the post is saved, saves our custom data */
function myplugin_save_postdata( $post_id ) {

  // First we need to check if the current user is authorised to do this action. 
  if ( 'page' == $_REQUEST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['myplugin_noncename'] ) || ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  //sanitize user input
  $mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

  // Do something with $mydata 
  // either using 
  add_post_meta($post_ID, '_nicetitle', $mydata, true) or
    update_post_meta($post_ID, '_nicetitle', $mydata);
  // or a custom table (see Further Reading section below)
}


  /*Google Fonts*/
    function load_google_fonts() {
                wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Oxygen');
                wp_enqueue_style( 'googleFonts');
            }
     
        add_action('wp_print_styles', 'load_google_fonts');
  
   #allow adding of shortcodes to text     
   add_filter('widget_text', 'do_shortcode');

      #================================================================
  #               Custom Home Slides
  #================================================================
  #first create custom post type with labels and related info 
  function _home_slides() {
    $labels = array(
      'name'               => _x( 'Home Slides', 'post type general name' ),
      'singular_name'      => _x( 'Home Slide', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'slide' ),
      'add_new_item'       => __( 'Add New Home Slide' ),
      'edit_item'          => __( 'Edit Home Slide' ),
      'new_item'           => __( 'New Home Slide' ),
      'all_items'          => __( 'All Home Slides' ),
      'view_item'          => __( 'View Home Slides' ),
      'search_items'       => __( 'Search Home Slides' ),
      'not_found'          => __( 'No Home Slides found' ),
      'not_found_in_trash' => __( 'No Home Slides found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Home Slides'
    );
        $args = array(
      'labels'        => $labels,
      'description'   => 'Front page slider',
      'public'        => true,
      'menu_position' => 6,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'has_archive'   => true,
      //'rewrite' => array( 'slug' => 'security-jobs', 'with_front' => false ),
    );

    register_post_type( 'homeslides', $args ); 
  }

add_action( 'init', '_home_slides' );

    #================================================================
  #               Custom Home Box
  #================================================================
  #first create custom post type with labels and related info 
  function _custom_post_home() {
    $labels = array(
      'name'               => _x( 'Home Boxes', 'post type general name' ),
      'singular_name'      => _x( 'Home Box', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'box' ),
      'add_new_item'       => __( 'Add New Home Box' ),
      'edit_item'          => __( 'Edit Home Box' ),
      'new_item'           => __( 'New Home Box' ),
      'all_items'          => __( 'All Home Boxes' ),
      'view_item'          => __( 'View Home Boxes' ),
      'search_items'       => __( 'Search Home Boxes' ),
      'not_found'          => __( 'No Home Boxes found' ),
      'not_found_in_trash' => __( 'No Home Boxes found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Home Boxes'
    );
        $args = array(
      'labels'        => $labels,
      'description'   => 'Holds front page information',
      'public'        => true,
      'menu_position' => 6,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'has_archive'   => true,
      'exclude_from_search' => true,
      //'rewrite' => array( 'slug' => 'security-jobs', 'with_front' => false ),
    );

    register_post_type( 'homebox', $args ); 
  }

add_action( 'init', '_custom_post_home' );

add_action( 'load-post.php', 'cis_homebox_setup' );
add_action( 'load-post-new.php', 'cis_homebox_setup' );

/* Meta box setup function. */
function cis_homebox_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'cis_homebox' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'cis_homebox_save', 10, 2 );
}


# Metabox for post
function cis_homebox() {
    add_meta_box( 
        'cis_homebox',
        __( 'Link for home box', 'example' ),
        'cis_homebox_content',
        'homebox',
        'normal',
        'high'
    );
}

/* Display the post meta box. */
function cis_homebox_content( $object ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'cis_homebox_nonce' ); ?>

  <p>
    <label for="box_url"><?php _e( "Enter link i.e. 'www.cis-security.co.uk/my_page' do not enter http://", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="box_url" id="box_url" value="<?php echo esc_attr( get_post_meta( $object->ID, 'box_url', true ) ); ?>" size="30" />
  </p>
  
 
<?php }

/* Save the meta box's post metadata. */
function cis_homebox_save( $post_id, $post) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['cis_homebox_nonce'] ) || !wp_verify_nonce( $_POST['cis_homebox_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it text. */
  $new_box_value = ( isset( $_POST['box_url'] ) ? sanitize_text_field( $_POST['box_url'] ) : '' );
  /* Get the meta key. */
  $meta_box_key = 'box_url';
  /*  Update meta on post - VF*/
  update_post_meta( $post_id, $meta_box_key, $new_box_value ); 

}

   #================================================================
  #              Senior Mangement Team
  #================================================================
  #first create custom post type with labels and related info 
  function _custom_post_team() {
    $labels = array(
      'name'               => _x( 'Senior Management Team', 'post type general name' ),
      'singular_name'      => _x( 'Senior Management Team', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'Member' ),
      'add_new_item'       => __( 'Add New Senior Staff' ),
      'edit_item'          => __( 'Edit Senior Staff' ),
      'new_item'           => __( 'New Senior Staff Member' ),
      'all_items'          => __( 'All Senior Staff Members' ),
      'view_item'          => __( 'View Senior Staff Members' ),
      'search_items'       => __( 'Search Senior Staff Members' ),
      'not_found'          => __( 'No Senior Staff Members found' ),
      'not_found_in_trash' => __( 'No Senior Staff Members found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Senior Management'
    );
        $args = array(
      'labels'        => $labels,
      'description'   => 'Holds Senior Management information',
      'public'        => true,
      'menu_position' => 6,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'has_archive'   => true,
      'exclude_from_search' => false,
      'rewrite' => array( 'slug' => 'senior-management', 'with_front' => false ),
    );

    register_post_type( 'manteam', $args ); 
  }

add_action( 'init', '_custom_post_team' );

add_action( 'load-post.php', 'cis_manteam_setup' );
add_action( 'load-post-new.php', 'cis_manteam_setup' );

/* Meta box setup function. */
function cis_manteam_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'cis_manteam' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'cis_manteam_save', 10, 2 );
}


# Metabox for post
function cis_manteam() {
    add_meta_box( 
        'cis_manteam',
        __( 'Job Title', 'example' ),
        'cis_manteam_content',
        'manteam',
        'normal',
        'high'
    );
}

/* Display the post meta box. */
function cis_manteam_content( $object ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'cis_manteam_nonce' ); ?>

  <p>
    <label for="job_title"><?php _e( "Enter job title", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="job_title" id="job_title" value="<?php echo esc_attr( get_post_meta( $object->ID, 'job_title', true ) ); ?>" size="30" />
  </p>
  
 
<?php }

/* Save the meta box's post metadata. */
function cis_manteam_save( $post_id, $post) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['cis_manteam_nonce'] ) || !wp_verify_nonce( $_POST['cis_manteam_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it text. */
  $new_manteam_value = ( isset( $_POST['job_title'] ) ? sanitize_text_field( $_POST['job_title'] ) : '' );
  /* Get the meta key. */
  $meta_manteam_key = 'job_title';
  /*  Update meta on post - VF*/
  update_post_meta( $post_id, $meta_manteam_key, $new_manteam_value ); 

}

#change title of staff name box
function change_default_title_team( $title ){
     $screen = get_current_screen();
 
     if  ( 'manteam' == $screen->post_type ) {
          $title = "Enter staff member's name here - then bio below";
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_default_title_team' );

  #================================================================
  #               Custom post type job
  #================================================================
  #first create custom post type with labels and related info 
  function _custom_post_job() {
    $labels = array(
      'name'               => _x( 'Vacancies', 'post type general name' ),
      'singular_name'      => _x( 'Job', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'book' ),
      'add_new_item'       => __( 'Add New Position' ),
      'edit_item'          => __( 'Edit Position' ),
      'new_item'           => __( 'New Position' ),
      'all_items'          => __( 'All Positions' ),
      'view_item'          => __( 'View Position' ),
      'search_items'       => __( 'Search positions' ),
      'not_found'          => __( 'No positions found' ),
      'not_found_in_trash' => __( 'No positions found in the Trash' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'CIS Vacancies'
    );
        $args = array(
      'labels'        => $labels,
      'description'   => 'Holds CIS job positions and related data',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'has_archive'   => true,
      'rewrite' => array( 'slug' => 'security-jobs', 'with_front' => false ),
      'capability_type' => 'cisjob',
      'capabilities' => array(
        'publish_posts' => 'publish_cisjobs',
        'edit_posts' => 'edit_cisjobs',
        'edit_others_posts' => 'edit_others_cisjobs',
        'delete_posts' => 'delete_cisjobs',
        'delete_others_posts' => 'delete_others_cisjobs',
        'read_private_posts' => 'read_private_cisjobs',
        'edit_post' => 'edit_cisjob',
        'delete_post' => 'delete_cisjob',
        'read_post' => 'read_cisjob',
      ),
          );

    register_post_type( 'cisjob', $args ); 
  }
add_action( 'init', '_custom_post_job' );

#add custom interaction messages  
function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['product'] = array(
    0 => '', 
    1 => sprintf( __('Position upated. <a href="%s">View position</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Job updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Vacancy restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Position published. <a href="%s">View position</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Job saved.'),
    8 => sprintf( __('Job submitted. <a target="_blank" href="%s">Preview job</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Position scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview job</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Job draft updated. <a target="_blank" href="%s">Preview job</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

#change the enter title here text

function change_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'cisjob' == $screen->post_type ) {
          $title = 'Enter job title here - then the description below';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_default_title' );

#taxonomy or categories for the jobs
function my_taxonomies_job() {
  $labels = array(
    'name'              => _x( 'Job Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Job Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Categories' ),
    'all_items'         => __( 'All Job Categories' ),
    'parent_item'       => __( 'Parent Job Category' ),
    'parent_item_colon' => __( 'Parent Job Category:' ),
    'edit_item'         => __( 'Edit Job Category' ), 
    'update_item'       => __( 'Update Job Category' ),
    'add_new_item'      => __( 'Add New Job Category' ),
    'new_item_name'     => __( 'New Job Category' ),
    'menu_name'         => __( 'Job Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'job_category', 'cisjob', $args );
}
add_action( 'init', 'my_taxonomies_job', 0 );

#capabilities meta

add_filter( 'map_meta_cap', 'my_map_meta_cap', 10, 4 );

function my_map_meta_cap( $caps, $cap, $user_id, $args ) {

  /* If editing, deleting, or reading a movie, get the post and post type object. */
  if ( 'edit_cisjob' == $cap || 'delete_cisjob' == $cap || 'read_cisjob' == $cap ) {
    $post = get_post( $args[0] );
    $post_type = get_post_type_object( $post->post_type );

    /* Set an empty array for the caps. */
    $caps = array();
  }

  /* If editing a movie, assign the required capability. */
  if ( 'edit_cisjob' == $cap ) {
    if ( $user_id == $post->post_author )
      $caps[] = $post_type->cap->edit_posts;
    else
      $caps[] = $post_type->cap->edit_others_posts;
  }

  /* If deleting a movie, assign the required capability. */
  elseif ( 'delete_cisjob' == $cap ) {
    if ( $user_id == $post->post_author )
      $caps[] = $post_type->cap->delete_posts;
    else
      $caps[] = $post_type->cap->delete_others_posts;
  }

  /* If reading a private cisjob, assign the required capability. */
  elseif ( 'read_cisjob' == $cap ) {

    if ( 'private' != $post->post_status )
      $caps[] = 'read';
    elseif ( $user_id == $post->post_author )
      $caps[] = 'read';
    else
      $caps[] = $post_type->cap->read_private_posts;
  }

  /* Return the capabilities required by the user. */
  return $caps;
}


/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'cis_job_box_setup' );
add_action( 'load-post-new.php', 'cis_job_box_setup' );

/* Meta box setup function. */
function cis_job_box_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'cisjob_box' );

  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'cisjob_box_save', 10, 2 );
}


# Metabox for post
function cisjob_box() {
    add_meta_box( 
        'cisjob_box',
        __( 'Vacancy Details', 'example' ),
        'cisjob_box_content',
        'cisjob',
        'normal',
        'high'
    );
}

/* Display the post meta box. */
function cisjob_box_content( $object ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'cisjob_box_nonce' ); ?>

  <p>
    <label for="job_client"><?php _e( "Client/Location", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="job_client" id="job_client" value="<?php echo esc_attr( get_post_meta( $object->ID, 'job_client', true ) ); ?>" size="30" />
  </p>
  <p>
    <label for="job_pay"><?php _e( "Pay Rate", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="job_pay" id="job_pay" value="<?php echo esc_attr( get_post_meta( $object->ID, 'job_pay', true ) ); ?>" size="30" />
  </p>
   <p>
    <label for="job_shift"><?php _e( "Shift Details", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="job_shift" id="job_shift" value="<?php echo esc_attr( get_post_meta( $object->ID, 'job_shift', true ) ); ?>" size="30" />
  </p>
  <p>
    <label for="job_ref"><?php _e( "Job Reference", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="job_ref" id="job_ref" value="<?php echo esc_attr( get_post_meta( $object->ID, 'job_ref', true ) ); ?>" size="30" />
  </p>
 
<?php }

/* Save the meta box's post metadata. */
function cisjob_box_save( $post_id, $post) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['cisjob_box_nonce'] ) || !wp_verify_nonce( $_POST['cisjob_box_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it text. */
  $new_client_value = ( isset( $_POST['job_client'] ) ? sanitize_text_field( $_POST['job_client'] ) : '' );
  /* Get the meta key. */
  $meta_client_key = 'job_client';
  /*  Update meta on post - VF*/
  update_post_meta( $post_id, $meta_client_key, $new_client_value ); 

  /* Pay Rate*/
  $new_pay_value = ( isset( $_POST['job_pay'] ) ? sanitize_text_field( $_POST['job_pay'] ) : '' );
  $meta_pay_key = 'job_pay';
  update_post_meta( $post_id, $meta_pay_key, $new_pay_value ); 

   /* Shift info*/
  $new_shift_value = ( isset( $_POST['job_shift'] ) ? sanitize_text_field( $_POST['job_shift'] ) : '' );
  $meta_shift_key = 'job_shift';
  update_post_meta( $post_id, $meta_shift_key, $new_shift_value );

   /* Job Ref*/
  $new_ref_value = ( isset( $_POST['job_ref'] ) ? sanitize_text_field( $_POST['job_ref'] ) : '' );
  $meta_ref_key = 'job_ref';
  update_post_meta( $post_id, $meta_ref_key, $new_ref_value ); 


  /* Get the meta value of the custom field key. 
  $meta_client_value = get_post_meta( $post_id, $meta_client_key, true );*/

  /* If a new meta value was added and there was no previous value, add it.
  if ( $new_client_value && '' == $meta_client_value )
    add_post_meta( $post_id, $meta_client_key, $new_client_value, true ); */

  /* If the new meta value does not match the old value, update it.
  elseif ( $new_client_value && $new_client_value != $meta_client_value )
    update_post_meta( $post_id, $meta_client_key, $new_client_value ); */

  /* If there is no new meta value but an old value exists, delete it. 
  elseif ( '' == $new_client_value && $meta_client_value )
    delete_post_meta( $post_id, $meta_client_key, $meta_client_value );*/
}


#================================================================
#               End custom post type job
#================================================================

# list of children in sidebar for navigation
if(!function_exists('get_post_top_ancestor_id')){
/**
 * Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 * 
 * @uses object $post
 * @return int 
 */
function get_post_top_ancestor_id(){
    global $post;
    
    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    
    return $post->ID;
}}


# Thumbnails - esp staff.

if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'staff-minithumb', 77, 9999 ); //300 pixels wide (and unlimited height)
  add_image_size( 'staff-list', 150, 9999 ); //(cropped)
}

// Fix nav menu active classes for custom post types
function roots_cpt_active_menu($menu) {
  global $post;
  if ('manteam' === get_post_type()) {
    $menu = str_replace('active', '', $menu);
    $menu = str_replace('menu-about-us', 'menu-about-us active', $menu);
    $menu = str_replace('menu-our-senior-management-team', 'menu-our-senior-management-team active', $menu);
  }

  if ('cisjob' === get_post_type()) {
    $menu = str_replace('active', '', $menu);
    $menu = str_replace('menu-work-for-us', 'menu-work-for-us active', $menu);
  }
  return $menu;
}
add_filter('nav_menu_css_class', 'roots_cpt_active_menu', 400);

function my_login_back() { ?>
    <style type="text/css">
        body.login {
            background: url("http://cis-security.co.uk/cis-login.jpg") no-repeat center center fixed !important; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
                    }
                    .login #nav, .login #backtoblog, .login #nav a, .login #backtoblog a  {text-shadow: none; color: #fff !important};
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_back' );
?>