<?php
/**
 * Testes das regras de pluralização e singularização
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author        Juan Basso <jrbasso@gmail.com>
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace CakePtbr\Test\TestCase\Config;

use Cake\Utility\Inflector;
use Cake\TestSuite\TestCase;
require_once ROOT . DS . 'config' . DS . 'inflections.php';


/**
 * Inflections Test Case
 *
 */
class InflectionsTest extends TestCase
{
    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        Inflector::reset();
    }

    /**
     * testPlural
     *
     * @retun void
     * @access public
     */
    public function testPlural()
    {
        $this->assertEquals('Compras', Inflector::pluralize('Compra'));
        $this->assertEquals('Caminhoes', Inflector::pluralize('Caminhao'));
        $this->assertEquals('Motores', Inflector::pluralize('Motor'));
        $this->assertEquals('Bordeis', Inflector::pluralize('Bordel'));
        $this->assertEquals('palavra_chaves', Inflector::pluralize('palavra_chave'));
        $this->assertEquals('Abris', Inflector::pluralize('Abril'));
        $this->assertEquals('Azuis', Inflector::pluralize('Azul'));
        $this->assertEquals('Alcoois', Inflector::pluralize('Alcool'));
        $this->assertEquals('Perfis', Inflector::pluralize('Perfil'));
    }

    /**
     * testSingular
     *
     * @retun void
     * @access public
     */
    public function testSingular()
    {
        $this->assertEquals('Compra', Inflector::singularize('Compras'));
        $this->assertEquals('Caminhao', Inflector::singularize('Caminhoes'));
        $this->assertEquals('Motor', Inflector::singularize('Motores'));
        $this->assertEquals('Bordel', Inflector::singularize('Bordeis'));
        $this->assertEquals('palavras_chave', Inflector::singularize('palavras_chaves'));
        $this->assertEquals('Abril', Inflector::singularize('Abris'));
        $this->assertEquals('Azul', Inflector::singularize('Azuis'));
        
    }

    /**
     * testNaoPluralizaveis
     *
     * @retun void
     * @access public
     */
    public function testNaoPluralizaveis()
    {
        // singularize
        $this->assertEquals('Atlas', Inflector::singularize('Atlas'));
        $this->assertEquals('Lapis', Inflector::singularize('Lapis'));
        $this->assertEquals('Onibus', Inflector::singularize('Onibus'));
        $this->assertEquals('Pires', Inflector::singularize('Pires'));
        $this->assertEquals('Virus', Inflector::singularize('Virus'));
        $this->assertEquals('Torax', Inflector::singularize('Torax'));
        // pluralize
        $this->assertEquals('Atlas', Inflector::pluralize('Atlas'));
        $this->assertEquals('Lapis', Inflector::pluralize('Lapis'));
        $this->assertEquals('Onibus', Inflector::pluralize('Onibus'));
        $this->assertEquals('Pires', Inflector::pluralize('Pires'));
        $this->assertEquals('Virus', Inflector::pluralize('Virus'));
        $this->assertEquals('Torax', Inflector::pluralize('Torax'));
    }

    /**
     * testSlug
     *
     * @retun void
     * @access public
     */
    public function testSlug()
    {
        $this->assertEquals('Joao', Inflector::slug('João'));
        $this->assertEquals('Consequencia', Inflector::slug('Conseqüência'));
        $this->assertEquals('AOe', Inflector::slug('ÃÓ&'));
        $this->assertEquals('Linguica-nao-util-agua', Inflector::slug('Linguiça não útil água'));
        $this->assertEquals('au-au-Sandoval', Inflector::slug('äü au Sandoval'));
    }

    /**
     * teste plural irregular
     * @return void
     */
    public function testPluralIrregular()
    {
        // irregulares
        $this->assertEquals('Alemaes', Inflector::pluralize('Alemao'));
        $this->assertEquals('Maos', Inflector::pluralize('Mao'));
        $this->assertEquals('Caes', Inflector::pluralize('Cao'));
        $this->assertEquals('Repteis', Inflector::pluralize('Reptil'));
        $this->assertEquals('Sotaos', Inflector::pluralize('Sotao'));
        $this->assertEquals('Paises', Inflector::pluralize('Pais'));
        $this->assertEquals('Pais', Inflector::pluralize('Pai'));
        $this->assertEquals('Alcool', Inflector::singularize('Alcoois'));
    }

    public function testSingularIrregular()
    {
        // irregulares
        $this->assertEquals('Perfil', Inflector::singularize('Perfis'));
        $this->assertEquals('Alemao', Inflector::singularize('Alemaes'));
        $this->assertEquals('Mao', Inflector::singularize('Maos'));
        $this->assertEquals('Cao', Inflector::singularize('Caes'));
        $this->assertEquals('Reptil', Inflector::singularize('Repteis'));
        $this->assertEquals('Sotao', Inflector::singularize('Sotaos'));
        $this->assertEquals('Pais', Inflector::singularize('Paises'));
        $this->assertEquals('Pai', Inflector::singularize('Pais'));
        
    }

}
