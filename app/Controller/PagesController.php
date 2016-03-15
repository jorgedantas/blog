<?php


App::uses('AppController', 'Controller');

class PagesController extends AppController  {

	public $uses = array();

       
        public function beforeFilter() {
            parent::beforeFilter();
        // Allow users to register and logout.
            $this->Auth->allow('display','interna','index','paginar');
        }
        
        public function paginar($pulo ) {
              
           $posts = ClassRegistry::init('Post');
           $todosposts = $posts->find('all',array('limit'=>2, 'offset'=>$pulo));
           $this->set('posts', $todosposts); 
          
        }
        public function index() {
        
           $posts = ClassRegistry::init('Post');
           $todosposts = $posts->find('all',array('limit'=> '2'));
           $this->set('posts', $todosposts);    
            
         
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
