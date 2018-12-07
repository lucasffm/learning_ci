<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <h1><?php echo $titulo ?></h1>

  <?php if (validation_errors()) { ?>
    <div class="row">
      <div class="col-12 col-sm-12">
          <?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
      </div>
    </div>
  <?php 
} ?>

  <section class="row placeholders">
    <div class="col-4 col-sm-4">
      <?php
      echo form_open('');
      // Input E-mail
      echo '<div class="form-group">';
      echo form_label('Nome:', 'id_nome');
      echo form_input([
        'type' => 'text',
        'class' => 'form-control',
        'name' => 'nome',
        'id' => 'id_nome',
        'autocomplete' => 'off'
      ]);
      echo '</div>';
      // Input
      echo '<div class="form-group">';
      echo form_label('E-mail:', 'id_email');
      echo form_input([
        'type' => 'text',
        'class' => 'form-control',
        'name' => 'email',
        'id' => 'id_email',
        'autocomplete' => 'off'
      ]);
      echo '</div>';
      // Input senha
      echo '<div class="form-group">';
      echo form_label('Senha:', 'id_senha');
      echo form_input([
        'type' => 'password',
        'class' => 'form-control',
        'name' => 'senha',
        'id' => 'id_senha',
        'autocomplete' => 'off'
      ]);
      echo '</div>';
      echo '<div class="form-group">';
      // Input senha
      echo form_label('Repita Senha:', 'id_confirm_senha');
      echo form_input([
        'type' => 'password',
        'class' => 'form-control',
        'name' => 'confirm_senha',
        'id' => 'id_confirm_senha',
        'autocomplete' => 'off'
      ]);
      echo '</div>';


      echo form_submit('submit', 'Cadastrar', ['class' => 'btn btn-outline-success btn-block']);
      echo form_close();
      ?>
      </div>      
    </div>
  </section>
</main>