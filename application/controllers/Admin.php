<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('PortfolioModel');
        $this->load->model('SkillsModel');
    }

    public function login()
    {
        if ($this->session->userdata('admin')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
            $this->session->set_flashdata('invalid_form', 'is-invalid');
            $this->session->set_flashdata('warning-text', '<label class="text-danger">Password cannot be empty.</label>');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $password_input = $this->input->post('password', true);
        $password = md5("Cba321456_");


        if ($password == md5($password_input)) {
            $data = [
                'admin' => 'admin'
            ];

            $this->session->set_userdata($data);
            redirect('admin');
        } else {
            $this->session->set_flashdata('invalid_form', 'is-invalid');
            $this->session->set_flashdata('warning-text', '<label class="text-danger">Check again your password.</label>');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');

        redirect('home');
    }

    public function index()
    {
        cek_login();
        $data['judul'] = "Dashboard";
        $data['portfolio'] = $this->PortfolioModel->totalPortfolio();
        $data['skills'] = $this->SkillsModel->totalSkills();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/nav');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer');
    }
}
