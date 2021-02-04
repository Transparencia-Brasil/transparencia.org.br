            <div class="pg pg-blog-resultados">
                <div class="title">
                    <h3>Blog - Resultado</h3>
                    <p>Resultados da pesquisa: 
                    <?php
                        if($posts != null) { 
                            echo strlen($termo) == 0 ? "posts no ano de " . $ano : $termo;
                        } ?>
                    </p>
                </div>
                <div class="bx-blog">
                    <?php 
                    if($buscaVazia)
                        echo "<p>Busca vazia!</p>";
                    else if($posts == null || $posts->count() == 0){
                        $msg = strlen($termo) > 0 ? "<p>Nenhum post encontrado com o termo " . $termo . ".</p>" : "Nenhum post para o ano de " . $ano;
                        echo $msg;
                    }
                    else{
                        echo "<script>registrarEvento('busca_blog', 'clique', '" . $termo . "')</script>";
                        foreach($posts as $post):
                    ?>
                        <div class="bx-post">
                            <div class="bx-post-header">
                                <span class="date"><?=$post->Publicacao->nice('America/Sao_Paulo', 'pt-BR') ?></span>
                            </div>
                            <div class="bx-post-content  char-limit-2">
                                <h3><?=$post->Titulo?></h3>
                                <p><?=$post->Resumo?></p>
                                <div class="bx-btn">
                                    <a class="btn" href="<?=$this->Url->build(['controller' => 'Blog', 'action' => 'post', $post->Slug])?>">Ver post completo</a>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    } 
                    ?>
                    <a class="btn voltar" href="<?=$this->Url->build(["controller" => "Blog", "action" => "index"])?>" style="float:right">Voltar</a>
                </div>
            </div>