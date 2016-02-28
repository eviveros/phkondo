<?php

/**
 *
 * pHKondo : pHKondo software for condominium property managers (http://phalkaline.eu)
 * Copyright (c) pHAlkaline . (http://phalkaline.eu)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @copyright     Copyright (c) pHAlkaline . (http://phalkaline.eu)
 * @link          http://phkondo.net pHKondo Project
 * @package       app.Controller
 * @since         pHKondo v 0.0.1
 * @license       http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 * 
 */
App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $theme = null;
    public $components = array(
        'DebugKit.Toolbar',
        'Paginator',
        'Session',
        'Flash',
        'Auth',
        'Cookie',
        'MaintenanceMode');
    public $phkRequestData = array();

    public function beforeFilter() {
        $this->Paginator->settings['paramType'] = 'querystring';
        if ($this->Session->read('User.language')) {
            Configure::write('Config.language', $this->Session->read('User.language'));
        }

        $this->theme = $this->getTheme();
        $this->Auth->authenticate = array(AuthComponent::ALL => array('userModel' => 'User', 'scope' => array("User.active" => 1)), 'Form');
        $this->Auth->loginRedirect = Router::url(array('plugin' => null, 'controller' => 'condos', 'action' => 'index'), true);
        $this->Auth->logoutRedirect = Router::url(array('plugin' => null, 'controller' => 'users', 'action' => 'login'), true);
        $this->Auth->authorize = array('Controller');
        $this->Auth->flash = array('element' => 'error', 'key' => null, 'params' => array());
        $this->Auth->allow('display', 'login', 'logout');
        if (Configure::read('Access.open') === true) {
            $this->Auth->allow();
        }
        $this->rememberMe();
        $this->setPhkRequestVars($this->request->query);
    }

    public function beforeRender() {
        $phkRequestData = $this->phkRequestData;
        $this->set(compact('phkRequestData'));
    }

    private function rememberMe() {
        // set cookie options
        $this->Cookie->httpOnly = true;

        if (!$this->Auth->loggedIn() && $this->Cookie->read('rememberMe')) {
            $cookie = $this->Cookie->read('rememberMe');
            $user = false;
            if (isset($cookie['username']) && isset($cookie['password'])) {
                $this->loadModel('User'); // If the User model is not loaded already
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.username' => $cookie['username'],
                        'User.password' => $cookie['password']
                    )
                        ));
            }

            if ($user && !$this->Auth->login($user['User'])) {
                Router::url(array('plugin' => null, 'controller' => 'condos', 'action' => 'index'), true); // destroy session & cookie
            }
        }
    }

    public function isAuthorized($user) {
        //debug($this->request->controller);
        if (isset($user['role'])) {

            switch ($user['role']) {
                case 'admin':
                    return true;
                    break;
                case 'store_admin':
                    return true;
                    break;
                case 'colaborator':
                    return true;
                    break;
            }
        }

        // Default deny
        return false;
    }

    public function setFilter($fields) {
        
        $this->set('keyword', '');
        /* if (isset($this->request->params['named']['keyword'])) {
          $keyword = $this->request->params['named']['keyword'];
          }
          if (isset($this->request->data['keyword'])) {
          $keyword = $this->request->data['keyword'];
          } */
        if (isset($this->request->query['keyword'])) {
            $keyword = $this->request->query['keyword'];
        }


        if (isset($keyword) && ($keyword == '' || $keyword == __('Search'))) {
            unset($keyword);
        }
        if (isset($keyword)) {
            $arrayConditions = array();
            foreach ($fields as $field) {
                $arrayConditions[$field . ' LIKE'] = "%" . $keyword . "%";
            }
            $this->Paginator->settings['conditions'] = Set::merge($this->Paginator->settings['conditions'], array
                        ("OR" => $arrayConditions
                    ));
            
            $this->set('keyword', $keyword);
        }
        
    }

    public function getPhkRequestVars($key = '') {
        if (isset($this->phkRequestData[$key])) {
            return $this->phkRequestData[$key];
        }
        return null;
    }

    public function setPhkRequestVars($values = '') {
        foreach ($values as $key => $value) {
            $this->phkRequestData[$key] = $value;
        }
    }

    private function getTheme() {
        return Configure::read('Theme.name');
    }

}
