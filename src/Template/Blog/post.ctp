			<div class="pg pg-blog">
                <div class="title">
                    <h3>Blog</h3>
                </div>
                <div class="bx-blog">
                    <div class="col fLeft">
                        <?php 
                            if($post == null)
                                echo "<p>Post não encontrado!</p>";
                            else{
                        ?>
                            <div class="bx-post interna-post">
                                <div class="bx-post-header">
                                    <span class="date"><?=$post->Publicacao->nice('America/Sao_Paulo', 'pt-BR') ?></span>
                                </div>
                                <div class="bx-post-content">
                                    <h2><?=$post->Titulo?></h2>
                                    <div class="share-post">
                                        <div class="fb-share-button" data-href="<?=$this->Url->build(
                                        ["controller" => "Blog", "action" => "post", $post->Slug])?>" data-layout="button"></div>
                                        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt">Tweetar</a>
                                    </div>
                                    <div class="post-html"><?=$post->HTML?></div>
                                </div>
                                <div class="bx-post-footer">
                                    <p>Postado por: <a><?=$post->Autor?></a> </p> <!--| <a>Quantidade_Comentarios</a></p>
                                    <p>Marcadores: <a>Marcador1</a>,<a>Marcador2</a>,<a>Marcador3</a>,<a>Marcador4</a>,<a>Marcador5</a></p>-->
                                </div>
                            </div>
                        <?php } ?>
                        <a class="btn fRight" href="<?=$this->Url->build(['controller' => 'Blog', 'action' => 'index'])?>">Voltar</a>
                    </div>
                    <?=$this->BlogBusca->exibirBusca(); ?>
                </div>
                
            </div>
