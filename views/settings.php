<?php  
// Mounte the options for Users
$users = get_users(
	array(
		'blog_id' => $GLOBALS['blog_id'],
		'count_total' => false,
		'fields' => array( 'ID', 'display_name' ), // When you pass only one field it returns an array of the values
	)
);

$_json_users_output = array();
foreach ( $users as $user ) {
	$_json_users_output[] = array(
		'id' => $user->ID,
		'text' => esc_attr( $user->display_name ),
	);
}
?>

<div class="wrap">
	<h2><?php esc_html_e( 'Notifier' , 'notifier');?></h2>
	<table class="form-table" style="display: table;">
		<tbody>
			<tr>
				<th scope="row"><label for="notifier_users"><?php _e( 'Users', 'notifier' ); ?></label></th>
				<td>
					<div id="users">
						<input required type='text' placeholder='<?php esc_attr_e( 'Search', 'notifier' ); ?>' value='' class='select2-field regular-text' data-possibilities="<?php echo json_encode( $_json_users_output ); ?>" name='nr_users_allowed' />
					</div>
					<p class="description"><?php echo wp_kses( sprintf( esc_attr__( 'Select the users who will receive notification.', 'notifier' ) ), array( 'b' => array() ) ); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="notifier_users"><?php _e( 'Notification HTML', 'notifier' ); ?></label></th>
				<td>
					<div id="notification-text">
						<textarea required rows="5" cols="40" type='text' placeholder='<?php esc_attr_e( 'Type your text here', 'notifier' ); ?>' value='' class='regular-text' name='nr_notification_text' /></textarea>
					</div>
					<p class="description"><?php echo wp_kses( sprintf( esc_attr__( 'Edit the notification text that will appear to users.', 'notifier' ) ), array( 'b' => array() ) ); ?></p>
				</td>
			</tr>
				<td></td>
				<td>
					<div id="submit-button" style="float:left;">
						<?php submit_button( __( 'Save Settings', 'notifier' ), 'primary', 'notifier_save_settings', false ); ?>
					</div>
				</td>
		</tbody>
	</table>
</div>