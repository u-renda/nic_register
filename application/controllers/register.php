<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
    }
	
	function register_form()
    {
		if ($this->session->userdata('is_admin_login') == FALSE) { redirect('index'); }
		
		$data = array();
		
		if ($this->input->post('submit'))
		{
			// username
			// nama lengkap digabung, hilang spasi, ambil 8 karakter
			
			// password
			// md5 dari username, ambil 8 karakter
			
			// birth date
			$explode = explode('-', $this->input->post('birth_date'));
			$birth_date = $explode[2].'-'.$explode[1].'-'.$explode[0].' 00:00:00';
			
			// queue num
			// ambil no terakhir dari DB + 1
			
			// member ID
			// bulan lahir (2) + tahun lahir (2) + jenis kelamin (1) + W (1) + initial admin (1) + tahun approved (2) + queue num (5)
			
			$param = array();
			$param['username'] = '';
			$param['password'] = '';
			$param['idcard_type'] = $this->input->post('idcard_type');
			$param['idcard_no'] = $this->input->post('idcard_no');
			$param['fullname'] = strtolower($this->input->post('fullname'));
			$param['gender'] = $this->input->post('gender');
			$param['birth_place'] = strtolower($this->input->post('birth_place'));
			$param['birth_date'] = $birth_date;
			$param['idcard_address'] = strtolower($this->input->post('idcard_address'));
			$param['ship_address'] = strtolower($this->input->post('ship_address'));
			$param['phone_no'] = $this->input->post('phone_no');
			$param['email'] = strtolower($this->input->post('email'));
			$param['marital_status'] = $this->input->post('marital_status');
			$param['occupation'] = strtolower($this->input->post('occupation'));
			$param['religion'] = strtolower($this->input->post('religion'));
			$param['shirt_size'] = $this->input->post('shirt_size');
			$param['photo_path'] = $this->input->post('photo_path');
			$param['idscan_path'] = $this->input->post('idscan_path');
			$param['create_date'] = date('Y-m-d H:i:s');
			$param['update_date'] = date('Y-m-d H:i:s');
			$param['approved_date'] = date('Y-m-d H:i:s');
			$param['reg_status'] = 'AP';
			$param['member_id'] = '';
			$param['queue_num'] = '';
			print_r($param);die();
			$create = $this->member_model->create($param);
			
			if ($create == TRUE)
			{
				echo "BERHASIL!";
			}
		}
		
		$data['idcard_lists'] = $this->config->item('code_idcard');
		$data['marital_lists'] = $this->config->item('code_marital');
		$data['kota_lists'] = $this->config->item('code_kota');
		$this->load->view('register', $data);
    }
	
	function index()
	{
		if ($this->session->userdata('is_admin_login') == TRUE) { redirect('register_form'); }
		
		if ($this->input->cookie('username') != '' && $this->input->cookie('password') != '')
		{
			$username = decode($this->input->cookie('username'), 'key123');
			$getdata = $this->admin_model->info(array('username' => $username));
			
			if ($getdata->num_rows() > 0)
			{
                $admin = $getdata->row();
                
				if ($admin->password == $this->input->cookie('password'))
				{
					$session = array(
						'role'=> $admin->role,
						'administrator_id'=> $admin->administrator_id,
						'email'=> $admin->email,
						'username'=> $admin->username,
						'is_admin_login'=> true
					);
					
					$this->session->set_userdata($session);
					
					$log = array();
					$log['administrator_id'] = $this->session->userdata('administrator_id');
					$log['username'] = $this->session->userdata('username');
					$log['label'] = 'login';
					$log['detail'] = 'Login';
					$this->admin_log_model->create($log);
					
					redirect('register_form');
				}
			}
		}
		
		$data['title'] = $this->config->item('title');
        $this->load->view('index', $data);
	}
	
	function login()
    {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->admin_model->info(array('username' => $username, 'password' => md5($password)));
		
		if ($result->num_rows() > 0)
		{
			$admin = $result->row();
			
			$session = array(
				'role'=> $admin->role,
				'admin_id'=> $admin->admin_id,
				'email'=> $admin->email,
				'username'=> $admin->username,
				'photo'=> $admin->photo,
				'is_admin_login'=> TRUE
			);
			
			$this->session->set_userdata($session);
			
			if ($this->input->post('logged'))
			{
				$cookie_user = encode($username, 'key123');
				$cookie_pass = sha1($admin->password);
				
				$cookie_username = array(
					'name'   => 'username',
					'value'  => ''.$cookie_user.'',
					'expire' => '1728000'
				);
				$cookie_password = array(
					'name'   => 'password',
					'value'  => ''.$cookie_pass.'',
					'expire' => '1728000'
				);
				
				$this->input->set_cookie($cookie_username);
				$this->input->set_cookie($cookie_password);
			}
			
			redirect('register_form');
		}
		else
		{
			redirect('index');
		}
    }
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('administrator_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('photos');
		$this->session->unset_userdata('is_admin_login');
		
		delete_cookie("username");
		delete_cookie("password");
		
		redirect('index');
	}
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */