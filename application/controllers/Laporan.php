<?php

use Dompdf\Dompdf;


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Mod_laporan',
            'Mod_buku',
            'Mod_anggota'
        ));
    }


    public function anggota()
    {
        $data['anggota']      = $this->Mod_anggota->getAll();
        $data['judul'] = 'Laporan Anggota';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('laporan/anggota/anggota_data', $data);
    }

    public function cetak_anggota()
    {
        $data['anggota']      = $this->Mod_anggota->getAll();

        $this->load->view('laporan/anggota/laporan_anggota_cetak', $data);
    }

    public function cetak_anggota_pdf()
    {
        $data['anggota']      = $this->Mod_anggota->getAll();
        $this->load->library('dompdf_gen');
        $this->load->view('laporan/anggota/laporan_anggota_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas 
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_anggota.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
    }

    public function cetak_anggota_excel()
    {
        $data = array(
            'title' => 'Laporan Anggota',
            'anggota' => $this->Mod_anggota->getAll()
        );
        $this->load->view('laporan/anggota/laporan_anggota_excel', $data);
    }

    public function buku()
    {
        $data['buku']      = $this->Mod_buku->getAll();
        $data['judul'] = 'Laporan Buku';

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('laporan/buku/buku_data', $data);
    }

    public function cetak_buku()
    {
        $data['buku']      = $this->Mod_buku->getAll();
        $this->load->view('laporan/buku/laporan_buku_cetak', $data);
    }

    public function cetak_buku_pdf()
    {
        $data['buku']      = $this->Mod_buku->getAll();
        $this->load->library('dompdf_gen');
        $this->load->view('laporan/buku/laporan_buku_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas 
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
    }

    public function cetak_buku_excel()
    {
        $data = array(
            'title' => 'Laporan Buku',
            'buku' => $this->Mod_buku->getAll()
        );
        $this->load->view('laporan/buku/laporan_buku_excel', $data);
    }

    public function peminjaman()
    {
        $data['judul'] = "Laporan Peminjaman";

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('laporan/peminjaman/peminjaman_data', $data);
    }

    public function cari_pinjaman()
    {
        // $tanggal1 = '2018-04-11';
        // $tanggal2 = '2018-04-17';
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->Mod_laporan->searchPinjaman($tanggal1, $tanggal2);
        $this->load->view('laporan/peminjaman/peminjaman_search', $data);
    }

    public function cetak_peminjaman()
    {
        // $data['buku']      = $this->Mod_buku->getAll();
        $data['peminjaman'] = $this->Mod_laporan->getAllPeminjaman();
        $this->load->view('laporan/peminjaman/laporan_peminjaman_cetak', $data);
    }

    public function cetak_peminjaman_pdf()
    {
        $data['peminjaman'] = $this->Mod_laporan->getAllPeminjaman();
        $this->load->library('dompdf_gen');
        $this->load->view('laporan/peminjaman/laporan_peminjaman_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas 
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_peminjaman.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
    }

    public function cetak_peminjaman_excel()
    {
        $data = array(
            'title' => 'Laporan Peminjaman',
            'peminjaman' => $this->Mod_laporan->getAllPeminjaman()
        );
        $this->load->view('laporan/peminjaman/laporan_peminjaman_excel', $data);
    }

    public function pengembalian()
    {
        $data['judul'] = "Laporan Pengembalian";

        $this->load->view('includes/header_new', $data);
        $this->load->view('includes/menu', $data);
        $this->load->view('laporan/pengembalian/pengembalian_data', $data);
    }

    public function cari_pengembalian()
    {
        // $tanggal1 = '2018-04-19';
        // $tanggal2 = '2018-04-21';
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->Mod_laporan->searchPengembalian($tanggal1, $tanggal2);
        $this->load->view('laporan/pengembalian/pengembalian_search', $data);
    }

    public function cetak_pengembalian()
    {
        // $data['buku']      = $this->Mod_buku->getAll();
        $data['pengembalian'] = $this->Mod_laporan->getAllPengembalian();
        $this->load->view('laporan/pengembalian/laporan_pengembalian_cetak', $data);
    }

    public function cetak_pengembalian_pdf()
    {
        $data['pengembalian'] = $this->Mod_laporan->getAllPengembalian();
        $this->load->library('dompdf_gen');
        $this->load->view('laporan/pengembalian/laporan_pengembalian_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas 
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_pengembalian.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
    }

    public function cetak_pengembalian_excel()
    {
        $data = array(
            'title' => 'Laporan pengembalian',
            'pengembalian' => $this->Mod_laporan->getAllpengembalian()
        );
        $this->load->view('laporan/pengembalian/laporan_pengembalian_excel', $data);
    }
}

/* End of file Laporan */
