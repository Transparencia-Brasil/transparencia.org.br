<?php
/**
 * Teste do Behavior AjusteData
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author     Juan Basso <jrbasso@gmail.com>
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Test\TestCase\Model\Behavior;

use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * AjusteData Test Case
 */
class AjusteDataBehaviorTest extends TestCase
{

    public $fixtures = [
        "plugin.CakePtbr.noticias"
    ];

    /**
     * @var Table $Noticias
     */
    public $Noticias;


    /**
     * setup method
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Noticias = TableRegistry::get("CakePtbr.Noticias");
    }

    /**
     * tear down
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();

        $this->Noticias->removeBehavior("CakePtbr.AjusteData");
        unset($this->Noticias, $this->Noticias);
        TableRegistry::clear();
    }

    public function testDeteccaoAutomatica()
    {
        $this->Noticias->addBehavior("CakePtbr.AjusteData");
        $noticia = $this->__preparaNoticia();

        $this->assertEquals("datetime", $this->Noticias->schema()->columnType("publicado_em"));
        $this->assertEquals("2015-03-22", $noticia->get("autorizado_em"));
        $this->assertEquals("2015-03-25 16:42:05", $noticia->get("publicado_em"));
    }


    /**
     * testCampoEmArray
     *
     * @retun  void
     * @access public
     */
    public function testCampoEmArray()
    {
        $this->Noticias->addBehavior("CakePtbr.AjusteData", ["autorizado_em"]);
        $noticia = $this->__preparaNoticia(false, "22/03/15");

        $this->assertEquals("2015-03-22", $noticia->get("autorizado_em"));
    }


    /**
     * testCamposEmArray
     *
     * @retun  void
     * @access public
     */
    public function testCamposEmArray()
    {
        $this->Noticias->addBehavior("CakePtbr.AjusteData", ["autorizado_em", "publicado_em"]);
        $noticia = $this->__preparaNoticia("25/03/15 16:42:05");

        $this->assertEquals("2015-03-22", $noticia->get("autorizado_em"));
        $this->assertEquals("2015-03-25 16:42:05", $noticia->get("publicado_em"));
    }


    /**
     *
     * @param bool $publicadoEm Valor para colocar no publicado_em
     * @param bool $autorizadoEm Valor para colocar no autorizado_em
     * @return \Cake\Datasource\EntityInterface|mixed
     */
    private function __preparaNoticia($publicadoEm = false, $autorizadoEm = false)
    {
        $noticia = $this->Noticias->newEntity(
            [
            'titulo' => 'Exemplo 1',
            'conteudo' => 'Exemplo exemplo',
            'autor_id' => 2,
            'publicado_em' => '2011-04-21 16:42:05',
            'autorizado_em' => '2011-04-21',
            ]
        );
        $noticia->set("autorizado_em", $autorizadoEm ?: "22/03/2015");
        $noticia->set("publicado_em", $publicadoEm ?: "25/03/2015 16:42:05");
        $this->Noticias->save($noticia);
        $this->assertEmpty($noticia->errors());
        return $noticia;
    }
}
