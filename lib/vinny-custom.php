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
       _e("Text", 'myplugin_textdomain' );
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
?>  