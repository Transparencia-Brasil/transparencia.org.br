<!-- Redirect browsers with JavaScript disabled to the origin page -->
<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
<div class="row fileupload-buttonbar">
    <div class="col-lg-7">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <input type="file" name="files[]" multiple>
        <!-- The global file processing state -->
        <span class="fileupload-process"></span>
    </div>
    <!-- The global progress state -->
    <div class="col-lg-5 fileupload-progress fade">
        <!-- The global progress bar -->
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
        <!-- The extended global progress state -->
        <div class="progress-extended">&nbsp;</div>
    </div>
</div>
<!-- The table listing the files available for upload/download -->
<table role="presentation" class="table table-striped">
<tbody class="files">
<?php  
    if (isset($arquivos) && count($arquivos) > 0) {
        foreach($arquivos as $value) {      
?>
    <tr>
        <td>
            <span class="preview">
            </span>
        </td>
        <td>
<?php  
            if (!empty($value->Arquivo)) {
?>
            <p class="name">
                <a href="<?=$file_path . $value->Arquivo?>" title="<?=$value->Arquivo?>" download="<?=$value->Arquivo?>"><?=$value->Arquivo?></a>
            </p>
<?php
            } 
?>
        </td>
<?php
    if (isset($show_select) && $show_select) {
?>
        <td>
            <?=$value->Tipo?>
        </td>
<?php
    }
?>
        <td>
            <a href="<?='../delete_file/?file='.$value->Arquivo."&id=".$value->Codigo?>" class="btn btn-danger">
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
            </a>
        </td>
    </tr>
<?php
        }
    }
?>
</tbody>
</table>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
<?php
    if (isset($show_select) && $show_select) {
?>
        <td>
            <p class="name">Tipo</p>
            <select name="arquivo_tipo">
                <option value="relatorio">Relatório</option>
                <option value="termo-de-doacao">Termo de Doação</option>
            </select>
        </td>
<?php
    }
?>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    <input type="hidden" name="arquivo_nome[]" value="{%=file.name%}">
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            {%=$('select[name=arquivo_tipo]').find(":selected").val()%}
            <input type="hidden" name="arquivo_tipo[]" value="{%=$('select[name=arquivo_tipo]').find(":selected").val()%}">
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
            {%
            var url = '/admin/'+$('#fileupload').attr('controller')+'/delete_file/';
            %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=url%}?file={%=file.name%}&id={%=$('input[name=Codigo]').val()%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<?php
$this->append('css');
?>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="/assets_admin/js/jQuery-File-Upload-9.20.0/css/jquery.fileupload.css">
<link rel="stylesheet" href="/assets_admin/js/jQuery-File-Upload-9.20.0/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="/assets_admin/js/jQuery-File-Upload-9.20.0/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="/assets_admin/js/jQuery-File-Upload-9.20.0/css/jquery.fileupload-ui-noscript.css"></noscript>
<?php
$this->end();
?>

<?php
$this->append('scripts');
?>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/assets_admin/js/jQuery-File-Upload-9.20.0/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/assets_admin/js/jQuery-File-Upload-9.20.0/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/assets_admin/js/jQuery-File-Upload-9.20.0/js/jquery.fileupload-process.js"></script>
<!-- The File Upload validation plugin -->
<script src="/assets_admin/js/jQuery-File-Upload-9.20.0/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="/assets_admin/js/jQuery-File-Upload-9.20.0/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="/assets_admin/js/jQuery-File-Upload-9.20.0/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="/assets_admin/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<?php
$this->end();
?>