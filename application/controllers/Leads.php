<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("security");
		$this->load->library("session");
		$this->load->library("form_validation");
		$this->load->library('pagination');
		$this->load->model("lead");
	}
	
	public function index($offset=0) {
		$leads = $this->lead->get_leads($offset, 5);
		$count = $this->lead->count();
		$this->pagination($count,"index");
		$data["leads"] = $leads;
		$this->load->view("home", $data);
	}

	public function next($offset) {
		$leads = $this->lead->get_leads($offset, 5);
		$data["leads"] = $leads;
		$this->load->view("partials/lead", $data);
	}

	public function search() {
		$search_term = $this->security->xss_clean($this->input->post("search"));
		$result = $this->lead->search_leads($search_term);
		$this->pagination($result["count"],"search");
		$this->load->view("partials/search", $result);
	}

	/*DOCU This is the pagination function. Owner:Philip*/
	private function pagination($count, $base) {
		$config['total_rows'] = $count;
		$config['per_page'] = 5;
		$config['base_url'] = "/leads/" .$base;
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
	}
}
