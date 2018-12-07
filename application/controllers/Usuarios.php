<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('usuario');
    $this->load->helper('security');
    $this->load->helper('form');
    $this->load->library('form_validation');

  }

  // List all your items
  public function index($offset = 0)
  {
    $data['titulo'] = 'Listar Usuário';
    $this->load->view('layout/topo', $data);
    $this->load->view('usuarios/list');
    $this->load->view('layout/rodape');
  }

  // Add a new item
  public function add()
  {
    // Required e min_length
    $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]', ['required' => 'O campo nome é obrigatório', 'min_length' => 'O Nome deve conter mais de 3 caracteres']);
		// Email validation
    $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email', ['required' => 'O campo e-mail é obrigatório', 'valid_email' => 'Você deve passar um e-mail válido']);
		// Validar senha com trim, required e min e max length
    $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[10]', [
      'required' => 'Você deve passar uma senha',
      'min_length' => 'Sua senha deve ter no mínimo 6 letras ou números',
      'max_length' => 'Sua senha deve ter no máximo 10 letras ou números'
    ]);
		
		// Validar se a contra senha combina com a senha
    $this->form_validation->set_rules('confirm_senha', 'Confirmação de senha', 'trim|required|matches[senha]', [
      'required' => 'Você deve passar uma senha que combine com a passada anteriormente',
      'matches' => 'As senhas não combinam',
    ]);

    if ($this->form_validation->run() === true) {
      echo '<pre>';
      $dados['nome'] = $this->input->post('nome');
      $dados['email'] = $this->input->post('email');
      $dados['senha'] = do_hash($this->input->post('senha'), 'sha1');
      $dados['ativo'] = 1;
      $this->usuario->doInsert($dados);
      redirect('usuarios', 'refresh');
    } else {
      $data['titulo'] = 'Cadastrar Usuário';
      $this->load->view('layout/topo', $data);
      $this->load->view('usuarios/add');
      $this->load->view('layout/rodape');
    }
  }

  //Update one item
  public function update($id = null)
  {

  }

  //Delete one item
  public function delete($id = null)
  {

  }
}

?>