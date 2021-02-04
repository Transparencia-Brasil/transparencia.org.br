<?php
  $this->assign('description', 'Espaço dedicado a comunicados da Transparência Brasil e a artigos, escritos por seus representantes ou por convidados da academia e de ONGs parceiras.');
?>
            <div class="pg pg-blog">
                <div class="title">
                    <h3>Blog</h3>
                    <p>Espaço dedicado a comunicados da Transparência Brasil e a artigos, escritos por seus representantes ou por convidados da academia e de ONGs parceiras.</p>
                </div>
                <div class="bx-blog">
                    <div class="col fLeft">
                        <?php 
                            if($posts->count() == 0)
                                echo "<p>Nenhum post publicado até o momento!</p>";
                            else{
                                foreach($posts as $post): ?>
                                <div class="bx-post">
                                    <div class="bx-post-content">
                                        <h2><?=$post->Titulo?></h2>
                                        <?php
                                        if(isset($post->ImagemResumo))
                                            echo "<img src='". BASE_URL . "img/blog/" .  $post->ImagemResumo . "' alt='" . $post->Titulo . "'  style='float:right;margin:10px;height:360px;width:500px;' />";
                                        ?>
                                        <p><?=$post->Resumo?></p>
                                        <div class="bx-btn">
                                            <a class="btn fRight" href="<?=$this->Url->build(['controller' => 'Blog', 'action' => 'post', $post->Slug])?>">Ver post completo</a>
                                        </div>
                                        <div >
                                            <p>Postado por: <a onclick="registrarEvento('autor', 'clique', '<?=$post->Autor?>')"><?=$post->Autor?></a><br/>
                                            <span class="date"><?=$post->Publicacao->nice('America/Sao_Paulo', 'pt-BR') ?></span>
                                            </p>                                            
                                        </div>
                                    </div>
                                    <!--<div class="bx-post-footer">
                                        <p>Postado por: <a onclick="registrarEvento('autor', 'clique', '<?=$post->Autor?>')"><?=$post->Autor?></a></p> | <a>Quantidade_Comentarios</a></p>
                                        <p>Marcadores: <a>Marcador1</a>,<a>Marcador2</a>,<a>Marcador3</a>,<a>Marcador4</a>,<a>Marcador5</a></p>
                                    </div>-->
                                </div>
                                <?php endforeach; 
                            } 
                        /*
                        <div class="nav-paginacao" style="display:none;">
                            <ul>
                                <li class="prev"><a>&lt;&lt;</a></li>
                                <li><a class="ativo">1</a></li>
                                <li><a>2</a></li>
                                <li><a>3</a></li>
                                <li><a>4</a></li>
                                <li><a>5</a></li>
                                <li><a>6</a></li>
                                <li class="next"><a>&gt;&gt;</a></li>
                            </ul>
                        </div> */ ?>
                    </div>
                    <?=$this->BlogBusca->exibirBusca(); ?>
                </div>
            </div>
            <script src="<?=BASE_URL. "/js/blog.js"?>"  type="text/javascript" ></script>
            <script src="<?=BASE_URL. "/js/jquery.jscroll.min.js"?>"  type="text/javascript" ></script>