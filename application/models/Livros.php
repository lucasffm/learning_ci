<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Livros extends CI_Model
{
  public function listarLivros()
  {
    // $this->db->where('id', 3);
    // $this->db->where('autor', 'Google');
    // $this->db->order_by('nome', 'desc');
    $query = $this->db->get('livros');
    return $query->result();
  }

  public function getById($id = null)
  {
    if ($id) {
      $this->db->select('livros.*, resumo.resumo');
      $this->db->from('livros');
      $this->db->join('resumo', 'livros.id = resumo.id_livro', 'left');
      $this->db->where('livros.id', $id);
      $this->db->limit(1);
      $query = $this->db->get();
      return $query->row();
    }
  }
}
