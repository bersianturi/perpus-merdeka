<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_anggota');
    }

    public function index()
    {
        $data['judul'] = 'Anggota';
        $data['anggota'] = $this->Mod_anggota->getAll();

        if ($this->uri->segment(3) == "create-success") {

            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Disimpan!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('anggota/anggota_data', $data);
        } else if ($this->uri->segment(3) == "update-success") {

            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Diperbarui!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('anggota/anggota_data', $data);
        } else if ($this->uri->segment(3) == "delete-success") {

            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Dihapus!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('anggota/anggota_data', $data);
        } else {

            $data['message'] = "";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('anggota/anggota_data', $data);
        }
    }

    public function create()
    {
        $data['judul'] = 'Tambah Anggota';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('anggota/anggota_create');
    }

    public function insert()
    {
        if (isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();
            $data['judul'] = 'Tambah Anggota';

            //apabila user mengkosongkan form input
            if ($this->form_validation->run() == true) {
                $nis = $this->input->post('nis');
                $cek = $this->Mod_anggota->cekAnggota($nis);

                //cek nis yg sudah digunakan
                if ($cek->num_rows() > 0) {

                    $data['message'] = "<div class='alert alert-danger'>
                    <p><i class='mdi mdi-alert'></i>NIS Sudah Digunakan!</p></div>";

                    $this->load->view('includes/header_new', $data);
                    $this->load->view('includes/menu', $data);
                    $this->load->view('anggota/anggota_create');
                } else {

                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/anggota/';
                    $config['allowed_types'] = 'gif|jpg|png'; //mencegah upload backdoor
                    $config['max_size']         = '3000';
                    $config['max_width']     = '5000';
                    $config['max_height']    = '5000';
                    $config['file_name']     = $nama;

                    $this->upload->initialize($config);

                    //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')) {
                        $image = $this->upload->data();

                        $save  = array(
                            'nis'   => $this->input->post('nis'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'kelas' => $this->input->post('kelas'),
                            'image' => $image['file_name']
                        );
                        $this->Mod_anggota->insertAnggota("anggota", $save);
                        redirect('anggota/index/create-success');
                    }
                    //apabila tidak ada gambar yg diupload
                    else {
                        $data['message'] = "<div class='alert alert-danger'>
                        <p><i class='mdi mdi-alert'></i>Gambar Masih Kosong!</p></div>";

                        $this->load->view('includes/header_new', $data);
                        $this->load->view('includes/menu', $data);
                        $this->load->view('anggota/anggota_create');
                    }
                }
            }
            //jika tidak mengkosongkan
            else {
                $data['message'] = "";

                $this->load->view('includes/header_new', $data);
                $this->load->view('includes/menu', $data);
                $this->load->view('anggota/anggota_create');
            }
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);

        $data['edit'] = $this->Mod_anggota->cekAnggota($id)->row_array();
        $data['judul'] = 'Edit Anggota';


        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('anggota/anggota_edit', $data);
    }

    public function update()
    {
        $data['judul'] = 'Edit Anggota';

        if (isset($_POST['update'])) {
            //apabila ada gambar yg diupload
            if (!empty($_FILES['userfile']['name'])) {
                $this->_set_rules();

                //apabila user mengkosongkan form input
                if ($this->form_validation->run() == true) {
                    $nis = $this->input->post('nis');

                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/anggota/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']         = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama;

                    $this->upload->initialize($config);

                    //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')) {

                        $image = $this->upload->data();

                        $save  = array(
                            'nis'   => $this->input->post('nis'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'kelas' => $this->input->post('kelas'),
                            'image' => $image['file_name']
                        );
                        $g = $this->Mod_anggota->getGambar($nis)->row_array();

                        //hapus gambar yg ada diserver
                        unlink('assets/img/anggota/' . $g['image']);

                        $this->Mod_anggota->updateAnggota($nis, $save);
                        redirect('anggota/index/update-success');
                    }
                    //apabila tidak ada gambar yg diupload
                    else {
                        $data['message'] = "<div class='alert alert-danger'>
                        <p><i class='mdi mdi-alert'></i>Gambar Masih Kosong!</p></div>";

                        $this->load->view('includes/header_new', $data);
                        $this->load->view('includes/menu', $data);
                        $this->load->view('anggota/anggota_create', $data);
                    }
                }
                //jika tidak mengkosongkan
                else {
                    $nis = $this->input->post('nis');
                    $data['edit']    = $this->Mod_anggota->cekAnggota($nis)->row_array();
                    $data['message'] = "";

                    $this->load->view('includes/header_new', $data);
                    $this->load->view('includes/menu', $data);
                    $this->load->view('anggota/anggota_edit', $data);
                }
            } else {
                $this->_set_rules();

                //apabila user mengkosongkan form input
                if ($this->form_validation->run() == true) {

                    $nis = $this->input->post('nis');
                    $save  = array(
                        'nis'   => $this->input->post('nis'),
                        'nama'  => $this->input->post('nama'),
                        'jk'    => $this->input->post('jenis'),
                        'ttl'   => $this->input->post('tgl_lahir'),
                        'kelas' => $this->input->post('kelas')
                    );
                    $this->Mod_anggota->updateAnggota($nis, $save);
                    redirect('anggota/index/update-success');
                }
                //jika tidak mengkosongkan
                else {
                    $nis = $this->input->post('nis');
                    $data['edit']    = $this->Mod_anggota->cekAnggota($nis)->row_array();
                    $data['message'] = "";
                    $data['judul'] = 'Tambah Anggota';

                    $this->load->view('includes/header_new', $data);
                    $this->load->view('includes/menu', $data);
                    $this->load->view('anggota/anggota_create', $data);
                }
            }
        } //end post update

    } //end function update

    public function delete()
    {
        $nis = $this->input->post('kode');
        $g = $this->Mod_anggota->getGambar($nis)->row_array();

        //hapus gambar yg ada diserver
        unlink('assets/img/anggota/' . $g['image']);
        $this->Mod_anggota->deleteAnggota($nis, 'anggota');
        redirect('anggota/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required|max_length[10]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
        $this->form_validation->set_rules('jenis', 'Jenis Kelamin', 'required|max_length[2]');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|max_length[10]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
    }
}

/* End of file Anggota.php */
