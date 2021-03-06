<?php


App::uses('AppController', 'Controller');

class PagesController extends AppController  {

	public $uses = array();

       
        public function beforeFilter() {
            parent::beforeFilter();
        // Allow users to register and logout.
            $this->Auth->allow('display','interna','index','paginar','layout02','categ','sobre');
        }
        
        public function paginar($pulo ) {
              
           $posts = ClassRegistry::init('Post');
           $todosposts = $posts->find('all',array('limit'=>2, 'offset'=>$pulo));
           $this->set('posts', $todosposts); 
          
        }
        public function interna ($id ) {
           


           $posts = ClassRegistry::init('Post');
           $posts2 = ClassRegistry::init('Post');
           $categoria = ClassRegistry::init('Categoria');

           $todosposts = $posts->find('all',array(
                    'conditions' => array('post.id' => $id)
                ));
           //pr ($todosposts) ;

           //exit();

           $postmaiscomentados = $posts2->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'asc'))
                    
                   );

           $categorias = $categoria->find('all',array(array('Categoria.nome' => 'asc')));
       
           $this->set('posts', $todosposts);    
           
           $this->set('postmaiscomentados', $postmaiscomentados);   
           
           $this->set('categorias', $categorias);   
        
        }
        public function sobre () {
           


           $posts = ClassRegistry::init('Post');
           $posts2 = ClassRegistry::init('Post');
           $categoria = ClassRegistry::init('Categoria');

           $todosposts = $posts->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'desc'))
                    
                   );
           //pr ($todosposts) ;

           //exit();

           $postmaiscomentados = $posts2->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'asc'))
                    
                   );

           $categorias = $categoria->find('all',array(array('Categoria.nome' => 'asc')));
       
           $this->set('posts', $todosposts);    
           
           $this->set('postmaiscomentados', $postmaiscomentados);   
           
           $this->set('categorias', $categorias);   
        
        }
        public function index() {
           
           $posts = ClassRegistry::init('Post');
           $posts2 = ClassRegistry::init('Post');
           $categoria = ClassRegistry::init('Categoria');

           $todosposts = $posts->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'desc'))
                    
                   );

           //pr ($todosposts) ;

           //exit();

           $postmaiscomentados = $posts2->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'asc'))
                    
                   );

           $categorias = $categoria->find('all',array(array('Categoria.nome' => 'asc')));
       
           $this->set('posts', $todosposts);    
           
           $this->set('postmaiscomentados', $postmaiscomentados);   
           
           $this->set('categorias', $categorias);   

         
        }
        

        public function categ($cat) {
           //pr ($cat) ;
      
           $posts = ClassRegistry::init('Post');
           $posts2 = ClassRegistry::init('Post');
           $categoria = ClassRegistry::init('Categoria');

          
           $todosposts = $posts->find('all',array(
                    'conditions' => array('categoria.id' => $cat)
                ));
           
            $postmaiscomentados = $posts2->find('all',
                   array('limit'=> '2','order' => array('Post.created' => 'asc'))
                    
                   );

           $categorias = $categoria->find('all',array(array('Categoria.nome' => 'asc')));
       
           $this->set('posts', $todosposts);    
           
           $this->set('postmaiscomentados', $postmaiscomentados);   
           
           $this->set('categorias', $categorias); 

         }

        public function layout02() {
            
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
        
        
}
