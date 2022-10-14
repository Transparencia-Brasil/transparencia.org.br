<?php
  $this->assign('description', 'Entre em contato com a Transparência Brasil.');
?>
<!-- Título -->
<div class="container content-box">
  <div class="row">
    <div class="col-12">
    <h2 class="title-pages">Contato</h2>
    <hr/>
    <p>A Transparência Brasil não investiga ou encaminha denúncias de corrupção. Para essas questões, sugerimos entrar em contato com veículos de imprensa, com corregedorias e controladorias estaduais e municipais ou com o Ministério Público local.
    </p>
    <p><strong>Atendimento à imprensa:</strong <a href="mailto:imprensa@transparencia.org.br">imprensa@transparencia.org.br</a></p>
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
        <label for="novidades" class="form-check-label">
          <?=$this->Form->checkbox('optin_radar_tb', ['id' => 'optin_radar_tb', 'value' => 1, 'class' => 'form-check-input', 'checked'=>true]) ?>
          Autorizo receber a comunicação da Transparência Brasil relativa à curadoria de conteúdo e eventos.
        <label>
      </div>
        <div class="col-12 pd10">
          <label for="novidades" class="form-check-label">
            <?=$this->Form->checkbox('novidades', ['id' => 'novidades', 'value' => 1, 'class' => 'form-check-input' ]) ?>
            Aceito receber comunicações da Transparência Brasil.
          <label>
        </div>
        <div class="col-12 pd10">
          <button class="g-recaptcha btn-primary" 
            id="grecaptcha-btn" 
            data-formid="#frmContato"
            data-sitekey="<?=$grsiteKey?>" 
            data-callback='onSubmitRecaptcha' 
            data-actionOrigem = "contato"
            data-action='submit'>Enviar</button>
        </div>
      <?=$this->Form->end();?>

      </div>
      <script src="/scripts/contato.js"></script>
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
  <!-- FAQ -->
  <div class="accord faq tadepe-page">
      <div class="" id="accordion">
          <h4 class="text-center mgb30">DÚVIDAS FREQUENTES</h4>
<?php
    if (!empty($faq_contato)) {
    $count = 0;
        foreach ($faq_contato as $value) {
        $count++;
?>
          <div class="card ">
            <div>
              <strong><?=$value->pergunta?></strong>
            </div>
            <div class="pb-4">
              <?=$value->resposta?>
            </div>
          </div>
<?php
        }
     }
?>

      </div>
  </div>
  <!-- FAQ -->
