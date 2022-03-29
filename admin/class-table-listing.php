<?php
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class cf7si_history_listing_table extends WP_List_Table {
    function __construct(){
        global $status, $page;
        parent::__construct( array(
            'singular'  => '',
            'plural'    => '',
            'ajax'      => false
        ) );
    }

    function column_default($item, $column_name){ return print_r($item,true); }
	
    function column_formNAME($item){ 
 
		$actions = array(
            'delete'    => sprintf('<a class="deleteRecord" href="javascript:void(0);" data-id="%s">'.__('Delete',Contact_FormSI_TXT).'</a>',$item['ID']),
        );
		
		return sprintf('%1$s <br/> <span style="font-weight: bold; color: rgb(113, 113, 113);">(id:%2$s)</span>%3$s',
            /*$1%s*/ $item['formNAME'],
            /*$2%s*/ $item['formID'],
            /*$3%s*/ $this->row_actions($actions)
        );
	}
    function column_tomobile($item){ return $item['to']; }
    function column_response($item){ return $item['response']; }
	function column_message($item){ return urldecode($item['message']); }
	function column_sentdatetime($item){ return $item['datetime'];}
	function column_smsTo($item){ return isset($item['type']) ? $item['type'] : '' ;}
	
    function get_columns(){
        $columns = array( 
            'formNAME'     => __('By Form',Contact_FormSI_TXT),
            'tomobile'    => __('Phone',Contact_FormSI_TXT),
			'message' => __('Message',Contact_FormSI_TXT),
			'response'    => __('Response',Contact_FormSI_TXT),
            'sentdatetime'  => __('Sent Date',Contact_FormSI_TXT),
			'smsTo' => __('SMS To',Contact_FormSI_TXT),
        );
        return $columns;
    }


    function get_sortable_columns() {
        $sortable_columns = array(
            'title'     => array('title',false),     //true means it's already sorted
            'rating'    => array('rating',false),
            'director'  => array('director',false)
        );
        return $sortable_columns;
    }

    function get_bulk_actions() { $actions = array(); return $actions; }


    function process_bulk_action() {
        if( 'delete'===$this->current_action() ) {
            wp_die('Items deleted (or they would be if we had items to delete)!');
        }
    }


    function prepare_items() {
        global $wpdb; //This is used only if making any database queries
        $per_page = 20;
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->process_bulk_action();
        $data = get_option('wpcf7is_history',array());
		function date_compare($a, $b) { 
			$t1 = strtotime($a['datetime']); $t2 = strtotime($b['datetime']);
			return $t2 - $t1;
		}    
		usort($data, 'date_compare');
        $current_page = $this->get_pagenum();
        $total_items = count($data);
		$data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }
	

	/**
	 * Generates content for a single row of the table
	 *
	 * @since 3.1.0
	 * @access public
	 *
	 * @param object $item The current item
	 */
	public function single_row( $item ) {
		echo '<tr id="'.$item['ID'].'" >';
		$this->single_row_columns( $item );
		echo '</tr>';
	}	
}

function cf7si_history_listing(){
    $testListTable = new cf7si_history_listing_table();
    $testListTable->prepare_items();
    ?>
        <form id="movies-filter" method="get">
            <?php $testListTable->display() ?>
        </form>
		<button type="button"  id="emptyHistory" class="button button-secondary"><?php _e('Empty History',Contact_FormSI_TXT); ?></button>
		
<script>
	var DELETEPOPTXT = '<?php _e('Are You Sure Want To Empty SMS History ?',Contact_FormSI_TXT); ?>';
</script>
    <?php
}