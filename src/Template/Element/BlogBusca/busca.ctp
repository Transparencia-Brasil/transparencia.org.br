                    <?php
                        echo $this->Form->create(null, ["controller" => "Blog", "action" => "busca", "id"=>"frmBusca"]);
                        echo $this->Form->hidden('ano', ["id" => "ano"]);
                    ?>
                    <div class="col fRight">
                        <div class="bx-intro">
                            <div class="bx-busca">                                                                
                                <div class="fm-campo">
                                    <label>Faça sua busca</label>
                                    <input type="text" class="busca" id="busca" name="busca" />
                                    <div class="bx-btn">
                                        <a class="btn" onclick="$('#frmBusca').submit();">Pesquisar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bx-arquivos">
                            <p><strong>Arquivos do blog</strong></p>
                            <ul class="ano">
                                <?php 
                                foreach($anos as $ano):
                                ?>
                                <li>
                                    <span class="arrow" onclick="buscaPorAno($(this).text());"><?=$ano->ano?></span> 
                                    <ul class="mes">
                                        <li>
                                            Janeiro
                                            <ul class="postagem">
                                                <li>Teste</li>
                                                <li>Teste2</li>
                                                <li>Teste3</li>
                                            </ul>
                                        </li>
                                        <li>Fevereiro</li>
                                        <li>Março</li>
                                        <li>Abril
                                            <ul class="postagem">
                                                <li>Teste</li>
                                                <li>Teste2</li>
                                                <li>Teste3</li>
                                                <li>Teste4</li>
                                                <li>Teste5</li>
                                            </ul></li>
                                        <li>Maio</li>
                                        <li>Junho</li>
                                    </ul>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?=$this->Form->end();?>