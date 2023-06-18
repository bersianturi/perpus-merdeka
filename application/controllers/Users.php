<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_users');
    }


    public function index()
    {
        $data['users'] = $this->Mod_users->getAll()->result();
        $data['judul'] = 'User';

        if ($this->uri->segment(3) == "create-success") {
            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Disimpan!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('users/users_data', $data);
        } else if ($this->uri->segment(3) == "update-success") {
            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Diubah!</p></div>";
            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('users/users_data', $data);
        } else if ($this->uri->segment(3) == "delete-success") {
            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Dihapus!</p></div>";
            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('users/users_data', $data);
        } else {
            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('users/users_data', $data);
        }
    }

    public function create()
    {
        $data['judul'] = 'Tambah User';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('users/users_create');
    }

    public function insert()
    {
        if (isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila users mengisi form
            if ($this->form_validation->run() == true) {
                $username = $this->input->post('username');
                $cek = $this->Mod_users->cekUsername($username);
                //cek nis yg sudah digunakan
                if ($cek->num_rows() > 0) {
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <p><i class='mdi mdi-alert'></i>Username Sudah Digunakan!</p></div>";
                    $this->load->view('users/users_create');
                }
                //kalo blm digunakan lakukan insert data kedatabase
                else {

                    $save  = array(
                        'username'   => $this->input->post('username'),
                        'full_name'  => $this->input->post('full_name'),
                        'password'   => get_hash($this->input->post('password'))
                    );
                    $this->Mod_users->insertUsers("petugas", $save);
                    // echo "berhasil"; die();
                    redirect('users/index/create-success');
                }
            }
            //jika users mengkosongkan form input
            else {
                $data['judul'] = 'Tambah User';

                $this->load->view('includes/header_new', $data);
                $this->load->view('includes/menu', $data);
                $this->load->view('users/users_create');
            }
        } //end $_POST['save']
    }

    public function edit($id)
    {
        $data['edit']    = $this->Mod_users->getUsers($id)->row_array();
        $data['judul'] = 'Tambah User';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('users/users_edit', $data);
    }

    public function update()
    {
        if (isset($_POST['update'])) {

            $this->_set_rules();

            //apabila user apabila user mengisi form input
            if ($this->form_validation->run() == true) {

                //apabila password diganti
                if ($this->input->post('password') != "") {
                    $id_petugas      = $this->input->post('id_petugas');

                    $save  = array(
                        'id_petugas' => $this->input->post('id_petugas'),
                        'username'   => $this->input->post('username'),
                        'full_name'  => $this->input->post('full_name'),
                        'password'   => get_hash($this->input->post('password'))
                    );
                    $this->Mod_users->updateUsers($id_petugas, $save);
                    redirect('users/index/update-success');

                    //jika password tidak diganti   
                } else {
                    $id_petugas      = $this->input->post('id_petugas');

                    $save  = array(
                        'id_petugas' => $this->input->post('id_petugas'),
                        'username'   => $this->input->post('username'),
                        'full_name'  => $this->input->post('full_name')
                    );
                    $this->Mod_users->updateUsers($id_petugas, $save);
                    // echo "berhasil"; die();
                    redirect('users/index/update-success');
                }
            }
            //jika mengkosongkan
            else {
                $id_petugas      = $this->input->post('id_petugas');
                $data['edit']    = $this->Mod_users->getUsers($id_petugas)->row_array();
                $data['judul'] = 'Edit User';

                $this->load->view('includes/header_new', $data);
                $this->load->view('includes/menu', $data);
                $this->load->view('users/users_edit_new', $data);
            }
        }
    }

    public function delete()
    {
        $id_petugas = $this->input->post('id_petugas');

        $this->Mod_users->deleteUsers($id_petugas, 'petugas');
        redirect('users/index/delete-success');
    }

    public function _set_rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
    }
}

/* End of file Users.php */
