<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
 		$this->lang->load('front_end/layout'); 
		$this->load->model('page_model');
		
	}

	public function index() { 
		
		$this->show();
		
	}
	
	public function show( $id = false )
	{
		if( $id )
		{
			$info = $this->page_model->get_by_id( $id );
			
			if( !empty($info) ){
				//Neu view != NULL thi lay html View
				if( !empty($info['view']) )
				{
					$info['body'] = $this->load->view('page/' . $info['view'], $info, true);
				}
				
				//Lay master_view
				if( empty($info['master_view']) )
				{
					
					$info['master_view'] = $this->setting->item('master_view');
				}
				
				if ( empty($info['view']) ){
					$info['view'] = 'default';
				}

				$data = array(
								'content' => $info['active'] == 1? $info['content'] : '',
								'title' => $info['title']
							 );
				
				$view = $this->load->view($this->router->class.'/'.$info['view'], $data, true);
				
				$master_data['content'] = $view;
				$master_data['title'] = $this->setting->item('namesite');
				
				$this->load->view($info['master_view'], $master_data);
				
			}
			else
			{
				show_404();
			}
		} else{
			show_404();
		}
	}
}