<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('menu_model');
	}


	public function index() {
		$data['user'] = $this->db->get_where('user',['email'=> 
			$this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->order_by("id", "desc");
		$data['barang'] = $this->db->get('barang')->result_array();

		if ($this->input->post('keyword')) {
				$data['barang'] =  $this->menu_model->searchDataBarang();
			}

		$this->load->view('template/header_user', $data);
		$this->load->view('user/index',$data);
		$this->load->view('template/footer_user');
	}

	public function myprofile() 
	{
		$data['title'] = 'Profile Saya';
		$data['user'] = $this->db->get_where('user',['email'=> 
		$this->session->userdata('email')])->row_array();
		

		// echo 'selamat datang'. $data['user']['name'];	
		$this->load->view('template/header_user',$data);
		$this->load->view('user/myprofile',$data);
		$this->load->view('template/footer_user');

	}



	public function edit(){
		$data['title'] = 'Ubah Profile';
		$data['user'] = $this->db->get_where('user',['email'=> 
			$this->session->userdata('email')])->row_array();


		$this->form_validation->set_rules('name','Full Name','required|trim');
		
		if ($this->form_validation->run()== false) {
			# code...
			
		// echo 'selamat datang'. $data['user']['name'];	
			$this->load->view('template/header_user',$data);
			$this->load->view('user/edit',$data);
			$this->load->view('template/footer_user');
		}else{
			$name =$this->input->post('name');
			$email =$this->input->post('email');

			//cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload',$config);
				if ($this->upload->do_upload('image')) {
					$old_image=$data['user']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/img/profile/' . $old_image); //untuk menghapus data
					}



					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);
				}else{
					echo $this->upload->display_errors();
				}

			}



			$this->db->set('name',$name);
			$this->db->where('email',$email);
			$this->db->update('user');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				Profile anda telah diperbarui
				</div>');
			redirect('user/myprofile');

		}
	}


	public function changePassword()
	{
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user',['email'=> 
			$this->session->userdata('email')])->row_array();
		



		$this->form_validation->set_rules('current_password','Current Password','required|trim');
		$this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2','New Password','required|trim|min_length[3]|matches[new_password1]');
		if ($this->form_validation->run()== false) {
		// echo 'selamat datang'. $data['user']['name'];	
			$this->load->view('template/header_user', $data);
			$this->load->view('user/changepassword',$data);
			$this->load->view('template/footer_user');
		}else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			if(!password_verify($current_password,$data['user']['password'])){
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Wrong Current Password!
					</div>');
				redirect('user/changepassword');

			}else{
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						New Password cannot be same as current password!
						</div>');
					redirect('user/changepassword');
				}else{
				//password ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password',$password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');


					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
					Password dirubah

						</div>');

					redirect('user/changepassword');
				}
			}
		}

	}


	public function barangsaya() 
	{
		$data['title'] = 'Barang Saya';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->db->get_where('barang',['user_id'=>$this->session->userdata('id')])->result_array();	
		$this->load->view('template/header_user',$data);
		$this->load->view('user/barangsaya',$data);
		$this->load->view('template/footer_user');

	}

	public function tambah_barang()
	{
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$tipe = $this->input->post('tipe');
		$deskripsi = $this->input->post('deskripsi');
		$user_id = $this->input->post('user_id');
		$contact = $this->input->post('contact');
		$image = $_FILES['image'];
		$status = $this->input->post('status');
		if($image= ''){}else{
			$config['upload_path'] = './assets/img/barang';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']      = '2048';

			$this->load->library('upload' , $config);

			if(!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Upload Gagal!
				</div>'); redirect('user/index'); die();
			}else{
				$image = $this->upload->data('file_name');
			}

		}

		$data = array(
			'nama' => $nama,
			'kategori' => $kategori,
			'tipe' => $tipe,
			'deskripsi' => $deskripsi,
			'user_id' => $user_id,
			'contact' => $contact,
			'image' => $image,
			'status' => $status

		);

		$this->db->insert('barang', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				data ditambahkan!
				</div>');
		redirect('user/index');
	}

	public function delete1($id) {
		$this->db->where('id',$id);
		$this->db->delete('barang');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data dihapus!
			</div>');
		redirect(base_url('user/barangsaya'));
	
	}

	public function edit1 ($id){
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['edit'] = $this->menu_model->getBarangById($id);
		$data['status'] = ['sudah terverifikasi','belum terferivikasi'];
		$data['kategori'] = ['elektronik','tas','surat penting','buku','jaket','aksesoris','lain-lain'];
		$data['tipe'] = ['barang hilang','barang temuan'];
			$this->load->view('template/header_user',$data);
			$this->load->view('user/editbarang',$data);
			$this->load->view('template/footer_user');

	}

	public function update() {
		
			$id =$this->input->post('id');
			$nama =$this->input->post('nama');
			$kategori =$this->input->post('kategori'); 
			$tipe =$this->input->post('tipe'); 
			$user_id =$this->input->post('user_id'); 
			$deskripsi =$this->input->post('deskripsi'); 
			$contact =$this->input->post('contact'); 
			$status =$this->input->post('status');

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload',$config);
				if ($this->upload->do_upload('image')) {
					$old_image=$upload_image;
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
						 //untuk menghapus data
					}



					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);
					
				}else{
					echo $this->upload->display_errors();
				}
			}

			

			$data = array(
				
				'nama' => $nama,
				'kategori' => $kategori,
				'tipe' => $tipe,
				'user_id' => $user_id,
				'deskripsi' => $deskripsi,
				'contact' => $contact,
				'status' => $status,
			);

			$this->db->where('id',$this->input->post('id'));
			$this->db->update('barang', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				data barang telah diperbarui
				</div>');
			redirect('user/barangsaya');
	}



	public function barang_temuan() {
		$data['barang'] = $this->db->get_where('barang',['tipe'=> 'barang temuan'])->result_array();
		$data['user'] = $this->db->get_where('user',['email'=> 
			$this->session->userdata('email')])->row_array();
		$this->load->view('template/header_user', $data);
		$this->load->view('user/index',$data);
		$this->load->view('template/footer_user');
	}


	public function barang_hilang() {
		$data['barang'] = $this->db->get_where('barang',['tipe'=> 'barang hilang'])->result_array();
		$data['user'] = $this->db->get_where('user',['email'=> 
			$this->session->userdata('email')])->row_array();
		$this->load->view('template/header_user', $data);
		$this->load->view('user/index',$data);
		$this->load->view('template/footer_user');
	}

	public function detail($id)
	{
	
		$data['user'] = $this->db->get_where('user',['email'=> 
			$this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->get_where('barang',['id'=> $id])->row_array();
		$this->load->view('template/header_user',$data);
		$this->load->view('user/detail_barang',$data);
		$this->load->view('template/footer_user');
	}



}
