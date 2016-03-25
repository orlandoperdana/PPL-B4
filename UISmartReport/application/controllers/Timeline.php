<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->model('Timeline_model');
    }

	public function index()
	{
		$session_id = $this->session->userdata('username');
		if(!isset($session_id))
		{
			redirect('Welcome');
		}
		else
		{
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');

			$this->form_validation->set_rules('post', 'Post', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = '';
				$data['timeline'] = $this->Timeline_model->retrieve_posts();
				$this->load->view('tlview', $data);
			}
			else
			{
				if (!is_dir('uploads')) {
					$oldmask = umask(0);
		            mkdir('./uploads', 0777, true);
		            umask($oldmask);
		        }
				if (!is_dir('uploads/'.$session_id))
			    {
			    	$oldmask = umask(0);
			        mkdir('./uploads/'.$session_id, 0777, true);
			        umask($oldmask);
			    }

			    $config['upload_path']          = './uploads/'.$session_id.'/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$config['file_name'] 			= uniqid();

				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				$attachment = $this->upload->do_upload('userfile');
				$is_attached = $_FILES['userfile']['error'] != 4;
				if (!$attachment && $is_attached)
				{
					$data['error'] = $this->upload->display_errors();
					$data['timeline'] = $this->Timeline_model->retrieve_posts();
					$this->load->view('tlview', $data);
				}
				else
				{
					$upload_data = $this->upload->data();
					$path = base_url().'uploads/'.$session_id.'/'.$upload_data['file_name'];

					if($this->input->post('anonymous') == 'true')
					{
						if($attachment)
						{
							$newdata1 = array(
						        'OwnerId'  => $session_id,
						        'Data' => $this->input->post('post'),
						        'IsAnonymous' => true,
						        'Attachments' => $path
							);
						}
						else
						{
							$newdata1 = array(
						        'OwnerId'  => $session_id,
						        'Data' => $this->input->post('post'),
						        'IsAnonymous' => true
							);
						}
					}
					else
					{
						if($attachment)
						{
							$newdata1 = array(
						        'OwnerId'  => $session_id,
						        'Data' => $this->input->post('post'),
						        'Attachments' => $path
							);
						}
						else
						{
							$newdata1 = array(
						        'OwnerId'  => $session_id,
						        'Data' => $this->input->post('post')
								);
						}
					}

					$this->Timeline_model->insert_post($newdata1);
					$data['error'] = '';
					$data['timeline'] = $this->Timeline_model->retrieve_posts();
					$this->load->view('tlview', $data);
				}
			}
		}
	}
}