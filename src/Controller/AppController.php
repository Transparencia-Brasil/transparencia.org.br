<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', 
            [
                 'loginRedirect' => array('controller' => 'Home', 'action' => ''),
                 'logoutRedirect' => array('controller' => 'Login', 'action' => 'logout'),
                 'loginAction' => ['controller' => 'Login', 'action' => 'logar'],
                 'authError' => 'Acesso não permitido',
                 'authenticate' => [
                     'Form' => [
                         'fields' => ['username' => 'login', 'password' => 'senha']
                     ]
                 ]
             ]);
       
    }

    public function beforeFilter(Event $event) {
        // Auth will block all entries with admin prefix unless the user is authenticated
        if(isset($this->request->prefix) && ($this->request->prefix == 'admin')){
           
        }else{
            $this->Auth->allow();
            $this->layout = 'front';
        }
    }

 
}
