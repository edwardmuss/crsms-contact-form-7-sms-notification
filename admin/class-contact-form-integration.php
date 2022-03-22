<?php

/**
 * The admin-specific functionality of the plugin.
 * @author     Cloud Rebue <info@cloudrebue.co.ke>
 */
if (!defined('WPINC')) {
    die;
}

class CRSMS_Contact_Form_Sms_Notification_abn_Plugin_Integration extends CRSMS_Contact_Form_Sms_Notification_abn_Admin
{

    /**
     * Initialize the class and set its properties.
     * @since      0.1
     */
    public function __construct()
    {
        add_action('wp_ajax_Contact_FormISISMSHISTORYDELETE', array($this, 'delete_cf7sms_history'));
        add_action('wp_ajax_Contact_FormISISMSHISTORYEMPTY', array($this, 'empty_cf7sms_history'));

        add_filter('wpcf7_editor_panels', array($this, 'new_menu'), 99);
        add_action('wpcf7_after_save', array(&$this, 'save_form'));
    }

    public function empty_cf7sms_history()
    {
        update_option('wpcf7is_history', array());
        exit;
    }

    public function delete_cf7sms_history()
    {
        $array = get_option('wpcf7is_history');
        if (empty($array)) {
            _e('1');
            exit;
        }
        $deleteID = sanitize_text_field($_REQUEST['deleteID']);
        if (isset($array[$deleteID])) {
            unset($array[$deleteID]);
            update_option('wpcf7is_history', $array);
            _e('1');
            exit;
        }
    }

    public function new_menu($panels)
    {
        $panels['cf7si-sms-panel'] = array(
            'title' => __('Cloud Rebue SMS', Contact_FormSI_TXT),
            'callback' => array($this, 'add_panel')
        );
        return $panels;
    }

    public function add_panel($form)
    {
        if (wpcf7_admin_has_edit_cap()) {
            $options = get_option('wpcf7_international_sms_' . (method_exists($form, 'id') ? $form->id() : $form->id));
            if (empty($options) || !is_array($options)) {
                $options = array('phone' => '', 'message' => '', 'visitorNumber' => '', 'visitorMessage' => '');
            }
            $options['form'] = $form;
            $data =  $options;
            include(Contact_FormSI()->get_vars('PATH') . 'template/cf7-template.php');
        }
    }

    /**
     * Save SMS options when contact form is saved
     *
     * @param object $cf Contact form
     * @return void
     * @author James Inman
     */
    public function save_form($form)
    {
        $settings = array_map('sanitize_text_field', $_POST['wpcf7si-settings']);
        update_option('wpcf7_international_sms_' . (method_exists($form, 'id') ? $form->id() : $form->id), $settings);
    }
}