<!-- 1 tela -->
<div id ='obra' class="container">
    <div class="row no-gutters npadtop">
      <div class="col-md-12 no-gutters">
      <!-- Início do conteúdo -->    
      <iframe src="/projetos-assets/maisdefensoria/index.html" id="my-iframe" style="width:100%; border:none; padding-top:60px; overflow-y:hidden;">    
      </iframe>
      <!-- fim do conteúdo -->
      </div>
    </div>
</div>
<!-- Parent window -->
<script>
// Get the iframe element
 var iframe = document.getElementById("my-iframe");
// Listen to the load event of the iframe
iframe.addEventListener("load", function() {

  // Get the content window
  var content = iframe.contentWindow;

  // Get the body element
  var body = content.document.body;

  // Apply overflow-y: auto to the body
  body.style.overflowY = 'hidden';
  
  // Resize the iframe based on the content height
  iframe.style.height = content.document.documentElement.scrollHeight + 'px'
});
</script>

<!-- Child window -->
<!-- Obra transparente -->
