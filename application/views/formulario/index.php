<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <h1><?php echo $titulo ?></h1>

  <section class="row placeholders">
    <div class="col-4 col-sm-4">
      <?php
      echo form_open('site/enviar');
      echo '<div class="form-group">';
        // Input E-mail
      echo form_label('E-mail:', 'id_email');
      echo form_input([
        'type' => 'text',
        'class' => 'form-control',
        'name' => 'email',
        'id' => 'id_email',
        'autocomplete' => 'off'
      ]);
      echo '</div>';
      echo '<div class="form-group">';
        // Input senha
      echo form_label('Senha:', 'id_senha');
      echo form_input([
        'type' => 'password',
        'class' => 'form-control',
        'name' => 'senha',
        'id' => 'id_senha',
        'autocomplete' => 'off'
      ]);
      echo '</div>';

      echo form_submit('submit', 'Logar', ['class' => 'btn btn-outline-success btn-block']);
      echo form_close();
      ?>
      </div>      
    </div>
  </section>
</main>