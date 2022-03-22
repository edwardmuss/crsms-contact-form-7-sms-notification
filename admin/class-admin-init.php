<?php

if (!defined('WPINC')) {
	die;
}

class CRSMS_Contact_Form_Sms_Notification_abn_Admin extends CRSMS_Contact_Form_Sms_Notification_abn
{
	public function __construct()
	{
		add_action('admin_menu', array($this, 'add_menu'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'), 99);
		add_action('admin_enqueue_scripts', array($this, 'load_js'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_select2_scripts'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('admin_enqueue_scripts', array($this, 'git_buttons'));
//		add_action('admin_enqueue_scripts', array($this, 'mc_validate'));
		add_filter('plugin_row_meta', array($this, 'plugin_row_links'), 10, 2);
		add_action('admin_init', array($this, 'admin_init'));
	}

	public function add_menu()
	{
		$this->page_slug = 'cf7isi-options';
		add_submenu_page(
			'wpcf7',
			__('SMS Integration', Contact_FormSI_TXT),
			__('SMS Integration', Contact_FormSI_TXT),
			'manage_options',
			$this->page_slug,
			array($this, 'admin_page')
		);
	}

	public function admin_page()
	{
		global $Custom_pagetitle, $slugs;
		$this->save_settings();
		$slugs = $this->page_slug;
		Contact_FormSI()->load_files(Contact_FormSI()->get_vars('PATH') . 'template/cf7-conf-header.php');
		Contact_FormSI()->load_files(Contact_FormSI()->get_vars('PATH') . 'template/cf7-conf-footer.php');
	}

	public function save_settings()
	{
		if (isset($_POST['save_api_settings'])) {
			$api_token = trim(sanitize_text_field($_POST['api_token']));
			$sender_id = trim(sanitize_text_field($_POST['sender_id']));
			$country = trim(sanitize_text_field($_POST['country']));
			$country_code = trim(sanitize_text_field($_POST['country_code']));
			$reg_phone = trim(sanitize_text_field($_POST['reg_phone']));

            if (empty($api_token) && empty($sender_id)) {
                _e('API Token and Sender ID are required!');
            }

			update_option(Contact_FormSI_DB_SLUG . 'api_token', $api_token);
			update_option(Contact_FormSI_DB_SLUG . 'sender_id', $sender_id);
			update_option(Contact_FormSI_DB_SLUG . 'reg_phone', $reg_phone);
			update_option(Contact_FormSI_DB_SLUG . 'country', $country);
			update_option(Contact_FormSI_DB_SLUG . 'country_code', $country_code);
		}
	}


	public function admin_init()
	{
		new CRSMS_Contact_Form_Sms_Notification_abn_Plugin_Integration;
	}


	public function enqueue_styles()
	{
		if (in_array($this->current_screen(), $this->get_screen_ids())) {
			wp_enqueue_style(Contact_FormSI_SLUG . '_core_style', plugins_url('css/style.css', __FILE__), array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts()
	{
		if (in_array($this->current_screen(), $this->get_screen_ids())) {
			wp_enqueue_script(Contact_FormSI_SLUG . '_core_script', plugins_url('js/script.js', __FILE__), array('jquery'), $this->version, false);
		}
	}

	public function enqueue_select2_scripts()
	{
		if (in_array($this->current_screen(), $this->get_screen_ids())) {
			wp_enqueue_script(Contact_FormSI_SLUG . '_select2', plugins_url('js/select2.js', __FILE__));
		}
	}

	public function load_js()
	{
		wp_register_script(Contact_FormSI_SLUG . '_app', plugins_url('js/app.js', __FILE__));
		wp_enqueue_script(Contact_FormSI_SLUG . '_app');
	}

    public function mc_validate()
    {
        wp_enqueue_script(Contact_FormSI_SLUG.'_cm_validate', plugins_url('js/mc_validate.js', __FILE__), [], '', true);
    }

    public function git_buttons()
    {
        wp_enqueue_script(Contact_FormSI_SLUG.'_git_buttons', plugins_url('js/github_buttons.js', __FILE__), [], '', true);
    }

	/**
	 * Gets Current Screen ID from wordpress
	 * @return string [Current Screen ID]
	 */
	public function current_screen()
	{
		$screen =  get_current_screen();
		return $screen->id;
	}

	/**
	 * Returns Predefined Screen IDS
	 * @return [Array] 
	 */
	public function get_screen_ids()
	{
		$screen_ids = array();
		$screen_ids[] = 'contact_page_cf7isi-options';
		return $screen_ids;
	}


	/**
	 * Adds Some Plugin Options
	 * @param  array  $plugin_meta
	 * @param  string $plugin_file
	 * @since 0.11
	 * @return array
	 */
	public function plugin_row_links($plugin_meta, $plugin_file)
	{
		if (Contact_FormSI()->get_vars('FILE') == $plugin_file) {
			$plugin_meta[] = sprintf('<a href="%s">%s</a>', 'admin.php?page=cf7isi-options&tab=settings', __('Settings', Contact_FormSI_TXT));
			$plugin_meta[] = sprintf('<a href="%s">%s</a>', 'https://github.com/edwardmuss/crsms-contact-form-7-sms-notification', __('View On Github', Contact_FormSI_TXT));
			$plugin_meta[] = sprintf('<a href="%s">%s</a>', 'https://github.com/edwardmuss/crsms-contact-form-7-sms-notification/issues', __('Report Issue', Contact_FormSI_TXT));
			$plugin_meta[] = sprintf('<a href="%s">%s</a>', 'https://edwardmuss.tech/', __('Author', Contact_FormSI_TXT));
		}
		return $plugin_meta;
	}
}
