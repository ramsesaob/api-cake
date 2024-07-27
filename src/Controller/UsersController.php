<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
   public function initialize()
{
    parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Auth', [
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'username', 'password' => 'password']
            ]
        ],
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login'
        ],
        'unauthorizedRedirect' => $this->referer()
    ]);

    // Permitir la acción de login sin autenticación
    $this->Auth->allow(['login']);
}


 


  public function login1()
{
    if ($this->request->is('post')) {
        $usuario = $this->request->getData('username');
        $contrasenia = $this->request->getData('password');

        // Agregar registros de depuración
        $this->log('Datos recibidos: ' . json_encode($this->request->getData()), 'debug');

        $user = $this->Auth->identify();
        
        // Verificar si las credenciales son válidas
        if (!$user) {
            // Credenciales inválidas
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['message' => 'Invalid credentials']));
            $this->response = $this->response->withStatus(401); // Unauthorized
        } else {
            // Credenciales válidas
            $this->Auth->setUser($user);

            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['message' => 'Login successful', 'user' => $user]));
            $this->response = $this->response->withStatus(200); // OK
        }
    } else {
        // Método de solicitud incorrecto
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['error' => 'Método de solicitud incorrecto']));
        return $this->response;
    }

    return $this->response;
}

public function login()
{
    if ($this->request->is('post')) {
        $usuario = $this->request->getData('username');
        $contrasenia = $this->request->getData('password');

        // Agregar registros de depuración
        $this->log('Datos recibidos: ' . json_encode($this->request->getData()), 'debug');

        $user = $this->Auth->identify();
        
        // Verificar si las credenciales son válidas
        if (!$user) {
            // Credenciales inválidas
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['message' => 'Invalid credentials']));
            $this->response = $this->response->withStatus(401); // Unauthorized
        } else {
            // Verificar el estado del usuario
            if ($user['status'] != 1) {
                // Usuario inactivo
                $this->response = $this->response->withType('application/json')
                    ->withStringBody(json_encode(['message' => 'Inactive user']));
                $this->response = $this->response->withStatus(401); // Unauthorized
            } else {
                // Credenciales válidas y usuario activo
                $this->Auth->setUser($user);

                $this->response = $this->response->withType('application/json')
                    ->withStringBody(json_encode(['message' => 'Login successful', 'user' => $user]));
                $this->response = $this->response->withStatus(200); // OK
            }
        }
    } else {
        // Método de solicitud incorrecto
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['error' => 'Método de solicitud incorrecto']));
        return $this->response;
    }

    return $this->response;
}


}
