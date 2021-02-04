			<div class="pg pg-midias">
                <div class="title">
                    <h3>Mídias</h3>
                    <p>Baixe os Podcasts e Videocasts da TB!</p>
                </div>
                <div class="bx-midias">
                    <h4>Videocast</h4>
                    <ul>
                        <?php 
                        if($videocast->count() == 0)
                            echo "<p>Nenhum videocast disponível no momento!</p>";
                        foreach($videocast as $vcast): ?>
                            <li><a href="<?=BASE_URL?>downloads/midias/<?=$vcast->Arquivo?>" onclick="registrarEvento('videocast', 'clique', '<?=$vcast->Titulo?>')" target="_blank"><strong><?=$vcast->Titulo?></strong> Clique para baixar.<img src="img/ico-download.png" /></a></li>
                        <?php endforeach; ?>
                    </ul>                    
                </div>
                <div class="bx-midias">
                    <h4>Podcast</h4>
                    <ul>
                        <?php 
                        if($podcast->count() == 0)
                            echo "<p>Nenhum podcast disponível no momento!</p>";
                        foreach($podcast as $pcast): ?>
                            <li><a href="<?=BASE_URL?>downloads/midias/<?=$pcast->Arquivo?>" target="_blank" onclick="registrarEvento('podcast', 'clique', '<?=$pcast->Titulo?>')"><strong><?=$pcast->Titulo?></strong> Clique para baixar.<img src="img/ico-download.png" /></a></li>
                        <?php endforeach; ?>
                    </ul>                    
                </div>
            </div>