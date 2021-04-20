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

	public function search_index($offset) {
		$search_term = $this->input->post("search");
		$result = $this->lead->search_leads($search_term,$offset,5);
		$this->load->view("partials/search", $result);
	}

	public function search($offset=0) {
		$search_term = $this->security->xss_clean($this->input->post("search"));
		$result = $this->lead->search_leads($search_term,$offset,5);
		$this->pagination($this->lead->search_count($search_term),"search");
		$this->load->view("partials/search", $result);
	}

	/*This function takes in the date and returns all records within the specified date. Owner:Philip */
	public function process_date() {
		$from = $this->security->xss_clean($this->input->post("from"));
		$to = $this->security->xss_clean($this->input->post("to"));
		$result = $this->lead->search_by_date($from,$to);
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
