<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2006, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 *
 * @download from  http://www.joelsays.com/downloads/jquery-pagination.zip
 */
class Ajax_pagination{

	var $base_url			= ''; // The page we are linking to
	var $total_rows  		= ''; // Total number of items (database results)
	var $per_page	 		= 10; // Max number of items you want shown per page
	var $num_links			=  2; // Number of "digit" links to show before/after the currently viewed page
	var $cur_page	 		=  0; // The current page being viewed
	var $first_link   		= '&lsaquo; First';
	var $next_link			= '&gt;';
	var $prev_link			= '&lt;';
	var $last_link			= 'Last &rsaquo;';
	var $uri_segment		= 3;
	var $full_tag_open		= '<div class="pagination">';
	var $full_tag_close		= '</div>';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';
	var $cur_tag_open		= '&nbsp;<b>';
	var $cur_tag_close		= '</b>';
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';
	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';
	
	// Added By Tohin
	var $request_type 		= 'post';
	var $html_container 	= '';
	var $js_rebind 			= '$(\'html, body\').animate({ scrollTop: $(\'#search-prod\').offset().top },\'fast\')';	
	var $postVar            = '';
    var $additional_param	= '';
    var $form_serialize		= '';
    var $serialize_array	= '0';
    
   // Added by Sean
   var $anchor_class		= '';
   var $show_count      = false;

	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	function CI_Pagination($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);		
		}
		
		log_message('debug', "Pagination Class Initialized");
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}		
		}
		
		// Apply class tag using anchor_class variable, if set.
		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="' . $this->anchor_class . '" ';
		}		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */	
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
		   return '';
		}

		// Calculate the total number of pages
		$num_pages = (int) ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages === 1)
		{
			return '';
		}

		// Determine the current page number.		
		$CI =& get_instance();	
		if ($CI->uri->segment($this->uri_segment) != 0)
		{
			$this->cur_page = $CI->uri->segment($this->uri_segment);
			
			// Prep the current page - no funny business!
			$this->cur_page = (int) $this->cur_page;
		}

		$this->num_links = (int)$this->num_links;
		
		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}
				
		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}
		
		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Add a trailing slash to the base URL if needed
		$this->base_url = rtrim($this->base_url, '/') .'/';

  		// And here we go...
		$output = '';

      // SHOWING LINKS
      if ($this->show_count)
      {
         $curr_offset = $CI->uri->segment($this->uri_segment);
         $info = 'Showing ' . ( $curr_offset + 1 ) . ' to ' ;

         if( ( $curr_offset + $this->per_page ) < ( $this->total_rows -1 ) )
            $info .= $curr_offset + $this->per_page;
         else
            $info .= $this->total_rows;

         $info .= ' of ' . $this->total_rows . ' | ';

         $output .= $info;
      }

		// Render the "First" link
		if  ($this->cur_page > $this->num_links)
		{
			$output .= $this->first_tag_open 
					. $this->getAJAXlink( '' , $this->first_link, $CI)
					. $this->first_tag_close; 
		}

		// Render the "previous" link
		if  ($this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page;
			if ($i == 0) $i = '';
			$output .= $this->prev_tag_open 
					. $this->getAJAXlink( $i, $this->prev_link, $CI)
					. $this->prev_tag_close;
		}

		// Write the digit links
		for ($loop = $start -1; $loop <= $end; $loop++)
		{
			$i = ($loop * $this->per_page) - $this->per_page;
					
			if ($i >= 0)
			{
				if ($this->cur_page == $loop)
				{
					$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
				}
				else
				{
					$n = ($i == 0) ? '' : $i;
					$output .= $this->num_tag_open
						. $this->getAJAXlink( $n, $loop, $CI)
						. $this->num_tag_close;
				}
			}
		}

		// Render the "next" link
		if ($this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open 
				. $this->getAJAXlink( $this->cur_page * $this->per_page , $this->next_link, $CI )
				. $this->next_tag_close;
		}

		// Render the "Last" link
		if (($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open . $this->getAJAXlink( $i, $this->last_link, $CI ) . $this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;
		
		return $output;		
	}

	function getAJAXlink( $count, $text, $CI) {

		/*
        if( $this->div == '') 
        	return '<a href="'. $this->anchor_class . ' ' . $this->base_url . $count . '">'. $text .'</a>';          
      	*/  
        $pageCount = $count?$count:0;
        $ajax_link_data = [];
        if( $this->form_serialize){
        	if($this->serialize_array){
        		$ajax_link_data[]['js']['form_data'] = '$(\'#'.$this->form_serialize.'\').serializeArray()';	
        	}else{
        		$ajax_link_data[]['js']['form_data'] = '$(\'#'.$this->form_serialize.'\').serialize()';
        	}
        	
        	$ajax_link_data[]['str'][$CI->security->get_csrf_token_name()] = $CI->security->get_csrf_hash();
        }else if ($this->additional_param){
        	$ajax_link_data = $this->additional_param;
        }
        $ajax_link_data[]['str']['ajax'] = 1;
        $ajax_link_data[]['str']['offset'] = $pageCount;
        /*
        	Normally library is always independent
        */
        $ajax_link_data = $this->make_ajax_req_data($ajax_link_data);

        if( $this->request_type == "get") {
			return "<a href=\"javascript:void(0);\"" . $this->anchor_class . "
					onclick=\" $.".$this->request_type."('". $this->base_url."', ". $ajax_link_data .", 
					function(data){
						data = JSON.parse(data);
	                    if(data.success){	                        
	                        $('#". $this->html_container."').html(data.html);
	                        ". $this->js_rebind .";
	                    }  
                	}); return false;\">". $text .'</a>';
        }
		return "<a href=\"javascript:void(0);\"" . $this->anchor_class . "
					onclick=\" $.".$this->request_type."('". $this->base_url."', ". $ajax_link_data .", 
					function(data){
						data = JSON.parse(data);
	                    if(data.success){
	                        $('input[name=\'".$CI->security->get_csrf_token_name()."\']' ).val(data.csrf_hash);                        
	                        $('#". $this->html_container."').html(data.html);
	                        ". $this->js_rebind .";
	                    }  
                	}); return false;\">". $text .'</a>';
	}

	function make_ajax_req_data( $ajax_data = []){
		$data_html_json = "{";
		foreach ($ajax_data as $data_key => $data_value) {
			foreach ($data_value as $act_key => $act_data) {
				foreach ($act_data as $act_data_key => $act_data_value) {
					if( $act_key == 'js' ){
						$data_html_json .= "'".$act_data_key."':".$act_data_value.",";
					}else if( $act_key == 'str' ){
						$data_html_json .= "'".$act_data_key."':'".$act_data_value."',";
					}
				}
			}
		}
		$data_html_json .= "}";
		return $data_html_json;
	}
}
// END Pagination Class
?>