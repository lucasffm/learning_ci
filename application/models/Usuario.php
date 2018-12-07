<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Model
{
  public function doInsert($dados = null)
  {
    if (is_array($dados)) {
      $this->db->insert('usuarios', $dados);
    }
  }
}

?>