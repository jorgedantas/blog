<?php


App::uses('AppController', 'Controller');

class PagesController extends AppController  {
// public $components = array('Paginator');

	public $uses = array();
//        public $components = array( 'Paginator');
        
//        public $paginate = array(
//            'fields' => array('Post.id', 'Post.created'),
//            'limit' => 1,
//            'order' => array(
//                'Post.title' => 'asc'
//            )
//        );
        
       
        public function beforeFilter() {
            parent::beforeFilter();
        // Allow users to register and logout.
            $this->Auth->allow('display','interna','index','paginar');
        }
        
        public function paginar($id =5) {
            $posts = ClassRegistry::init('Post');
            
            $todosposts = $posts->find('all', array('limit' => $id));
           //  $todosposts = $posts->find('all',array(
                   // 'order' => array('Post.created' => 'desc'//,
                     //   'limit' => 1
                        
                      //  )
           // ));
             
            $this->set('posts', $todosposts); 
            //return $this->redirect(array('action' => 'index'));
           // $this->render(implode('/', 'index'));
           // return echo $id ;
        }
        public function index() {
          //pr($posts);
            $posts = ClassRegistry::init('Post');
              // pr($posts);
            
           
            
            $todosposts = $posts->find('all',array(
                    'order' => array('Post.created' => 'desc'//,
                       // 'limit' => 1
                        
                        )
            ));
                   
           // $todosposts->query("SELECT * FROM posts LIMIT 1;");
            
          //  pr($todosposts);
            //$posts->Paginator->settings = $posts->paginate;
           //   pr($posts->paginate);
           //   exit();
            // similar to findAll(), but fetches paged results
           // $todosposts = $posts->Paginator->paginate($posts);
            $this->set('posts', $todosposts);    
            
           // $this->set('posts',$todosposts);
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
