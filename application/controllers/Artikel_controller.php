<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_controller extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct() 
    {
        parent::__construct();
        $this->load->model("artikel_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data["artikel"]=$this->artikel_model->getAll();
        $this->load->view("_contents/_home", $data);
    }

    public function add()
    {
        $artikel = $this->artikel_model;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
            $artikel->save();
            $this->session->set_flashdata('success','Berhasil disimpan');
        }

        $this->load->view();
    }
}
