<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index($offset = 0)
	{
		//search
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		//pagination
		$this->db->like('id_artikel', $data['keyword']);
		$this->db->or_like('judul', $data['keyword']);
		$this->db->or_like('artikel', $data['keyword']);
		$this->db->or_like('tag', $data['keyword']);
		$this->db->or_like('harga', $data['keyword']);
		$this->db->or_like('gambar', $data['keyword']);
		$this->db->or_like('tanggal', $data['keyword']);
		$this->db->from('artikel');

		$config['total_rows'] = $this->db->count_all_results();
		$config['base_url'] = base_url() . 'admin/artikel/index';
		$config['per_page'] = 5;



		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $this->uri->segment(4);


		$data['title'] = "Admin Page";
		$data['jumlah_artikel'] = $this->artikel_model->count('artikel');
		$data["artikels"] = $this->artikel_model->getAll("artikel", $config['per_page'], $data['offset']);
		$this->load->view('admin/admin', $data);
	}

	public function ambildata()
	{
		$dataArtikel = $this->artikel_model->getAll('artikel')->result();
		echo json_encode($dataArtikel);
	}
}
