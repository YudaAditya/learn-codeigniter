<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
    private $_table = "artikel":
    
    public $id_artikel;
    public $title;
    public $content;
    public $image ="default.jpg";
    public $tanggal;

    public function rules()
    {
        return[
            ['field'=> 'title',
            'label'=> 'Title',
            'rules'=> 'required'],
            
            ['field'=> 'content',
            'label'=> 'Content',
            'rules'=> 'required']
        ];
    }
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_artikel"=>$id])->row();
    }

    public function save()
    {
        $post= $this->input->post();
        $this->id_artikel=uniqid();
        $this->title=$post["title"];
        $this->content=$post["content"];
        $this->db->insert($this->_table,$this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_artikel=$post["id"];
        $this->title=$post["title"];
        $this->content=$post["content"];
        $this->db->update($this->_table,array("id_artikel"=>$id));
    }

}