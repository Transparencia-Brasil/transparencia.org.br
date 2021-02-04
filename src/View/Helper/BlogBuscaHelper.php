<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class BlogBuscaHelper extends Helper
{
    public function exibirBusca()
    {
        return $this->_View->element('BlogBusca/busca',[]);
    }
}
?>