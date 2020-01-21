<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
		}

		public function index()
		{	
			if($this->session->userdata('email')){
				redirect('user');
			}
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');//untuk rules 
			$this->form_validation->set_rules('password','Password','trim|required');
			if($this->form_validation->run() == false){

				$data['title'] = 'login Page';
				$this->load->view('template/header_home',$data);
				$this->load->view('auth/login');
				$this->load->view('template/footer_home');
			}else{
				$this->_login();
			}
		}

		private function _login()
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->db->get_where('user',['email'=>$email])->row_array(); 
			if ($user) {
				//jika usernya aktif
				if($user['is_active'] == 1){
					//cek password
					if (password_verify($password, $user['password'])) {
						$data=[
							'email' =>$user['email'],
							'role_id' =>$user['role_id'],
							'id' => $user['id']
						];
						
						$this->session->set_userdata($data);												
							redirect('user');
					}else{
						
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
							Password Salah!</div>');
						redirect('auth');
					}

				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						email ini belum diaktivasi!
						</div>');
					redirect('auth');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Email tidak terdaftar!
					</div>');
				redirect('auth');

			}

		}
		
		public function registration()
		{ 
			if($this->session->userdata('email')){
			redirect('user');
			}
			$this->form_validation->set_rules('name','Name','required|trim'); 
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
				'is_unique' => 'Email ini sudah terdaftar'
			]);
			$this->form_validation->set_rules('password1','Password','required|trim|min_Length[3]|matches[password2]',[
				'matches' =>'Password tidak sama!!',
				'min_Length' =>'Password terlalu pendek'
			]);
			$this->form_validation->set_rules('password2','Password','required|trim|min_Length[3]|matches[password1]');
			$this->form_validation->set_rules('nomor_telepon','Nomor Telepon','required|trim');
			
			if($this->form_validation->run() == false){
				$data['title'] = 'WPU User Registration';
				$this->load->view('template/header_home',$data);
				$this->load->view('auth/registration', $data);
			}else{
				$email = $this->input->post('email',true);
				$data = [
					'name' => htmlspecialchars($this->input->post('name',true)),
					'email' => htmlspecialchars($email),
					'image' =>'default.jpg',
					'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
					'is_active' =>1,
					'date_created' => time()
				];
	            $this->db->insert('user', $data);
	            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda telah dibuat, silahkan Login!</div>');
	            redirect('auth');

			}
		}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			anda berhasil logout!
			</div>');
		redirect('auth');
	}


}