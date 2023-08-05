<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('PortfolioModel');
		$this->load->model('SkillsModel');
	}

	public function index()
	{
		$data['portfolio'] = $this->PortfolioModel->getPortfolio();
		$data['skills'] = $this->SkillsModel->getSkills();

		$this->load->view('home', $data);
	}
}
