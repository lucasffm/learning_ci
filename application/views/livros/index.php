<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <h1>Principal</h1>

  <section class="row placeholders">
    <div class="col-12 col-sm-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Data de Cadastro</th>
          <th>Nome Livro</th>
          <th>Autor</th>
          <th>Preço</th>
          <th>Acessar</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        setlocale(LC_MONETARY, "pt_BR", "ptb");
        foreach ($livros as $livro) {
          echo '<tr>
                <td>' . $livro->id . '</td>
                <td>' . formatDateBR($livro->data) . '</td>
                <td>' . $livro->nome . '</td>
                <td>' . $livro->autor . '</td>
                <td>' . formatPrice($livro->preco) . '</td>
                <td>' . anchor('/site/info/' . $livro->id, 'Info', ['title' => 'Mais Informações', 'class' => 'btn btn-info']) . '</td>
              </tr>';
        }
        ?>
      </tbody>
    </table>
    </div>
  </section>
</main>