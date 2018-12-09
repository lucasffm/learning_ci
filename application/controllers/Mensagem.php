<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mensagem extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('form');
  }



  public function index($offset = 0)
  {
    if ($this->input->post('valor')) {
      $valor = $this->input->post('valor');
      if ($valor > 10) {
        $this->session->set_flashdata('msg', 'Valor é maior que 10');
      } else {
        $this->session->set_flashdata('msg', 'Valor é menor que 10');
      }
      redirect('mensagem');
    } else {
      $data['titulo'] = "Exemplo de como utilizar flash data";
      $this->load->view('layout/topo', $data);
      $this->load->view('site/flashdata/form');
      $this->load->view('layout/rodape');
    }
  }
}
?>
