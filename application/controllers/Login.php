<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_anggota', 'Mod_buku', 'Mod_login'));
        
    }

    public function index()
    {
        if(isset($_POST['proses'])) {
            
            //form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
            $this->form_validation->set_error_delimiters('<span class="peringatan">', '</span>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('formlogin/Login_new');
            }
            else{
                    //cek username database
                $username = $this->input->post('username');

                if($this->Mod_login->check_db($username)->num_rows()==1) {

                    //cek verfied bycrpt menyamakan data yg di input dengan ada yg di database 
                    $db = $this->Mod_login->check_db($username)->row();
        
                     if(hash_verified($this->input->post('password'), $db->password)) {

                        $userdata = array(
                            'id_petugas'  => $db->id_petugas,
                            'username'    => $db->username,
                            'full_name'   => ucfirst($db->full_name),
                            'password'    => $db->password,
                        );

                    // print_r($userdata); die();    

                    $this->session->set_userdata($userdata);

                    redirect('dashboard');
                    }
                    else{
                        $data['pesan'] = "<div class='alert alert-danger mt-4'>
                                                                Maaf Username dan Password anda salah. </div>";
                        $this->load->view('formlogin/Login_new', $data);
                    }

                }
                else{
                    $data['pesan'] = "<div class='alert alert-danger mt-4'>
                                                                Maaf User tidak ditemukan. </div>";
                        $this->load->view('formlogin/Login_new', $data); 
                }    
               // } //end cek sql injeqtion
            }
        }
        else{
            $this->load->view('formlogin/Login_new');
        }
    }//end function index

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file Login.php */