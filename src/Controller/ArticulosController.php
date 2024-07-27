<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Articulos Controller
 *
 * @property \App\Model\Table\ArticulosTable $Articulos
 *
 * @method \App\Model\Entity\Articulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticulosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

  public function all()
        //http://192.168.0.198/ped2/articulos/general.json?page=1
                {
                    $page = $this->request->getQuery('page');
                    $limit = 20;
                    $offset = ($page - 1) * $limit;
                    $conditions = [];
                   $conn = ConnectionManager::get('default');
                    $totalQuery = $conn->query('SELECT COUNT(*) as total
                                 FROM ARTICULOS 
                                   
                                   ' );

                    $totalResult = $totalQuery->fetch('assoc');
                    $total = $totalResult['total'];
                    $totalpages = ceil($totalResult['total'] / $limit);
                   

                    $conn = ConnectionManager::get('default');

                    $query = $conn->query("SELECT *
                         FROM ARTICULOS a1 
                       " );

                 
                   $articulos = $query->fetchAll('assoc');
                    $articulos = array_slice($articulos, $offset, $limit);
                    $this->set([
                'articulos' => $articulos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalpages' => $totalpages
            ]);

                 $this->set('_serialize', ['articulos', 'total', 'page', 'limit', 'totalpages']);
                 

                }

 public function serial()
        //https://meruq.ddns.net/ped/articulos/marca.json?page=1&rubro=t&marca=31
        {
            $page = $this->request->getQuery('page');
            $limit = 10;
            $offset = ($page - 1) * $limit;

            $codigo = $this->request->getQuery('codigos');
            
           
            $conditions = [];
            if (!empty($codigo)) {
                $conditions['codigos'] = $codigo;
            }
         
            
            $conn = ConnectionManager::get('default');
            $totalQuery = $conn->query("SELECT COUNT(*) as total
                                         FROM ARTICULOS a1 
                                          where a1.codigo = '" . $codigo . "' 
                                         ");

            $totalResult = $totalQuery->fetch('assoc');
            $total = $totalResult['total'];
            $totalpages = ceil($totalResult['total'] / $limit);

            $query = $conn->query("SELECT *
                                         FROM ARTICULOS a1 
                                         where a1.codigo = '" . $codigo . "' 
                                        ");
            $articulos = $query->fetchAll('assoc');
            $articulos = array_slice($articulos, $offset, $limit);
            
            

            $this->set([
                'articulos' => $articulos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalpages' => $totalpages
            ]);

            $this->set('_serialize', ['articulos', 'total', 'page', 'limit', 'totalpages']);
        }



































    public function api()
        //https://meruq.ddns.net/ped/articulos/api.json?page=1&rubro=t&grupo=7
            {
                $page = $this->request->getQuery('page');
                $limit = 100;
                $offset = ($page - 1) * $limit;

               $grupo = $this->request->getQuery('grupo');
                $grupo = intval($grupo); // Convertir a entero

                $subgrupo = $this->request->getQuery('subgrupo');
                $subgrupo = intval($subgrupo); // Convertir a entero

                $marca = $this->request->getQuery('marca');
                $rubro = $this->request->getQuery('rubro');

                $conditions = [];
                if (!empty($rubro)) {
                    $conditions['rubro'] = $rubro;
                }
                if (!empty($grupo)) {
                    $conditions['grupo'] = $grupo;
                }
                if (!empty($subgrupo)) {
                    $conditions['subgrupo'] = $subgrupo;
                }

             $total = $this->Articulos->find()->where($conditions)->count();

                $conn = ConnectionManager::get('default');
                $query = $conn->prepare("SELECT
                    a1.id, b1.CODIGO, a1.DESCRIPCION, b1.EXISTENCIA, a1.venta, a1.rubro, a1.marca, a1.grupo, a1.subgrupo,
                    (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.MARCA and tipo='m') as DMarca,  
                    (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.GRUPO and tipo='g') as DGrupo, 
                    (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.SUBGRUPO and tipo='s') as DSubGrupo
                    FROM ARTICULOS a1
                    inner join BODEGAPEDS as b1 on b1.articulo_id=a1.id
                    WHERE b1.BODEGA = '15' AND b1.EXISTENCIA > '0' AND a1.rubro = :rubro AND a1.grupo = :grupo AND a1.subgrupo = :subgrupo AND a1.PROM = '0' AND a1.DESCRIPCION NOT LIKE '%COSTEO%' AND a1.PROM = '0'
                    ORDER BY DMarca DESC");

                $query->execute(['rubro' => $rubro, 'grupo' => $grupo, 'subgrupo' => $subgrupo]);
                $articulos = $query->fetchAll('assoc');

                $articulos = array_slice($articulos, $offset, $limit);
                $this->set([
                        'articulos' => $articulos,
                        'total' => $total,
                        'page' => $page,
                        'limit' => $limit
                    ]);

             $this->set('_serialize', ['articulos', 'total', 'page', 'limit']);
            }

    public function getCat2()
             //https://meruq.ddns.net/ped/articulos/getCat2.json?page=1&rubro=t
                        {
                           $rubro = $this->request->getQuery('rubro');
                            $conditions = [];
                        if (!empty($rubro)) {
                            $conditions['rubro'] = $rubro;
                        }
                       
                        $total = $this->Articulos->find()->where($conditions)->count();

                            $conn = ConnectionManager::get('default');
                            $query = $conn->query("SELECT 
                                        (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.MARCA and tipo='m' and rubro is not null) as DMarca, a1.marca, 
                                        (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.GRUPO and tipo='g') as DGrupo, a1.GRUPO, 
                                        (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.SUBGRUPO and tipo='s') as DSubGrupo,a1.SUBGRUPO

                                FROM ARTICULOS a1
                                       
                                inner join BODEGAPEDS as b1 on b1.articulo_id=a1.id 
                                WHERE  a1.PROM = '0' AND b1.BODEGA = '15' AND b1.EXISTENCIA > '0'  AND cat2 not in ('costeo',  '-') AND b1.DESCRIPCION NOT LIKE '%COSTEO%'  AND a1.rubro = '" . $rubro . "' 
                                GROUP BY a1.MARCA, a1.GRUPO, a1.SUBGRUPO
                                ORDER BY DMarca DESC");


                    $cat2 = $query->fetchAll('assoc');
               
                $this->set([
                'cat2' => $cat2]);

             $this->set('_serialize', ['cat2']);
        }


    public function general()
        //http://192.168.1.54/ped/articulos/general.json?page=1
                {
                    $page = $this->request->getQuery('page');
                    $limit = 20;
                    $offset = ($page - 1) * $limit;

                    
                   
                    $conditions = [];
                   
            
                        $conn = ConnectionManager::get('default');

                       $totalQuery = $conn->query('SELECT COUNT(*) as total
                                 FROM ARTICULOS a1 
                                    inner join BODEGAPEDS as b1 on b1.articulo_id=a1.id
                                    inner join venepac.dbo.CODIGOS as c1 on c1.codigo=a1.MARCA
                                    WHERE b1.BODEGA in ( \'15\', \'18\', \'19\', \'20\', \'21\', \'22\', \'23\', \'24\', \'26\', \'27\', \'28\', \'29\', \'30\', \'31\', \'32\', \'33\', \'34\', \'35\', \'36\', \'37\', \'38\') 
                                    AND b1.EXISTENCIA > \'0\' AND c1.tipo = \'m\' AND a1.rubro is not null AND a1.PROM = \'0\'' );

                    $totalResult = $totalQuery->fetch('assoc');
                    $total = $totalResult['total'];
                    $totalpages = ceil($totalResult['total'] / $limit);
                   

                    $conn = ConnectionManager::get('default');

                    $query = $conn->query("SELECT a1.id, b1.CODIGO, a1.DESCRIPCION, SUM(b1.EXISTENCIA) AS EXISTENCIA, a1.venta, a1.rubro, a1.marca, c1.DESCRIPCION as marca2, a1.CAT2, (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.MARCA and tipo='m') as DMarca,
                        (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.GRUPO and tipo='g') as DGrupo, a1.PROM
                         FROM ARTICULOS a1 
                        inner join BODEGAPEDS as b1 on b1.articulo_id=a1.id
                        inner join venepac.dbo.CODIGOS as c1 on c1.codigo=a1.MARCA
                        WHERE b1.BODEGA in ( '15', '18', '19', '20', '21', '22', '23', '24', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38') 
                        AND b1.EXISTENCIA > '1' AND c1.tipo = 'm' AND a1.rubro is not null AND a1.PROM = '0' AND a1.DESCRIPCION NOT LIKE '%COSTEO%' 
                        GROUP BY a1.id, b1.CODIGO, a1.DESCRIPCION, a1.venta, a1.rubro, a1.marca,  a1.CAT2,  a1.PROM, c1.DESCRIPCION, a1.GRUPO
                        ORDER BY a1.marca desc" );

                 
                   $articulos = $query->fetchAll('assoc');
                    $articulos = array_slice($articulos, $offset, $limit);
                    $this->set([
                'articulos' => $articulos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalpages' => $totalpages
            ]);

                 $this->set('_serialize', ['articulos', 'total', 'page', 'limit', 'totalpages']);
                 

                }

      
    public function marca()
        //https://meruq.ddns.net/ped/articulos/marca.json?page=1&rubro=t&marca=31
        {
            $page = $this->request->getQuery('page');
            $limit = 10;
            $offset = ($page - 1) * $limit;

            $cat2 = $this->request->getQuery('cat2');
            $marca = $this->request->getQuery('marca');
            $rubro = $this->request->getQuery('rubro');
           
            $conditions = [];
            if (!empty($rubro)) {
                $conditions['rubro'] = $rubro;
            }
            if (!empty($marca)) {
                $conditions['marca'] = $marca;
            }
            
            $conn = ConnectionManager::get('default');
            $totalQuery = $conn->query('SELECT COUNT(*) as total
                                         FROM ARTICULOS a1 
                                         INNER JOIN BODEGAPEDS as b1 ON b1.articulo_id = a1.id
                                         INNER JOIN venepac.dbo.CODIGOS as c1 ON c1.codigo = a1.MARCA
                                         WHERE b1.BODEGA = \'15\' AND b1.EXISTENCIA > \'0\' AND c1.tipo = \'m\' AND a1.PROM = \'0\'
                                         AND a1.rubro IS NOT NULL 
                                         AND a1.rubro = \'' . $rubro . '\' AND a1.marca = \'' . $marca . '\'');

            $totalResult = $totalQuery->fetch('assoc');
            $total = $totalResult['total'];
            $totalpages = ceil($totalResult['total'] / $limit);

            $query = $conn->query('SELECT a1.id, b1.CODIGO, a1.DESCRIPCION, b1.EXISTENCIA, a1.venta, a1.rubro, a1.marca, c1.DESCRIPCION as marca2, a1.CAT2,(SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.MARCA and tipo=\'m\') as DMarca,
                        (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.GRUPO and tipo=\'g\') as DGrupo
                                   FROM ARTICULOS a1 
                                   INNER JOIN BODEGAPEDS as b1 ON b1.articulo_id = a1.id
                                   INNER JOIN venepac.dbo.CODIGOS as c1 ON c1.codigo = a1.MARCA
                                   WHERE b1.BODEGA = \'15\' AND b1.EXISTENCIA > \'0\' AND c1.tipo = \'m\' AND a1.PROM = \'0\' 
                                   AND a1.rubro IS NOT NULL 
                                   AND a1.rubro = \'' . $rubro . '\' AND a1.marca = \'' . $marca . '\'');

            $articulos = $query->fetchAll('assoc');
            $articulos = array_slice($articulos, $offset, $limit);
            
            

            $this->set([
                'articulos' => $articulos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalpages' => $totalpages
            ]);

            $this->set('_serialize', ['articulos', 'total', 'page', 'limit', 'totalpages']);
        }

         public function desactivararticulos()
        //http://192.168.1.54/ped/articulos/general.json?page=1
                {
                    $page = $this->request->getQuery('page');
                    $limit = 100;
                    $offset = ($page - 1) * $limit;

                    
                   
                    $conditions = [];
                   
                
                        $conn = ConnectionManager::get('default');

                       $totalQuery = $conn->query('SELECT COUNT(*) as total
                                 FROM ARTICULOS a1 
                                    inner join BODEGAPEDS as b1 on b1.articulo_id=a1.id
                                    inner join venepac.dbo.CODIGOS as c1 on c1.codigo=a1.MARCA
                                    WHERE b1.BODEGA in ( \'15\', \'18\', \'19\', \'20\', \'21\', \'22\', \'23\', \'24\', \'26\', \'27\', \'28\', \'29\', \'30\', \'31\', \'32\', \'33\', \'34\', \'35\', \'36\', \'37\', \'38\') 
                                    AND b1.EXISTENCIA > \'0\' AND c1.tipo = \'m\' AND a1.rubro is not null');

                    $totalResult = $totalQuery->fetch('assoc');
                    $total = $totalResult['total'];
                    $totalpages = ceil($totalResult['total'] / $limit);
                   

                    $conn = ConnectionManager::get('default');

                    $parametro = '%' . $this->request->getQuery('parametro') . '%';
                    $query = $conn->query("SELECT a1.id, b1.CODIGO, a1.DESCRIPCION, SUM(b1.EXISTENCIA) AS EXISTENCIA, a1.venta, a1.rubro, a1.marca, c1.DESCRIPCION as marca2, a1.CAT2, (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.MARCA and tipo='m') as DMarca,
                        (SELECT DESCRIPCION FROM CODIGOS WHERE codigo=a1.GRUPO and tipo='g') as DGrupo, a1.PROM
                         FROM ARTICULOS a1 
                        inner join BODEGAPEDS as b1 on b1.articulo_id=a1.id
                        inner join venepac.dbo.CODIGOS as c1 on c1.codigo=a1.MARCA
                        WHERE b1.BODEGA in ( '15', '18', '19', '20', '21', '22', '23', '24', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38') 
                        AND b1.EXISTENCIA > '1' AND c1.tipo = 'm' AND a1.rubro is not null AND a1.DESCRIPCION NOT LIKE '%COSTEO%' AND (b1.CODIGO LIKE '$parametro' OR b1.DESCRIPCION LIKE '$parametro')
                        GROUP BY a1.id, b1.CODIGO, a1.DESCRIPCION, a1.venta, a1.rubro, a1.marca,  a1.CAT2,  a1.PROM, c1.DESCRIPCION, a1.GRUPO
                        ORDER BY a1.marca desc" );

                 
                   $articulos = $query->fetchAll('assoc');
                    $articulos = array_slice($articulos, $offset, $limit);
                    $this->set([
                'articulos' => $articulos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalpages' => $totalpages
            ]);

                 $this->set('_serialize', ['articulos', 'total', 'page', 'limit', 'totalpages']);
                 

                }

      

        public function categorias()
        {
            // Crea una instancia de la tabla 'articulos'
        $articulosTable = $this->getTableLocator()->get('Articulos');

        // Construye la consulta utilizando el Query Builder
        $query = $articulosTable->find();
        $query->select(['cat2'])
              ->group(['cat2']);

        // Ejecuta la consulta y obtén los resultados
        $categorias = $query->toArray();
            $this->set(compact('categorias'));
            $this->set('_serialize', ['categorias']);
        }

    public function todas()
        {
            // Crea una instancia de la tabla 'articulos'
        $articulosTable = $this->getTableLocator()->get('Articulos');

        // Construye la consulta utilizando el Query Builder
        $query = $articulosTable->find();
        $query->select(['cat2'])
              ->group(['cat2']);

        // Ejecuta la consulta y obtén los resultados
        $categorias = $query->toArray();
            $this->set(compact('categorias'));
            $this->set('_serialize', ['categorias']);
        }

    public function index()
            //http://localhost/ped/articulos/index2.json?page=1&cat2=MERCUSYS
            {
                $page = $this->request->getQuery('page');
                $limit = 10;
                $offset = ($page - 1) * $limit;

                $cat2 = $this->request->getQuery('cat2');
                $conditions = [];
                if (!empty($cat2)) {
                    $conditions['CAT2'] = $cat2;
                }

                $total = $this->Articulos->find()->where($conditions)->count();

                $articulos = $this->Articulos->find('all', array('conditions' => $conditions))
                                                ->offset($offset)
                                                ->limit($limit)
                                                ->toArray();

                $this->set([
                    'articulos' => $articulos,
                    'total' => $total,
                    'page' => $page,
                    'limit' => $limit
                ]);

                $this->set('_serialize', ['articulos', 'total', 'page', 'limit']);
            }
    public function index2()

        //http://localhost/ped/articulos/index2.json?page=1&rubro=t
        {
            $page = $this->request->getQuery('page');
            $limit = 100;
            $offset = ($page - 1) * $limit;

            $cat2 = $this->request->getQuery('cat2');
            $marca = $this->request->getQuery('marca');
            $rubro = $this->request->getQuery('rubro');
           
            $conditions = [];
            if (!empty($rubro)) {
                $conditions['rubro'] = $rubro;
            }
            if (!empty($cat2)) {
                $conditions['CAT2'] = $cat2;
            }
            

            $total = $this->Articulos->find()->where($conditions)->count();

            $articulos = $this->Articulos->find('all', array('conditions' => $conditions))
                                            ->offset($offset)
                                            ->limit($limit)
                                            ->toArray();

            $this->set([
                'articulos' => $articulos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit
            ]);

            $this->set('_serialize', ['articulos', 'total', 'page', 'limit']);
        }


    /**
     * View method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => ['BODEGAPEDS', 'BODEGAPEDSAux', 'PEDIDOS', 'BodegaRespaldo', 'OrdenItems'],
        ]);

        $this->set('articulo', $articulo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articulo = $this->Articulos->newEntity();
        if ($this->request->is('post')) {
            $articulo = $this->Articulos->patchEntity($articulo, $this->request->getData());
            if ($this->Articulos->save($articulo)) {
                $this->Flash->success(__('The articulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articulo could not be saved. Please, try again.'));
        }
        $this->set(compact('articulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articulo = $this->Articulos->patchEntity($articulo, $this->request->getData());
            if ($this->Articulos->save($articulo)) {
                $this->Flash->success(__('The articulo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articulo could not be saved. Please, try again.'));
        }
        $this->set(compact('articulo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articulo = $this->Articulos->get($id);
        if ($this->Articulos->delete($articulo)) {
            $this->Flash->success(__('The articulo has been deleted.'));
        } else {
            $this->Flash->error(__('The articulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   public function guardarArticulosSeleccionados()
{
    $this->autoRender = false; // Deshabilitar la renderización de la vista

    if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData();
        
        if (isset($data['id']) && isset($data['PROM'])) {
            // Obtener los artículos seleccionados y el valor de promo desde la solicitud
            $id = $data['id'];
            $promo = $data['PROM'];

            // Actualizar los artículos en la base de datos
            foreach ($id as $articleId) {
                $id = $this->Articulos->get($articleId);
                $id->PROM = $promo; // Asegúrate de que el campo se llama PROM
                if ($this->Articulos->save($id)) {
                    // Artículo actualizado correctamente
                } else {
                    // Error al guardar el artículo
                }
            }

            // Enviar una respuesta JSON
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['message' => 'Artículos actualizados correctamente']));
            return $this->response;
        } else {
            // Datos faltantes en la solicitud
            $this->response = $this->response->withType('application/json')
                ->withStringBody(json_encode(['error' => 'Datos incompletos en la solicitud']));
            return $this->response;
        }
    }
}


}
