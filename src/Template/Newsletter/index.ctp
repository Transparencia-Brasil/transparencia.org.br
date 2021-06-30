<?php
  $this->assign('description', 'Assine nossa newsletter mensal para acompanhar o trabalho da Transparência Brasil.');
?>
<!-- Título -->
<div class="container content-box">
  <div class="row">
    <div class="col-12">
    <h2 class="title-pages">Newsletter Transparência Brasil</h2>
    <hr/>
    <p>Assine nossa newsletter mensal para acompanhar o trabalho da Transparência Brasil e outras questões relevantes sobre transparência, controle social e integridade.
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
        <label for="novidades" class="form-check-label">
          <?=$this->Form->checkbox('optin_radar_tb', ['id' => 'novidades', 'value' => 1, 'class' => 'form-check-input', 'checked'=>true]) ?>
          Autorizo receber a comunicação da Transparência Brasil relativa à curadoria de conteúdo e eventos.
        <label>
      </div>

      <div class="col-12 pd10">
        <label for="novidades" class="form-check-label">
          <?=$this->Form->checkbox('optin_newsletter', ['id' => 'novidades', 'value' => 1, 'class' => 'form-check-input', 'checked'=>true]) ?>
          Autorizo receber as comunicações da Transparência Brasil relativas às suas atividades e projetos.
        <label>
      </div>
      <div class="col-12 pd10">
        <label for="imprensa" id="check_imprensa" class="form-check-label">
          <?=$this->Form->checkbox('optin_press', ['id' => 'imprensa', 'value' => 1, 'class' => 'form-check-input' ]) ?>
          Sou jornalista.
        <label>
      </div>
      <div class="col-12 pd10 press">
        <p>Por favor, preencha os campos abaixo para receber os comunicados direcionados à imprensa:</p>
      </div>
      <div class="col-12 pd10 press">
        <label for="veiculo">Veículo</label>
        <?=$this->Form->input('Veiculo', ['id' => 'veiculo', 'value' => $contato->Veiculo, 'label'=>false, 'class' => ' form-control col-md-6 col-sm-8', 'for' => 'inlineFormInput']) ?>
      </div>
      <div class="col-md-1 pdl0 press">
        <div class="pd10">
          <label class="label-input" for="inlineFormCustomSelect">UF</label>
          <?=$this->Form->select('UF', $estados, ['id' => 'uf','empty' => 'UF','value' => $contato->UF, 'class' => 'custom-select full-w form-control col-12', 'for' => 'inlineFormInput']) ?>
        </div>
        <div class="pd10">
          <label for="DDD">(DDD)</label>
          <?=$this->Form->input('DDD', ['id' => 'DDD', 'value' => $contato->DDD, 'label'=>false, 'class'=>'form-control col-12 ddd', 'maxlength'=>'2', 'for' => 'inlineFormInput']) ?>
        </div>
      </div>
      <div class="col-md-5 pl-0 mt-auto press">
        <div class="col-12 pd10 ml-md-3">
          <?=$this->Form->input('Cidade', ['id' => 'cidade', 'value' => $contato->Cidade, 'class' => 'form-control col-12', 'for' => 'inlineFormInput']) ?>
        </div>
        <div class="col-12 pd10 ml-md-3">
          <label for="Telefone">Telefone</label>
          <?=$this->Form->input('Telefone', ['id' => 'Telefone', 'value' => $contato->Telefone, 'label'=>false, 'class'=>'form-control col-12 tel', 'for' => 'inlineFormInput']) ?>
        </div>
      </div>
      <div class="col-12 pd10">
        <input type="hidden" name="origem" value="pagina-newsletter">
        <button type="submit" class="btn-primary ">Enviar</button>
      </div>
    <?=$this->Form->end();?>
  </div>
  <!-- Form -->
</div>
<script src="/scripts/contato.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      <?php
          if(strlen($mensagem) > 0)
              echo "abrirModal('','".$mensagem . "');";
      ?>
    });
    $("#imprensa").on('click',function(ev) {
    //Se está checado faz aparecer os campos, caso contrário esconda os campos
    console.log($(ev).is(":checked"));
    if ($(this).is(":checked")) {
        $('.press').css("display", "block");
    } else {
        $('.press').css("display", "none");
    }
  });
</script>