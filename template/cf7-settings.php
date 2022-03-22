<form method="post" class="mt-3">
    <?php
    $api_token_data =	get_option(Contact_FormSI_DB_SLUG.'api_token','');
    $sender_id_data =	get_option(Contact_FormSI_DB_SLUG.'sender_id','');
    $country_data =	get_option(Contact_FormSI_DB_SLUG.'country','');
    $country_code_data =	get_option(Contact_FormSI_DB_SLUG.'country_code','');
    $reg_phone_data =	get_option(Contact_FormSI_DB_SLUG.'reg_phone','');
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php _e('API Token', Contact_FormSI_TXT); ?></label>
                <input type="text" class="form-control" name="api_token" value="<?php if (!empty($api_token_data)) _e($api_token_data)?>">
            </div>
        </div>
        <div class="col-md-6 sender_id">
            <div class="form-group">
                <label><?php _e('Sender ID', Contact_FormSI_TXT); ?> <span class="text-danger text-center mt-2">(11 Characters Max Length).</span></label>
                <input type="text" class="form-control" maxlength="11" name="sender_id" value="<?php if (!empty($sender_id_data)) _e($sender_id_data)?>">
            </div>
        </div>
        <input type="hidden" name="country_code" id="country_code" value="<?php if (!empty($country_code_data)) _e($country_code_data) ?>">
    </div>
    <div class="mt-2">
        <input type="submit" name="save_api_settings" value="Save Changes" class="btn btn-primary" />
    </div>
</form>