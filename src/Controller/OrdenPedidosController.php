<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * OrdenPedidos Controller
 *
 * @property \App\Model\Table\OrdenPedidosTable $OrdenPedidos
 *
 * @method \App\Model\Entity\OrdenPedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdenPedidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
       
        $ordenPedidos = $this->paginate($this->OrdenPedidos);

        $this->set(compact('ordenPedidos'));
          $this->set('_serialize', ['ordenPedido']);
    }
   

    /**
     * View method
     *
     * @param string|null $id Orden Pedido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
        // En OrdenPedidosController.php

         // En OrdenPedidosController.php

public function view($id = null)
{
    try {
        $ordenPedido = $this->OrdenPedidos->get($id, [
            'contain' => [
                'OrdenItems' => ['Articulos'], // Incluir también los artículos relacionados
                'Users' => ['Sucursales']// Si también deseas incluir información del usuario asociado
            ],
        ]);

        $this->set([
            'ordenPedido' => $ordenPedido,
            '_serialize' => ['ordenPedido'] // Serialize ordenPedido como JSON
        ]);
    } catch (RecordNotFoundException $ex) {
        // Manejar excepción si no se encuentra el registro
        $this->response = $this->response->withStatus(404, 'Registro no encontrado');
        $message = ['error' => 'Registro no encontrado'];
        $this->set(compact('message'));
        $this->set('_serialize', 'message');
    }
}


       // En OrdenPedidosController.php
            public function view2()
            {
                $page = $this->request->getQuery('page');
                $limit = 10;
                $offset = ($page - 1) * $limit;

                $conn = ConnectionManager::get('default');
                $totalQuery = $conn->query("SELECT COUNT(*) as total
                                             FROM Orden_Pedidos a1");

                $totalResult = $totalQuery->fetch('assoc');
                $total = $totalResult['total'];
                $totalpages = ceil($totalResult['total'] / $limit);

                $query = $conn->query("SELECT *
                                       FROM Orden_Pedidos a1 
                                       LIMIT $limit OFFSET $offset");

                $articulos = $query->fetchAll('assoc');

                $this->set([
                    'articulos' => $articulos,
                    'total' => $total,
                    'page' => $page,
                    'limit' => $limit,
                    'totalpages' => $totalpages
                ]);

                $this->set('_serialize', ['articulos', 'total', 'page', 'limit', 'totalpages']);
            }

                


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  /**  public function add()
    {
        $ordenPedido = $this->OrdenPedidos->newEntity();
        if ($this->request->is('post')) {
            $ordenPedido = $this->OrdenPedidos->patchEntity($ordenPedido, $this->request->getData());
            if ($this->OrdenPedidos->save($ordenPedido)) {
                $this->Flash->success(__('The orden pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden pedido could not be saved. Please, try again.'));
        }
        $users = $this->OrdenPedidos->Users->find('list', ['limit' => 200]);
        $articulos = $this->OrdenPedidos->Articulos->find('list', ['limit' => 200]);
        $this->set(compact('ordenPedido', 'users', 'articulos'));
    }*/

     public function add2()
    {
        $this->request->allowMethod(['post']);

        $ordenPedido = $this->OrdenPedidos->newEmptyEntity();
        $data = $this->request->getData();

        // Asigna los datos principales del pedido
        $ordenPedido = $this->OrdenPedidos->patchEntity($ordenPedido, [
            'user_id' => $data['user_id'],
            'numero_ped' => $data['numero_ped'],
        ]);

        // Intenta guardar la orden de pedido
        if ($this->OrdenPedidos->save($ordenPedido)) {
            // Obtiene el ID del pedido guardado
            $ordenPedidoId = $ordenPedido->id;

            // Guarda los items relacionados
            foreach ($data['productos'] as $producto) {
                $ordenItem = $this->OrdenPedidos->OrdenItems->newEmptyEntity();
                $ordenItem = $this->OrdenPedidos->OrdenItems->patchEntity($ordenItem, [
                    'orden_pedido_id' => $ordenPedidoId,
                    'articulo_id' => $producto['articulo_id'],
                    'cantidad' => $producto['cantidad'],
                    'comentario' => $producto['comentario'],
                ]);
                $this->OrdenPedidos->OrdenItems->save($ordenItem);
                 // Respuesta JSON
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['message' => 'Orden de pedido creada correctamente']));
            return $this->response;
            }

          
        } else {
          // No se pudo guardar la orden de pedido
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['error' => 'La orden de pedido no pudo ser guardada']));
            return $this->response;
        }
    }

