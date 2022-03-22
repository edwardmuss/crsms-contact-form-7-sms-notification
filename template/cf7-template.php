<div id="cf7si-sms-sortables" class="meta-box-sortables ui-sortable">
	<h3><?php _e("Admin SMS Notifications",Contact_FormSI_TXT); ?></h3>
	<fieldset>
		<legend><?php _e("In the following fields, you can use these tags:",Contact_FormSI_TXT); ?>
			<br />
			<?php $data['form']->suggest_mail_tags(); ?>
		</legend>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="wpcf7-sms-recipient"><?php _e("To:",Contact_FormSI_TXT); ?></label>
					</th>
					<td>
						<input type="text" id="wpcf7-sms-recipient" name="wpcf7si-settings[phone]" class="wide" size="70" value="<?php _e($data['phone']); ?>">
						<br/> <?php _e("<small>Enter Numbers By <code>,</code> for multiple</small>",Contact_FormSI_TXT); ?>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="wpcf7-mail-body"><?php _e("Message body:",Contact_FormSI_TXT); ?></label>
					</th>
					<td>
<textarea id="wpcf7-mail-body" name="wpcf7si-settings[message]" cols="100" rows="6" class="large-text code"><?php _e($data['message']) ; ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	
	<hr/>
	<h3><?php _e("Visitor SMS Notifications",Contact_FormSI_TXT); ?></h3>
	<fieldset>
		<legend><?php _e("In the following fields, you can use these tags:",Contact_FormSI_TXT); ?>
			<br />
			<?php $data['form']->suggest_mail_tags(); ?>
		</legend>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="wpcf7-sms-recipient"><?php _e("Visitor Mobile: ",Contact_FormSI_TXT); ?></label>
					</th>
					<td>
						<input type="text" id="wpcf7-sms-recipient" name="wpcf7si-settings[visitorNumber]" class="wide" size="70" value="<?php echo @$data['visitorNumber']; ?>">
						<br/> <?php _e("<small>Use <b>Contact_Form Tags</b> To Get Visitor Mobile Number | Enter Numbers By <code>,</code> for multiple</small>",Contact_FormSI_TXT);?>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label for="wpcf7-mail-body"><?php _e("Message body:",Contact_FormSI_TXT); ?></label>
					</th>
					<td>
						<textarea id="wpcf7-mail-body" name="wpcf7si-settings[visitorMessage]" cols="100" rows="6" class="large-text code"><?php echo @$data['visitorMessage']; ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>