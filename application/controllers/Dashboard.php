<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_anggota');
        $this->load->model('Mod_buku');
        $this->load->model('Mod_peminjaman');
    }

    function index()
    {
        $data['countanggota'] = $this->Mod_anggota->totalRows('anggota');
        $data['countbuku'] = $this->Mod_buku->totalRows('buku');
        $data['tmp'] = $this->Mod_peminjaman->getTmp()->result();
        $data['dipinjam'] = $this->Mod_peminjaman->jumlahDipinjam();
        $data['judul'] = 'Dashboard';


        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('dashboard/dashboard_data', $data);
    }
}
/* End of file Controllername.php */
