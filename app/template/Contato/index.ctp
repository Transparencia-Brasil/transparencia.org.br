<!-- Título -->
<div class="container content-box">
  <div class="row">
    <div class="col-12">
    <h2 class="title-pages">Contato</h2>
    <hr/>
    <p>A Transparência Brasil não investiga ou encaminha denúncias de corrupção. Para essas questões, sugerimos entrar em contato com veículos de imprensa, com corregedorias e controladorias estaduais e municipais ou com o Ministério Público local.
    </p>
  </div>
</div>
  <!-- Título -->

  <!-- Conteudo -->
<div class="container">
  <div class="row">
    <!-- Form   -->
      <?=$this->Form->create(null, ['action' => 'novoContato', "id" => "frmContato", "class" => "form-inline contact-form"]) ?>
        <input type="hidden" id="guid" name="guid" value="<?=$guid?>" />
        <div class="col-12 pd10">
          <?=$this->Form->input('nome', ['id' => 'nome', 'value' => $contato->Nome, 'class' => 'form-control col-md-6 col-sm-8', 'for' => 'inlineFormInput']) ?>
        </div>

        <div class="col-12 pd10">
          <?=$this->Form->input('email', ['id' => 'email', 'value' => $contato->Email, 'class' => ' form-control col-md-6 col-sm-8', 'for' => 'inlineFormInput']) ?>
        </div>

        <div class="col-12 pd10">
          <label class="label-input" for="inlineFormCustomSelect">Assunto</label><br>
            <div class="col-md-6 col-sm-8 no_pd">
              <?=$this->Form->select('codigoassunto', $assuntos,['id' => 'codigoassunto', 'value' => $contato->CodigoAssunto, 'class' => 'custom-select full-w',]) ?>
              </div>
        </div>
        <div class="col-12 pd10">
          <label class="label-input" for="exampleTextarea">Mensagem</label><br>
          <?=$this->Form->textarea('mensagem', ['id' => 'mensagem', 'value' => $contato->Mensagem, 'class' =>'form-control col-md-6 col-sm-8 full-w', 'rows'=> '5' ]) ?>
        </div>
        <div class="col-12 pd10">
          <button type="submit" class="btn-primary ">Enviar</button>
        </div>
      <?=$this->Form->end();?>

      </div>
      <!-- build:js /scripts/contato.js -->
      <script type="text/javascript" src="/scripts/contato.js"></script>
      <!-- endbuild -->
      <script type="text/javascript">
          $(document).ready(function(){
              <?php
                  if(strlen($mensagem) > 0)
                      echo "abrirModal('','".$mensagem . "');";
              ?>
          });
      </script>

  <!-- Form -->
</div>