<?php


App::uses('AppController', 'Controller');

class PagesController extends AppController  {

	public $uses = array();

       
        public function beforeFilter() {
            parent::beforeFilter();
        // Allow users to register and logout.
            $this->Auth->allow('display','interna','index','paginar','layout02');
        }
        
        public function paginar($pulo ) {
              
           $posts = ClassRegistry::init('Post');
           $todosposts = $posts->find('all',array('limit'=>2, 'offset'=>$pulo));
           $this->set('posts', $todosposts); 
          
        }
        public function index() {
            
           $posts = ClassRegistry::init('Post');
           $comentario = ClassRegistry::init('Comentario');
           
           $todosposts = $posts->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'desc'))
                    
                   );
           
           $postmaiscomentados = $comentario->find('all',
                   array(
                        //'having' => array('COUNT(Comentario.id) <' => 2),
                      // 'conditions' => array('Comentario.post_id' => 0), 
                       'limit'=> '4',
                       'group'  => array('Comentario.post_id'),
                       'order' => array('Post.created' => 'desc'),
                       'conditions' => array('Comentario.post_id >' => 0)
                    )
                    
                   );
          // pr($postmaiscomentados);
          // exit();
         //  $postmaiscomentados = $posts->find('all'// array(
               // 'fields' => 'DISTINCT Post.id'//,
               // 'conditions' => array('Post.Comentario.ativo !=' => true)
           //  );
           //  pr($postmaiscomentados);
           $this->set('posts', $todosposts);    
          // pr($postmaiscomentados);
           $this->set('postmaiscomentados', $postmaiscomentados);     
         
        }
        
        public function layout02() {
           $posts = ClassRegistry::init('Post');
           $posts2 = ClassRegistry::init('Post');
           $categoria = ClassRegistry::init('Categoria');
           $todosposts = $posts->find('all',
                   array('limit'=> '5','order' => array('Post.created' => 'desc'))
                    
                   );
           $postmaiscomentados = $posts2->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'asc'))
                    
                   );
           $categorias = $categoria->find('all',array(array('Categoria.nome' => 'asc')));
         //  $postmaiscomentados = $posts->find('all'// array(
               // 'fields' => 'DISTINCT Post.id'//,
               // 'conditions' => array('Post.Comentario.ativo !=' => true)
           //  );
           //  pr($postmaiscomentados);
           $this->set('posts', $todosposts);    
           
           $this->set('postmaiscomentados', $postmaiscomentados);   
           
           $this->set('categorias', $categorias);   
         
        }
        
	public function display() {
		$path = func_get_args();
        $posts = ClassRegistry::init('Post');

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;
          
                
                
                
              //  $posts->paginate = ['limit' => 1];
               
                $todosposts = $posts->find('all',array(
                    'order' => array('Post.created' => 'desc')
                ));
               
                 //  pr($todosposts);      
                //$todosposts = $todosposts->paginate;
                
                $this->set('posts',$todosposts);
             
		try {
                    // pr(implode('/', $path));
			$this->render(implode('/', $path));
                       
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
        
        public function interna ($id ) {
           // pr($id)
            //$path = 'interna()';
            $posts = ClassRegistry::init('Post');
              // pr($posts);
                $todosposts = $posts->find('all',array(
                    'conditions' => array('post.id' => $id)
                ));
                        
                
            $this->set('posts',$todosposts);
        
        }
}
