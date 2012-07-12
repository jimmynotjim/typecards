<?php 


 /* BEGIN: add user info
   ---------------------------------------------------------------------------------------------------- */
add_action( 'show_user_profile', 'show_extra_profile_fields' );
add_action( 'edit_user_profile', 'show_extra_profile_fields' );
 
function show_extra_profile_fields( $user ) { ?>
 
<h3>Extra profile information</h3>
 
<table class="form-table">

<tr>
<th><label for="location">Location</label></th>
 
<td>
<input type="text" name="location" id="locaton" value="<?php echo esc_attr( get_the_author_meta( 'location', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description">Enter the City and State</span>
</td>
</tr>

<tr>
<th><label for="positon">Current Position</label></th>
 
<td>
<input type="text" name="position" id="position" value="<?php echo esc_attr( get_the_author_meta( 'position', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description">Enter your current job position</span>
</td>
</tr>
 
<tr>
<th><label for="image">Profile Image</label></th>
 
<td>
<img src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" style="height:50px;">
<input type="text" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />
<span class="description">Profile image must be at least 300x300 to display properly at all screen sizes</span>
</td>
</tr>

<tr>
<th><label for="avatar">Profile Avatar</label></th>
 
<td>
<img src="<?php echo esc_attr( get_the_author_meta( 'avatar', $user->ID ) ); ?>" style="height:50px;">
<input type="text" name="avatar" id="avatar" value="<?php echo esc_attr( get_the_author_meta( 'avatar', $user->ID ) ); ?>" class="regular-text" /><input type='button' class="button-primary" value="Upload Avatar" id="uploadavatar"/><br />
<span class="description">Profile avatar must be at least 127x127 to display properly at all screen sizes</span>
</td>
</tr>
 
</table>
<?php }


/* Add the image loader */
function image_upload_js() {
?><script type="text/javascript">
jQuery(document).ready(function() {
jQuery(document).find("input[id^='uploadimage']").live('click', function(){
//var num = this.id.split('-')[1];
formfield = jQuery('#image').attr('name');
tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 
window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
jQuery('#image').val(imgurl);
tb_remove();
}
 
return false;
});
});
</script>
<?php
}

/* Add the image loader */
function avatar_upload_js() {
?><script type="text/javascript">
jQuery(document).ready(function() {
jQuery(document).find("input[id^='uploadavatar']").live('click', function(){
//var num = this.id.split('-')[1];
formfield = jQuery('#avatar').attr('name');
tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 
window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
jQuery('#avatar').val(imgurl);
tb_remove();
}
 
return false;
});
});
</script>
<?php
}
add_action('admin_head','image_upload_js');
add_action('admin_head','avatar_upload_js');

function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
}

function my_admin_styles() {
wp_enqueue_style('thickbox'); //thickbox styles css
}


/* Save the data */
add_action( 'personal_options_update', 'save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );
 
function save_extra_profile_fields( $user_id ) {
 
if ( !current_user_can( 'edit_user', $user_id ) )
return false;

update_usermeta( $user_id, 'location', $_POST['location'] );
update_usermeta( $user_id, 'position', $_POST['position'] );
update_usermeta( $user_id, 'image', $_POST['image'] );
update_usermeta( $user_id, 'avatar', $_POST['avatar'] );
}


/* BEGIN: User Image
	Avatars should be at least 300x300
	When calling make sure to include a user ID or variable to pull it from the loop
   ---------------------------------------------------------------------------------------------------- */
   
function user_image($ID) {
$img_url = get_the_author_meta( 'image', $ID);

if ( '' != $img_url ) {
	echo '<img src="'.$img_url.'" />';
}

else { echo '<img src="'.get_bloginfo( "template_url" ).'/assets/img/logo-ghost-lg.png" />';
}

}

/* End User Avatar */


/* BEGIN: User Avatar
	Avatars should be at least 127x127
	When calling make sure to include a user ID or variable to pull it from the loop
   ---------------------------------------------------------------------------------------------------- */
   
function user_avatar($ID) {
$img_url = get_the_author_meta( 'avatar', $ID);

if ( '' != $img_url ) {
	echo '<img src="'.$img_url.'" class="user-avatar" />';
}

else { echo '<img src="'.get_bloginfo( "template_url" ).'/assets/img/logo-ghost-sm.png" class="user-avatar" />';
}

}

/* End User Avatar */
