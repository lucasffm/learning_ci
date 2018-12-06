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

}
