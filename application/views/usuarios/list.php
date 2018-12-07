<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <h1><?php echo $titulo ?></h1>

  <section class="row mb-5">
    <div class="col-12 col-sm-12 text-right">
      <?php echo anchor('usuarios/add', 'Registrar Usuário', ['class' => 'btn btn-success']) ?>
    </div>
  </section>

  <section class="row">
    <div class="col-12 col-sm-12">
      Lista usuarios
    </div>
  </section>
</main>