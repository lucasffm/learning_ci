<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aula18 extends CI_Controller
{

  public function index()
  {
    // $this->load->helper('string');
    // echo random_string('numeric', 6);

    // Carregar o helper security
    $this->load->helper('security');
    $senha = 'a101b65as';

    echo do_hash($senha);
    echo '<br />';
    echo do_hash($senha, 'md5');


  }
}
