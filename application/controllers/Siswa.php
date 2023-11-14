<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->model('User_model');
		$this->load->model('Kelas_model');

        if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}
	}

	public function index()
    {
        $siswa = $this->Siswa_model->data();
            $data = array('title'  => 'Data Siswa',
                          'siswa' => $siswa,
                          'isi'    => 'siswa/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function tambah()
	{
		$kelas = $this->Kelas_model->data();

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nisn','nisn','required|is_unique[siswa.nisn]',array(
			'required'			=>'nisn harus diisi',
            'is_unique'		=> 'nisn <strong>'.$this->input->post('nisn').
            '&nbsp; </strong> sudah ada. Buat nisn baru'));

		$valid->set_rules('nama_siswa','nama_siswa','required',array(
			'required'			=>'Nama siswa harus diisi'));
		


		if($valid->run()){

            if (!empty($_FILES['gambar1']['name'])) {
					
                $config['upload_path'] = './asset/upload/siswa/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000'; // KB
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('gambar1')) {
                    $data = array('title' => 'Tambah Data siswa',
                                'kelas'	=> $kelas,
                                'error' => $this->upload->display_errors('Ukuran file terlalu besar atau format file tidak sesuai'),
                                'isi' => 'siswa/tambah');
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                }else {
                    $upload_data = array('uploads' => $this->upload->data());

                    $config['image_library']	=	'gd2';
                    $config['source_image']		=	'./asset/upload/siswa/'.$upload_data['uploads']['file_name'];
                    $config['quality']			=	"100%";
                    $config['maintain_ratio']	=	TRUE;
                    $config['width']			=	360;
                    $config['height']			=	360;
                    $config['x_axis']			=	0;
                    $config['y_axis']			=	0;
                    $config['thumb_marker']		=	'';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $i= $this->input;
                        $data = array(  
                        	'nisn'				=> $i->post('nisn'),
							'nama_siswa'		=> $i->post('nama_siswa'),
							'id_kelas'			=> $i->post('id_kelas'),
							'alamat'			=> $i->post('alamat'),
							'agama'				=> $i->post('agama'),
							'jenis_kelamin'		=> $i->post('jenis_kelamin'),
							'hp_ortu'			=> $i->post('hp_ortu'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> $i->post('tanggal_lahir'),
							'photo'			    => $upload_data['uploads']['file_name'],
							'no_kk'				=> $i->post('no_kk'),
							'nama_ayah'			=> $i->post('nama_ayah'),
							'nama_ibu'			=> $i->post('nama_ibu'),
							'tahun_ajaran'		=> $i->post('tahun_ajaran')
                        );

                        $dataU = array(  
                        	'username'			=> $i->post('nisn'),
							'password'		    => password_hash(123456, PASSWORD_DEFAULT),
							'akses_level'		=> "SISWA"
							
                        );

                        $this->Siswa_model->tambah($data);
                        $this->User_model->tambahSiswa($dataU);
                        $this->session->set_flashdata('sukses', 'data telah ditambah');
                        redirect(base_url('siswa'), 'refresh');       
                    }

            }else {
                $i = $this->input;
                    $data = array(  'nisn'				=> $i->post('nisn'),
									'nama_siswa'		=> $i->post('nama_siswa'),
									'id_kelas'			=> $i->post('id_kelas'),
									'alamat'			=> $i->post('alamat'),
									'agama'				=> $i->post('agama'),
									'jenis_kelamin'		=> $i->post('jenis_kelamin'),
									'hp_ortu'			=> $i->post('hp_ortu'),
									'tempat_lahir'		=> $i->post('tempat_lahir'),
									'tanggal_lahir'		=> $i->post('tanggal_lahir'),
									'no_kk'				=> $i->post('no_kk'),
									'nama_ayah'			=> $i->post('nama_ayah'),
									'nama_ibu'			=> $i->post('nama_ibu'),
									'tahun_ajaran'		=> $i->post('tahun_ajaran'));

                    $dataU = array(  
                            'username'			=> $i->post('nis'),
							'password'		    => password_hash(123456, PASSWORD_DEFAULT),
							'akses_level'		=> "SISWA"
                        
                    );

                    $this->Siswa_model->tambah($data);
                    $this->User_model->tambahSiswa($dataU);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('siswa'),'refresh');
            }
        }
			//end validasi
				$data = array('title' => 'Tambah Data siswa',
                                'kelas'	=> $kelas,
								'isi' => 'siswa/tambah');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($nisn)
	{
		$siswa = $this->Siswa_model->detail($nisn);
		$user = $this->User_model->detail($nisn);
		$kelas = $this->Kelas_model->data();
		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_siswa','nama_siswa','required',array(
			'required'			=>'Nama siswa harus diisi'));
		

		if($valid->run()){
			

			if (!empty($_FILES['gambar1']['name'])) {
				
				$config['upload_path'] = './asset/upload/siswa/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size']  = '20000';
				$config['max_width']  = '20000';
				$config['max_height']  = '20000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar1')){
					$data = array('title' => 'Edit Data Siswa',
									'user'	=> $user,
									'kelas'	=> $kelas,
									'siswa'	=> $siswa,
									'error' => $this->upload->display_errors('ukuran file terlalu besar atau format file terlalu besar'),
									'isi' => 'siswa/edit');
									$this->load->view('admin/layout/wrapper', $data, FALSE);
				}else{
					$upload_data = array('uploads' => $this->upload->data());

					$config['image_library']	=	'gd2';
					$config['source_image']		=	'./asset/upload/siswa/'.$upload_data['uploads']['file_name'];
					$config['quality']			=	"100%";
					$config['maintain_ratio']	=	TRUE;
					$config['width']			=	360;
					$config['height']			=	360;
					$config['x_axis']			=	0;
					$config['y_axis']			=	0;
					$config['thumb_marker']		=	'';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

						$i = $this->input;
						$data = array(  'nisn'				=> $nisn,
										'nama_siswa'		=> $i->post('nama_siswa'),
										'id_kelas'			=> $i->post('id_kelas'),
										'alamat'			=> $i->post('alamat'),
										'agama'				=> $i->post('agama'),
										'jenis_kelamin'		=> $i->post('jenis_kelamin'),
										'hp_ortu'			=> $i->post('hp_ortu'),
										'tempat_lahir'		=> $i->post('tempat_lahir'),
										'tanggal_lahir'		=> $i->post('tanggal_lahir'),
										'photo'			    => $upload_data['uploads']['file_name'],
										'no_kk'				=> $i->post('no_kk'),
										'nama_ayah'			=> $i->post('nama_ayah'),
										'nama_ibu'			=> $i->post('nama_ibu'),
										'tahun_ajaran'		=> $i->post('tahun_ajaran')
									);

						
						$id = $this->db->get_where('siswa',['nisn' => $nisn])->row();
						unlink("./asset/upload/siswa/".$id->photo);

						$this->Siswa_model->edit($data);
						$this->session->set_flashdata('sukses', 'data telah diedit');
						redirect(base_url('siswa'),'refresh');
					
				}
			
			//end cek data gambar
			}else{
				$i = $this->input;
				$data = array('nisn'				=> $nisn,
				'nama_siswa'		=> $i->post('nama_siswa'),
				'id_kelas'			=> $i->post('id_kelas'),
				'alamat'			=> $i->post('alamat'),
				'agama'				=> $i->post('agama'),
				'jenis_kelamin'		=> $i->post('jenis_kelamin'),
				'hp_ortu'			=> $i->post('hp_ortu'),
				'tempat_lahir'		=> $i->post('tempat_lahir'),
				'tanggal_lahir'		=> $i->post('tanggal_lahir'),
				'no_kk'				=> $i->post('no_kk'),
				'nama_ayah'			=> $i->post('nama_ayah'),
				'nama_ibu'			=> $i->post('nama_ibu'),
				'tahun_ajaran'		=> $i->post('tahun_ajaran')
							);


				$this->Siswa_model->edit($data);
				$this->session->set_flashdata('sukses', 'data berhasil diedit');
				redirect(base_url('siswa'),'refresh');
				

				
			}
		
		//end valid
		}else{
			
			$data = array('title' => 'Edit Data User',
			'user'	=> $user,
            'kelas'	=> $kelas,
			'siswa'	=> $siswa,
			'isi' => 'siswa/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}
	}
	//end edit

	public function delete($nisn){
		$id = $this->db->get_where('siswa',['nisn' => $nisn])->row();
		unlink("./asset/upload/siswa/".$id->photo);
		$dataU = array('username' => $nisn);
		$this->User_model->delete1($dataU);
		$data = array('nisn'	=> $nisn);
		$this->Siswa_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('siswa'),'refresh');
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */