<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Url extends CI_Controller
{
    public function oops()
    {
        $this->load->view(404);
    }
}