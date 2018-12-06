<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <h1><?php echo $titulo ?></h1>

  <section class="row placeholders">
    <div class="col-12 col-sm-12">
    <?php echo anchor('site/livros', 'Voltar', ['class' => 'btn btn-secondary']) ?>
    <table class="table table-striped m-topo">
      <thead>
        <tr>
          <th>#</th>
          <th>Data de Cadastro</th>
          <th>Nome Livro</th>
          <th>Autor</th>
          <th>Preço</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        echo '
        <tr>
          <td>' . $info->id . '</td>
          <td>' . formatDateBR($info->data) . '</td>
          <td>' . $info->nome . '</td>
          <td>' . $info->autor . '</td>
          <td>' . formatPrice($info->preco) . '</td>
        </tr>';
        ?>
        <tr>
          <td colspan="5"><?php echo $info->resumo ?></td>
        </tr>
      </tbody>
    </table>
    </div>
  </section>
</main>