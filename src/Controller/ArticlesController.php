<?php

// src/Controller/ArticlesController.php

namespace App\Controller;

class ArticlesController extends AppController
{
	var $name = 'ScWidths';
    var $scaffold;
	
	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	
	public function import(){
		if($this->request->is('post')){
			$up_file = $this->data['Post']['CsvFile']['tmp_name'];
			$fileName = 'post.csv';
			if(is_uploaded_file($up_file)){
				move_uploaded_file($up_file, $fileName);
				$this->Post->loadCSV($fileName);
				$this->Session->setFlash('Uploaded');
				$this->redirect(array('action'=>'index'));
			}
		}
		//$this->redirect(array('action'=>'index'));
        }
	
    public function index()
    {
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }
	
	public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }
	
	public function add()
    {
        $query = $this->User->query("SELECT name FROM User");
        $this->set('User',$query);
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
             $article->user_id = $this->Auth->user('id');
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }
	
	public function edit($id = null)
	{	
    $article = $this->Articles->get($id);
    if ($this->request->is(['post', 'put'])) {
        $this->Articles->patchEntity($article, $this->request->data);
        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Your article has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your article.'));
    }

    $this->set('article', $article);
	}
	
	public function delete($id)
	{
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $articleId = (int)$this->request->params['pass'][0];
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}