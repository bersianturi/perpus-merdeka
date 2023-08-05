<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skills extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('SkillsModel');
        cek_login();
    }

    public function index()
    {
        $data['judul'] = "Skills";
        $data['skills'] = $this->SkillsModel->getSkills();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/nav');
        $this->load->view('admin/skills', $data);
        $this->load->view('admin/template/footer');
    }

    public function skills_detail()
    {
        $data['judul'] = "Skills Detail";
        $data['skills'] = $this->SkillsModel->whereSkills(['id' => $this->uri->segment(3)]);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/nav');
        $this->load->view('admin/skills-detail', $data);
        $this->load->view('admin/template/footer');
    }

    public function add_skills()
    {
        $config['upload_path'] = FCPATH . 'assets/images/skills-thumbnail/';
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
            'name' => $this->input->post('name'),
            'image' => $thumbnail
        ];

        $this->SkillsModel->addSkills($data);
        redirect('skills');
    }

    public function edit_skills()
    {
        $data['skills'] = $this->SkillsModel->whereSkills(['id' => $this->uri->segment(3)])->result_array();

        $config['upload_path'] = FCPATH . 'assets/images/skills-thumbnail/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = 'thumbnail-' . date('d-m-y');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('edit-thumbnail')) {
            $old_thumbnail = $this->input->post('old_thumbnail', TRUE);

            $image = $this->upload->data();
            if ($old_thumbnail != 'default.jpg') {
                unlink('assets/images/skills-thumbnail/' . $this->input->post('old_thumbnail', TRUE));
            }
            $thumbnail = $image['file_name'];
        } else {
            $thumbnail = $this->input->post('old_thumbnail', TRUE);
        }

        $data = [
            'name' => $this->input->post('edit-name'),
            'image' => $thumbnail
        ];

        $this->SkillsModel->updateSkills($data, ['id' => $this->input->post('edit-id')]);
        redirect('skills');
    }

    public function delete_skills()
    {
        $id = $this->input->post('id');
        $thumbnail = $this->SkillsModel->getThumbnail($id)->row_array();

        if ($thumbnail != 'default.jpg') {
            unlink('assets/images/skills-thumbnail/' . $this->input->post('old_thumbnail', TRUE));
        }

        $this->SkillsModel->deleteSkills($id, 'skills');
        redirect('skills');
    }
}
