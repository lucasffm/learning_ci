<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

	public function __construct()
	{
		// Instancio o construtor do CI_Controller para acessar seus atributos e métodos
		parent::__construct();
		// Carregar o model livros
		$this->load->model('livros');
		// Carregar o helper funcao
		$this->load->helper('funcoes');
	}

	public function index()
	{
		$data['titulo'] = 'Aula usando Boostrap 4';
		$this->load->view('layout/topo', $data);
		$this->load->view('site/conteudo');
		$this->load->view('layout/rodape');
	}

	public function livros()
	{
		$data['titulo'] = 'Lista de Livros';
		// Consultar o db pelo model
		$data['livros'] = $this->livros->listarLivros();

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/index');
		$this->load->view('layout/rodape');
	}

	public function info($id = null)
	{
		if ($id == null) echo ('Você precisar informar uma ID válida');
		else {
			$query = $this->livros->getById($id);
			if ($query) {
				$data['titulo'] = $query->nome;
				$data['info'] = $query;

				$this->load->view('layout/topo', $data);
				$this->load->view('livros/info');
				$this->load->view('layout/rodape');
			} else {
				echo ('Registro não encontrado!!');
			}

		}
	}

	public function formulario()
	{
		$data['titulo'] = 'Formulário de livros';

		// carregar o helper form
		$this->load->helper('form');

		$this->load->view('layout/topo', $data);
		$this->load->view('formulario/index');
		$this->load->view('layout/rodape');
	}

	public function enviar()
	{
		if ($this->input->post()) {
			echo '<pre>';
			print_r($this->input->post());
		}
	}

	public function validar()
	{
		$data['titulo'] = 'Biblioteca Form_Validation';
		$this->load->helper('form');

		// Carregamento do form validation
		$this->load->library('form_validation');

		// Required e min_length
		$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]', ['required' => 'O campo nome é obrigatório', 'min_length' => 'O Nome deve conter mais de 3 caracteres']);
		// Email validation
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email', ['required' => 'O campo e-mail é obrigatório', 'valid_email' => 'Você deve passar um e-mail válido']);
		// Codigo validation -> Only numbers
		$this->form_validation->set_rules('codigo', 'Código', 'numeric', ['numeric' => 'Utilize apenas números para o campo Código']);
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
			echo 'Formulário validado com sucesso';
		} else {
			$this->load->view('layout/topo', $data);
			$this->load->view('formulario/valida');
			$this->load->view('layout/rodape');
		}

	}

	public function session()
	{
		// $_SESSION['chave'] = 'Curso de CodeIgniter';
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";

		// $this->session->set_userdata('aula21', 'Na aula 21 trabalhando com sessão');
		// unset($_SESSION['chave']);
		// $this->session->unset_userdata('aula21');

		// $dadosSession = [
		// 	'nome' => 'Lucas de Freitas',
		// 	'email' => 'lucasffm@gmail.com',
		// 	'logado' => true
		// ];
		// $this->session->set_userdata($dadosSession);
		// $this->session->sess_destroy();

		$this->session->set_flashdata('msg', 'Cadastro realizado com sucesso');


	}

	public function mostrar()
	{
		echo "<pre>";
		print_r($this->session);
		echo "</pre>";
	}

	public function flash()
	{
		echo "<pre>";
		print_r($this->session->flashdata('msg'));
		echo "</pre>";
	}

}
