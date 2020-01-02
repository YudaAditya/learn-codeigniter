<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
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
        $data["artikels"]=$this->artikel_model->getAll();
        $this->load->view("home", $data);
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

        $this->load->view("artikel/tambah_artikel");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('home'); 

        $artikel = $this->artikel_model;
        $validation = $this->form_validation;
        $validation = set_rules($artikel->rules());

        if ($validation->run()) {
            $artikel->update();
            $this->session->set_flashdata('success','berhasil disimpan');
        }
        $data["artikel"]=$artikel->getById($id);
        if (!$data["artikel"]) show_404();

        $this->load->view("edit_artikel");
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404(); 
        if ($this->artikel_model->delete($id)) {
            redirect(base_url('home'));
        }
    }
}
