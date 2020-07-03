<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->id == NULL) {
			$this->session->set_flashdata('message', 'Silahkan Login terlebih dahulu.');
			redirect(base_url("panel-admin/login"));
		}
	}
}
