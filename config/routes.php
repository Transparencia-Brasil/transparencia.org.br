<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Home', 'action' => 'index', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});


// atalho SEO para QuemSomos
Router::connect('/quem-somos', array('controller' => 'QuemSomos', 'action' => 'index'));

// atalho SEO para CodigoEtica
Router::connect('/codigo-de-etica', array('controller' => 'Associados', 'action' => 'codigoetica'));

Router::connect('/politica-de-privacidade', array('controller' => 'PoliticaDePrivacidade', 'action' => 'index'));
Router::connect('/apoie/doacoes', array('controller' => 'Doacoes', 'action' => 'index'));
Router::connect('/apoie/doacoes/confirmacao', array('controller' => 'Doacoes', 'action' => 'confirmacao'));
Router::connect('/apoie/doacoes/doar', array('controller' => 'Doacoes', 'action' => 'create'));
Router::connect('/apoie/associados', array('controller' => 'Associados', 'action' => 'index'));
Router::connect('/apoie/associados/associar-se', array('controller' => 'Associados', 'action' => 'create'));
Router::connect('/apoie/associados/confirmacao/:id', array('controller' => 'Associados', 'action' => 'exhibit'),['id' => '[0-9]+']);
Router::connect('/apoie/associados/editar/:id', array('controller' => 'Associados', 'action' => 'edit'),['id' => '[0-9]+']);
Router::connect('/associados/pagamento/sucesso', array('controller' => 'Associados', 'action' => 'pagamento_sucesso'));
Router::connect('/associados/pagamento/:id', array('controller' => 'Associados', 'action' => 'pagamento'),['id' => '[0-9]+']);
Router::connect('/apoie/associados/sucesso', array('controller' => 'Associados', 'action' => 'sucess'));
Router::connect('/associados/auth', array('controller' => 'Associados', 'action' => 'auth'));

Router::connect('/newsletter/validacao', array('controller' => 'Newsletter', 'action' => 'validateDoubleOptinEmail'));

Router::connect('/projetos/transparencia-algoritmica', array('controller' => 'Projetos', 'action' => 'transparenciaAlgoritmica'));
Router::connect('/projetos/tadepe/politica-de-privacidade', array('controller' => 'Projetos', 'action' => 'tdpPrivacy'));
Router::connect('/projetos/chatbotedu/politica-de-privacidade', array('controller' => 'Projetos', 'action' => 'eduPrivacy'));

// atalho SEO para Projetos
//Router::connect('/projetos/tadepe', array('controller' => 'Projetos', 'action' => 'tadepe'));

// atalho para o painel
Router::connect('/painel-ctl', array('controller' => 'Home', 'action' => 'index', 'prefix' => 'admin'));

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->connect('/:controller/', ['action' => 'index']);
    $routes->connect('/:controller/:action/*');
    //$routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
