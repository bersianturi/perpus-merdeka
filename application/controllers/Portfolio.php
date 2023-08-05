<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('PortfolioModel');
        cek_login();
    }

    public function index()
    {
        $data['judul'] = "Portfolio";
        $data['portfolio'] = $this->PortfolioModel->getPortfolio();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/nav');
        $this->load->view('admin/portfolio', $data);
        $this->load->view('admin/template/footer');
    }

    public function portfolio_detail()
    {
        $data['judul'] = "Portfolio Detail";
        $data['portfolio'] = $this->PortfolioModel->wherePortfolio(['id' => $this->uri->segment(3)]);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/nav');
        $this->load->view('admin/portfolio-detail', $data);
        $this->load->view('admin/template/footer');
    }

    public function add_portfolio()
    {
        $config['upload_path'] = FCPATH . 'assets/images/portfolio-thumbnail/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = 'thumbnail-' . date('d-m-y');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('thumbnail')) {
            $image = $this->upload->data();
            $thumbnail = $image['file_name'];
        } else {
            $thumbnail = 'default.jpg';
        }

        $data = [
            'title' => ucwords($this->input->post('title')),
            'description' => $this->input->post('description'),
            'tools' => $this->input->post('tools'),
            'link' => $this->input->post('link'),
            'thumbnail' => $thumbnail
        ];

        $this->PortfolioModel->addPortfolio($data);
        redirect('portfolio');
    }

    public function edit_portfolio()
    {
        $data['portfolio'] = $this->PortfolioModel->wherePortfolio(['id' => $this->uri->segment(3)])->result_array();

        $config['upload_path'] = FCPATH . 'assets/images/portfolio-thumbnail/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = 'thumbnail-' . date('d-m-y');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('edit-thumbnail')) {
            $old_thumbnail = $this->input->post('old_thumbnail', TRUE);

            $image = $this->upload->data();
            if ($old_thumbnail != 'default.jpg') {
                unlink('assets/images/portfolio-thumbnail/' . $this->input->post('old_thumbnail', TRUE));
            }
            $thumbnail = $image['file_name'];
        } else {
            $thumbnail = $this->input->post('old_thumbnail', TRUE);
        }

        $data = [
            'title' => ucwords($this->input->post('edit-title')),
            'description' => $this->input->post('edit-description'),
            'tools' => $this->input->post('edit-tools'),
            'link' => $this->input->post('edit-link'),
            'thumbnail' => $thumbnail
        ];

        $this->PortfolioModel->updatePortfolio($data, ['id' => $this->input->post('edit-id')]);
        redirect('portfolio');
    }

    public function delete_portfolio()
    {
        $id = $this->input->post('id');
        $thumbnail = $this->PortfolioModel->getThumbnail($id)->row_array();

        if ($thumbnail != 'default.jpg') {
            unlink('assets/images/portfolio-thumbnail/' . $this->input->post('old_thumbnail', TRUE));
        }

        $this->PortfolioModel->deletePortfolio($id, 'portfolio');
        redirect('portfolio');
    }
}