public function add()
{
    $ordenPedido = $this->OrdenPedidos->newEntity();
    
    if ($this->request->is('post')) {
        $data = $this->request->getData();
        
        // Verificar y asignar valor predeterminado para 'anulada'
        if (!isset($data['anulada'])) {
            $data['anulada'] = 1; // Asignar el valor predeterminado deseado
        }
       $validado = 0;

        // Patch entity con los datos recibidos
        $ordenPedido = $this->OrdenPedidos->patchEntity($ordenPedido, $data);

        // Intentar guardar la orden de pedido
        if ($this->OrdenPedidos->save($ordenPedido)) {
            $ordenPedidoId = $ordenPedido->id;

            // Guardar los artículos asociados si existen
            if (isset($data['productos']) && !empty($data['productos'])) {
                foreach ($data['productos'] as $producto) {
                    $item = $this->OrdenPedidos->OrdenItems->newEntity();
                    $item->orden_pedido_id = $ordenPedidoId;
                    $item->articulo_id = $producto['articulo_id'];
                    $item->cantidad = $producto['cantidad'];
                    $item->comentario = $producto['comentario'];
                    $item->validado = $validado;

                    // Guardar cada artículo asociado
                    if (!$this->OrdenPedidos->OrdenItems->save($item)) {
                        // Manejar errores si es necesario
                    }
                }
            }

            // Respuesta JSON si todo se guarda correctamente
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['message' => 'Orden de pedido creada correctamente']));
            return $this->response;
        } else {
            // Manejar errores si la orden de pedido principal no se guarda
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['error' => 'La orden de pedido no pudo ser guardada']));
            return $this->response;
        }
    } else {
        // Manejar solicitud incorrecta (no es un método POST)
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['error' => 'Método de solicitud incorrecto']));
        return $this->response;
    }
}


     public function numped()
        //http://192.168.0.198/ped2/articulos/general.json?page=1
                {
                    $page = $this->request->getQuery('page');
                    $limit = 20;
                    $offset = ($page - 1) * $limit;
                    $conditions = [];
                   $conn = ConnectionManager::get('default');
                   
                   

                    $conn = ConnectionManager::get('default');

                    $query = $conn->query("SELECT top 1 *
                         FROM Orden_Pedidos a1 
                         order by created desc
                       " );

                 
                   $orden = $query->fetchAll('assoc');
                   
                    $this->set([
                'orden' => $orden,
                
            ]);

                 $this->set('_serialize', ['orden']);
                 

                }

               public function page()
        //http://192.168.0.198/ped2/articulos/general.json?page=1
                {
                    $page = $this->request->getQuery('page');
                    $limit = 10000;
                    $offset = ($page - 1) * $limit;
                    $conditions = [];
                   $conn = ConnectionManager::get('default');
                    $totalQuery = $conn->query('SELECT COUNT(*) as total
                                 FROM Orden_Pedidos 
                                   
                                   ' );

                    $totalResult = $totalQuery->fetch('assoc');
                    $total = $totalResult['total'];
                    $totalpages = ceil($totalResult['total'] / $limit);
                   

                    $conn = ConnectionManager::get('default');

                    $query = $conn->query("SELECT  a1.id, a1.numero_ped, a1.user_id, a1.descripcion, a1.created, u1.nombre, a1.anulada, s1.descripcion as sucursal, u1.role, a1.Status_aprobada
                                    FROM Orden_Pedidos a1 

                                    inner join dbo.users as u1 on u1.id=a1.user_id
                                    left join dbo.Sucursales as s1 on s1.id=u1.sucursale_id
                                    order by a1.created DESC
                       " );

                 
                   $orden = $query->fetchAll('assoc');
                    $orden = array_slice($orden, $offset, $limit);
                    $this->set([
                'orden' => $orden,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalpages' => $totalpages
            ]);

                 $this->set('_serialize', ['orden', 'total', 'page', 'limit', 'totalpages']);
                 

                }


    /**
     * Edit method
     *
     * @param string|null $id Orden Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
     
         $ordenPedido = $this->OrdenPedidos->get($id, [
            'contain' => [
                'OrdenItems' => ['Articulos'], // Incluir también los artículos relacionados
                'Users' // Si también deseas incluir información del usuario asociado
            ],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordenPedido = $this->OrdenPedidos->patchEntity($ordenPedido, $this->request->getData());
            if ($this->OrdenPedidos->save($ordenPedido)) {
                $this->Flash->success(__('The orden pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden pedido could not be saved. Please, try again.'));
        }
        
    
         $this->set(compact('ordenPedido'));
        $this->set('_serialize', ['ordenPedido']);
    }
   

     public function anular($id)
{
    $ordenPedido = $this->OrdenPedidos->get($id);
    $ordenPedido->anulada = 0;
    $fechaActual = date('Y-m-d H:i:s');
    $ordenPedido->fecha_anulada = $fechaActual;

       if ($this->request->is(['put'])) {
    if ($this->OrdenPedidos->save($ordenPedido)) {
        // Si se guarda correctamente, enviar respuesta JSON
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['message' => 'Pedido anulado correctamente']));
    } else {
        // Si no se guarda correctamente, enviar respuesta JSON
        $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['message' => 'Error al anular el pedido']));
    }
    }
    $this->response = $this->response->withType('application/json')
            ->withStringBody(json_encode(['message' => 'Pedido anulado correctamente']));
    
    return $this->response;
}

      public function search()
        //http://192.168.1.54/ped/articulos/general.json?page=1
                {

                    $conditions = [];
                    $conn = ConnectionManager::get('default');
                    $parametro = '%' . $this->request->getQuery('parametro') . '%';
                    $query = $conn->query("SELECT  *
                                 FROM Orden_Pedidos  
                                    
                                    WHERE numero_ped LIKE '$parametro' " );

                   $orden = $query->fetchAll('assoc');
                  
                    $this->set([
                            'orden' => $orden,
                           
                        ]);

                 $this->set('_serialize', ['orden']);
                 

                }

       public function updateValidation()
        {
            if ($this->request->is('put')) {
                $data = $this->request->getData();
                $fechaActual = date('Y-m-d h:i:s');

                $validada = true;
                $semivalidada = false;

                // Recorrer y actualizar los artículos de la orden
                if (isset($data['orden_items']) && !empty($data['orden_items'])) {
                    foreach ($data['orden_items'] as $item) {
                        $ordenItem = $this->OrdenPedidos->OrdenItems->get($item['id']);
                        $ordenItem->validado = $item['validado'];
                        $ordenItem->fecha_validado = $item['validado'] ? $fechaActual : null;
                        $ordenItem->user_validado = $item['user_validado'];
                        $this->OrdenPedidos->OrdenItems->save($ordenItem);

                        // Verificar el estado de validación de cada artículo
                        if (!$ordenItem->validado) {
                            $validada = false;
                        } else {
                            $semivalidada = true; // Si al menos uno está validado
                        }
                    }
                }

                // Determinar el estado general de la orden
                $statusAprobada = 'Pendiente'; // Estado por defecto si no todos los artículos están validados
                if ($validada) {
                    $statusAprobada = 'Procesada';
                } elseif ($semivalidada) {
                    $statusAprobada = 'Parcialmente';
                }

                // Actualizar el estado general de la orden
                $ordenPedido = $this->OrdenPedidos->get($data['id']);
                $ordenPedido->Status_aprobada = $statusAprobada;
                $this->OrdenPedidos->save($ordenPedido);

                // Respuesta JSON si todo se actualiza correctamente
                $this->response = $this->response->withType('application/json')
                    ->withStringBody(json_encode(['message' => 'Cambios guardados correctamente']));
                return $this->response;
            } else {
                // Manejar solicitud incorrecta (no es un método PUT)
                $this->response = $this->response->withType('application/json')
                    ->withStringBody(json_encode(['error' => 'Método de solicitud incorrecto']));
                return $this->response;
            }
        }



    /**
     * Delete method
     *
     * @param string|null $id Orden Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordenPedido = $this->OrdenPedidos->get($id);
        if ($this->OrdenPedidos->delete($ordenPedido)) {
            $this->Flash->success(__('The orden pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The orden pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
