<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Banner;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class BannersController extends AppController
{
    public $PASTA_UPLOAD = WWW_ROOT . 'uploads/banners/';

    public function initialize()
    {
        parent::initialize();
        $this->layout = 'admin';
        $this->loadComponent('Flash');
        $this->loadComponent('UData');
        $this->loadComponent('UString');
    }

    public function index($id = null)
    {
        $banners = $this->Banners->find('all')->where(['Ativo' => true])->contain(['BannersTipo'])->order(['Banners.Ordem' => 'ASC', 'Banners.Criacao' => 'DESC']);
        $this->set('banners', $banners);
    }

    public function order()
    {
        if ($this->request->is(['post', 'put'])) {
            $ordem = $this->request->data['order'];
            if (!empty($ordem)) {
                $ordem_array = explode(',', $ordem);
                $count_ordem_array = count($ordem_array);
                if ($count_ordem_array > 0) {
                    for ($i=0;$count_ordem_array>$i;$i++) {
                        $bannertemp = new Banner();
                        $bannertemp->Codigo = (int) $ordem_array[$i];
                        $bannertemp->Ordem = $i;
                        $this->Banners->save($bannertemp);
                        $this->Flash->success('Ordem de Banners salva com sucesso!');
                    }
                }
            }
        } else {
            $this->Flash->error('Erro ao ordenar o banner!');
        }
        $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
    }

    public function edit($id = null)
    {
        $banner = isset($id) ? $this->Banners->find('all')->where(['Codigo' => $id])->first() : new Banner();
        $tipos = TableRegistry::get('BannersTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);
        $targets = TableRegistry::get('TargetsTipo')->find('list', ['keyField' => 'Codigo', 'valueField' => 'Nome']);

        $temErro = false;
        $retMensagem = "";

        if ($this->request->is(['post', 'put'])) {
            $this->Banners->patchEntity($banner, $this->request->data);

            $arquivo = $this->request->data['Banners']['Imagem'];
            $possuiArquivo = strlen($arquivo['name']) == 0 ? false : true;
            $boolArquivoOk = false;

            if ($possuiArquivo) {
                $nomeArquivo =  $this->UString->ValidarNomeArquivo($arquivo['name']);

                if ($arquivo['size'] >= 2097152) {
                    $retMensagem = 'Erro ao salvar. O Tamanho da Imagem é superior há 2MB. (' . $this->UString->BytesParaHumano($arquivo['size'])  . ')';
                    $temErro = true;
                } else {
                    $banner->Imagem = $nomeArquivo;
                    $boolArquivoOk = move_uploaded_file($arquivo['tmp_name'], $this->PASTA_UPLOAD .  $nomeArquivo);
                    $temErro = false;
                }
            } else {
                $banner->unsetProperty('Imagem');
            }
            
            if (!$temErro) {
                $banner->Inicio = $this->UData->ConverterMySQL($banner->Inicio);
                $banner->Termino = $this->UData->ConverterMySQL($banner->Termino);

                // se der erro ao mover o arquivo, retornar mensagem de erro
                if (!$boolArquivoOk && $possuiArquivo) {
                    $$retMensagem = 'Erro ao salvar o arquivo!';
                    $temErro = true;
                } else {
                    if ($banner->errors()) {
                        $retMensagem = 'Erro ao salvar banner. Verifique os campos obrigatórios.';
                        $temErro = true;
                    } else {
                        if ($this->Banners->save($banner)) {
                            $temErro = false;
                            $retMensagem = 'Banner salvo com sucesso!';
                        } else {
                            $temErro = true;
                            $retMensagem = 'Erro ao salvar banner!';
                        }
                    }
                }
            }
            
            if ($temErro) {
                $this->Flash->error($retMensagem);
            } else {
                $this->Flash->success($retMensagem);                
                $this->redirect(array('action' => 'index'));
            }
        }

        if (isset($id)) {
            $banner->Inicio = !is_null($banner->Inicio) ? $this->UData->ConverterDataBrasil($banner->Inicio) : null;
            $banner->Termino = !is_null($banner->Termino) ? $this->UData->ConverterDataBrasil($banner->Termino) : null;
        }

        $this->set('banner', $banner);
        $this->set('tipos', $tipos);
        $this->set('targets', $targets);
    }

    public function delete($id)
    {
        $banner = null;
        if (isset($id)) {
            $banner = $this->Banners->find()->where(['codigo' => $id, 'ativo' => true])->first();
            if ($banner != null) {
                $banner->Ativo = false;
                $this->Banners->save($banner);
                $this->Flash->success('Banner excluído com sucesso.');
            } else {
                $this->Flash->error('Banner não encontrado.');
            }
        } else {
            $this->Flash->error('Id inválido.');
        }

        $this->redirect(array('action' => 'index'));
    }
}
