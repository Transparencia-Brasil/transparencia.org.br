<?php
/**
 * Teste do Behavior AjusteFloat
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Test\TestCase\Model\Behavior;

use Cake\Database\Expression\Comparison;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakePtbr\Model;


/**
 * AjusteFloat Test Case
 *
 */
class AjusteFloatBehaviorTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     * @access public
     */
    public $fixtures = array(
        'plugin.cake_ptbr.produtos'
    );

    /**
     * Produto
     *
     * @var Table
     * @access public
     */
    public $Produtos = null;

    /**
     * startTest
     *
     * @retun void
     * @access public
     */
    public function setUp()
    {
        $this->Produtos = TableRegistry::get('CakePtbr.Produtos');
        $this->Produtos->addBehavior("CakePtbr.AjusteFloat");
    }


    /**
     * Tear down
     */
    public function tearDown()
    {
        parent::tearDown();
        TableRegistry::clear();
        unset($this->Produtos, $this->Produtos);
    }


    /**
     * testBeforeFind
     *
     * @return void
     * @access public
     */
    public function testBeforeFind()
    {
        $condicoes = [
            'nome' => '1.000,00',
            'valor' => '1.500,03'
        ];

        $consulta = $this->Produtos->find('all')->where(
            $condicoes
        );
        $consulta->all();


        $condicoesTratadas = [];
        $todosCampos = [];

        /**
         * @var Query $consulta
         */
        $consulta->clause("where")->traverse(function ($comparison) use (&$condicoesTratadas, &$todosCampos) {
            /**
             * @var Comparison $comparison
             */
            if (isset($comparison)) {
                if ($this->Produtos->schema()->columnType($comparison->getField()) === "float") {
                    $condicoesTratadas[$comparison->getField()] = $comparison->getValue();
                }
                $todosCampos[$comparison->getField()] = $comparison->getValue();
            }
        });


        $this->assertEquals("1.000,00", $todosCampos["nome"]);
        $this->assertEquals("1500.03", $condicoesTratadas["valor"]);
    }


    /**
     * testSave
     *
     * @retun void
     * @access public
     */
    public function testSave()
    {
        $data = [
            'nome' => 'Produto 4',
            'valor' => '5.000,00'
        ];
        $entidade = $this->Produtos->newEntity($data);
        $resultado = $this->Produtos->save($entidade);

        $this->assertInstanceOf('Cake\ORM\Entity', $resultado);
        $this->assertEquals('5000.00', $entidade->get("valor"));
        $this->assertEquals('5000.00', $resultado->get("valor"));
    }
}
