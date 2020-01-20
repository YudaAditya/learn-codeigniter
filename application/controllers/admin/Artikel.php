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
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
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
		$config['per_page'] = 5;

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $this->uri->segment(4);




		$data['title'] = "Admin Page - Artikel";
		$data["artikels"] = $this->artikel_model->getAll("artikel", $config['per_page'], $data['offset'], $data['keyword']);


		$this->load->view('admin/artikel', $data);
	}

	public function bytag()
	{
		$data['title'] = "Admin Page -Artikel Sort by tag";

		//get tag
		$data['artikels'] = $this->artikel_model->ambil_data('artikel');
		$keyword = $this->input->post('sort');
		if ($keyword) {
			if ($keyword != 'Normal') {
				$data['artikels'] = $this->artikel_model->sort_data('artikel', $keyword);
			}
		}
		$data['offset'] = 0;
		$data['halaman'] = $this->pagination->create_links();

		$this->load->view('admin/artikel', $data);
	}

	public function add()
	{
		$artikels = $this->artikel_model;
		$validation = $this->form_validation;
		$validation->set_rules($artikels->rules());

		if ($validation->run()) {
			// post sesuai name
			$id_artikel = $this->id_artikel = uniqid();
			$judul = $this->input->post('judul');
			$tag = $this->input->post('tag');
			$artikel = $this->input->post('artikel');
			$gambar = $_FILES['gambar']['name'];
			$harga = $this->input->post('harga');
			$tanggal = date('Y-m-d H:i:s');

			if ($gambar == '') {
				$gambar = 'default.jpg';
			} else {
				$config['upload_path'] = './upload/artikel/';
				$config['allowed_types'] = 'jpg|gif|png';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "gagal upload";
					die();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_artikel' => $id_artikel,
				'judul' => $judul,
				'tag' => $tag,
				'artikel' => $artikel,
				'gambar' => $gambar,
				'harga' => $harga,
				'tanggal' => $tanggal
			);

			$artikels->save('artikel', $data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		redirect('admin/artikel/tambah_artikel');
	}

	// public function edit($id=null)
	public function edit($id)
	{
		$where = array('id_artikel' => $id);
		$data["artikel"] = $this->artikel_model->edit_data($where, 'artikel')->result();
		// if (!$data["artikel"]) show_404();
		$data['title'] = "Edit Artikel";

		$this->load->view('admin/content/edit_artikel', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$tag = $this->input->post('tag');
		$artikel = $this->input->post('artikel');
		$harga = $this->input->post('harga');
		$gambar = $_FILES['gambar']['name'];

		if (!$gambar) {
			$gambar = $this->artikel_model->edit_data($$id, 'artikel') - re;
		} else {
			$config['upload_path'] = './upload/artikel';
			$config['allowed_types'] = 'jpg|gif|png';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar')) {
				$foto_baru = $this->upload->data('file_name');
				print($foto_baru);
				$this->db->set('gambar', $foto_baru);
			} else {
				echo "gagal upload";
				die();
			}
		}

		$data = array(
			'judul' => $judul,
			'tag' => $tag,
			'artikel' => $artikel,
			'harga' => $harga,
			'gambar' => $gambar
		);
		$where = array(
			'id_artikel' => $id
		);



		$this->artikel_model->update_data($where, $data, 'artikel');
		redirect('admin/artikel');
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->artikel_model->delete($id, 'artikel')) {
			redirect('admin/artikel');
		}
	}

	public function tambah_artikel()
	{
		$data['title'] = "Tambah Artikel";
		$this->load->view('admin/content/tambah_artikel', $data);
	}
	public function edit_artikel()
	{
		$data['title'] = "Edit Artikel";
		$this->load->view('admin/content/edit_artikel', $data);
	}
}
