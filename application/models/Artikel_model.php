<?php defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
	private $_table = "artikel";

	public $id_artikel;
	public $judul;
	public $artikel;
	public $gambar = "default.jpg";
	public $tanggal;

	public function rules()
	{
		return [
			[
				'field' => 'judul',
				'label' => 'judul',
				'rules' => 'required'
			],

			[
				'field' => 'artikel',
				'label' => 'artikel',
				'rules' => 'required'
			],

			[
				'field' => 'tag',
				'label' => 'tag',
				'rules' => 'required'
			]
		];
	}

	public function getAll($table, $perpage, $offset, $keyword = null)
	{
		$this->db->order_by('tanggal', 'desc');

		if ($keyword) {
			$this->db->like('id_artikel', $keyword);
			$this->db->or_like('judul', $keyword);
			$this->db->or_like('artikel', $keyword);
			$this->db->or_like('tag', $keyword);
			$this->db->or_like('harga', $keyword);
			$this->db->or_like('gambar', $keyword);
			$this->db->or_like('tanggal', $keyword);
		}
		return $this->db->get($table, $perpage, $offset)->result_array();
		// return $this->db->get($table);
	}

	public function ambiL_data($table)
	{
		return $this->db->get($table)->result_array();
	}
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_artikel" => $id])->row();
	}

	public function save($table, $data)
	{
		// $post = $this->input->post();
		// $this->id_artikel = uniqid();
		// $this->judul = $post["judul"];
		// $this->artikel = $post["artikel"];
		// $this->harga = $post["harga"];
		// $this->tag = $post["tag"];
		// $this->tanggal = date('Y-m-d H:i:s');


		$this->db->insert($table, $data);
	}

	public function edit_data($data, $table)
	{
		return $this->db->get_where($table, $data);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function delete($id, $table)
	{
		return $this->db->delete($table, array("id_artikel" => $id));
	}

	public function count($table)
	{
		return $this->db->get($table)->num_rows();
	}


	public function sort_data($table, $keyword)
	{
		return $this->db->select('*')->from($table)->where('tag', $keyword)->get()->result_array();
	}
}
