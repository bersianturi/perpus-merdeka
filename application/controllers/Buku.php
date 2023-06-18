<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_buku');
    }


    public function index()
    {
        $data['buku'] = $this->Mod_buku->getAll();
        $data['judul'] = 'Buku';

        if ($this->uri->segment(3) == "create-success") {
            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Disimpan!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('buku/buku_data', $data);
        } else if ($this->uri->segment(3) == "update-success") {
            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Diperbarui!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('buku/buku_data', $data);
        } else if ($this->uri->segment(3) == "delete-success") {
            $data['message'] = "<div class='alert alert-success'>
            <p class='m-1'><i class='mdi mdi-check'></i> Data Berhasil Dihapus!</p></div>";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('buku/buku_data', $data);
        } else {
            $data['message'] = "";

            $this->load->view('includes/header_new', $data);
            $this->load->view('includes/menu', $data);
            $this->load->view('buku/buku_data', $data);
        }
    }

    public function create()
    {
        $data['judul'] = 'Tambah Buku';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('buku/buku_create');
    }

    public function insert()
    {
        $data['judul'] = 'Tambah Buku';

        if (isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if ($this->form_validation->run() == true) {
                $kode_buku = $this->input->post('kode_buku');
                $cek = $this->Mod_buku->cekBuku($kode_buku);
                //cek nis yg sudah digunakan
                if ($cek->num_rows() > 0) {
                    $data['message'] = "<div class='alert alert-danger'>
                    <p><i class='mdi mdi-alert'></i>Kode Buku Sudah Digunakan!</p></div>";

                    $this->load->view('includes/header_new', $data);
                    $this->load->view('includes/menu', $data);
                    $this->load->view('buku/buku_create', $data);
                } else {
                    $judul = slug($this->input->post('judul'));
                    $config['upload_path']   = './assets/img/buku/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']         = '3000';
                    $config['max_width']     = '5000';
                    $config['max_height']    = '5000';
                    $config['file_name']     = $judul;

                    $this->upload->initialize($config);

                    //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')) {

                        $image = $this->upload->data();

                        $save  = array(
                            'kode_buku'   => $this->input->post('kode_buku'),
                            'judul'       => $this->input->post('judul'),
                            'pengarang'   => $this->input->post('pengarang'),
                            'klasifikasi' => $this->input->post('klasifikasi'),
                            'image'       => $image['file_name']
                        );
                        $this->Mod_buku->insertBuku("buku", $save);
                        redirect('buku/index/create-success');
                    }
                    //apabila tidak ada gambar yg diupload
                    else {
                        $data['message'] = "<div class='alert alert-danger'>
                        <p><i class='mdi mdi-alert'></i>Gambar Masih Kosong!</p></div>";

                        $this->load->view('includes/header_new', $data);
                        $this->load->view('includes/menu', $data);
                        $this->load->view('buku/buku_create', $data);
                    }
                }
            }
            //jika tidak mengkosongkan form
            else {
                $data['message'] = "";
                $data['judul'] = 'Tambah Buku';

                $this->load->view('includes/header_new', $data);
                $this->load->view('includes/menu', $data);
                $this->load->view('buku/buku_create', $data);
            }
        }
    }

    public function edit()
    {
        $kode_buku = $this->uri->segment(3);
        $data['edit']    = $this->Mod_buku->cekBuku($kode_buku)->row_array();
        $data['judul'] = 'Edit Buku';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('buku/buku_edit', $data);
    }

    public function update()
    {
        $data['judul'] = 'Edit Buku';

        if (isset($_POST['update'])) {

            //apabila ada gambar yg diupload
            if (!empty($_FILES['userfile']['name'])) {

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if ($this->form_validation->run() == true) {

                    $kode_buku = $this->input->post('kode_buku');

                    $judul = slug($this->input->post('judul'));
                    $config['upload_path']   = './assets/img/buku/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']         = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $judul;

                    $this->upload->initialize($config);

                    //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')) {

                        $image = $this->upload->data();

                        $save  = array(
                            'kode_buku'   => $this->input->post('kode_buku'),
                            'judul'       => $this->input->post('judul'),
                            'pengarang'   => $this->input->post('pengarang'),
                            'klasifikasi' => $this->input->post('klasifikasi'),
                            'image'       => $image['file_name']
                        );

                        $g = $this->Mod_buku->getGambar($kode_buku)->row_array();

                        //hapus gambar yg ada diserver
                        unlink('assets/img/buku/' . $g['image']);

                        $this->Mod_buku->updateBuku($kode_buku, $save);
                        redirect('buku/index/update-success');
                    }
                    //apabila tidak ada gambar yg diupload
                    else {
                        $data['message'] = "<div class='alert alert-danger'>
                        <p><i class='mdi mdi-alert'></i>Gambar Masih Kosong!</p></div>";

                        $this->load->view('includes/header_new', $data);
                        $this->load->view('includes/menu', $data);
                        $this->load->view('buku/buku_edit', $data);
                    }
                }
                //jika tidak mengkosongkan
                else {

                    $kode_buku = $this->input->post('kode_buku');
                    $data['edit']    = $this->Mod_buku->cekBuku($kode_buku)->row_array();
                    $data['message'] = "";

                    $this->load->view('includes/header_new', $data);
                    $this->load->view('includes/menu', $data);
                    $this->load->view('buku/buku_edit', $data);
                }
            }
            //jika tidak ada gambar yg diupload
            else {
                $this->_set_rules();

                //apabila user mengkosongkan form input
                if ($this->form_validation->run() == true) {

                    $kode_buku = $this->input->post('kode_buku');
                    $save  = array(
                        'kode_buku'   => $this->input->post('kode_buku'),
                        'judul'       => $this->input->post('judul'),
                        'pengarang'   => $this->input->post('pengarang'),
                        'klasifikasi' => $this->input->post('klasifikasi')
                    );

                    $this->Mod_buku->updateBuku($kode_buku, $save);
                    redirect('buku/index/update-success');
                }
                //jika tidak mengkosongkan
                else {
                    $kode_buku = $this->input->post('kode_buku');
                    $data['edit']    = $this->Mod_buku->cekBuku($kode_buku)->row_array();
                    $data['message'] = "";

                    $this->load->view('includes/header_new', $data);
                    $this->load->view('includes/menu', $data);
                    $this->load->view('buku/buku_edit', $data);
                }
            } //end empty $_FILES

        } // end $_POST['update']

    }

    public function delete()
    {
        // $nis  = $this->uri->segment(3);

        $kode_buku = $this->input->post('kode_buku');
        $g = $this->Mod_buku->getGambar($kode_buku)->row_array();

        //hapus gambar yg ada diserver
        unlink('assets/img/buku/' . $g['image']);

        $this->Mod_buku->deleteBuku($kode_buku, 'buku');
        redirect('buku/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required|max_length[5]');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required|max_length[100]');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|max_length[50]');
        $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|max_length[200]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
    }
}

/* End of file Buku.php */
