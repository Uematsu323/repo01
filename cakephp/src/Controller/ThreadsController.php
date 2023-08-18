<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\View\Helper\SessionHelper;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class ThreadsController extends AppController
{
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */

    public function initialize()
    {
        $this->ThreadsTable = TableRegistry::get("threads");
        $this->CommentsTable = TableRegistry::get("comments");

        parent::initialize();
    }

    public function index($id)
    {
        $this->set("thread",$this->ThreadsTable->getData($id));

        $this->set("comments",$this->CommentsTable->getData($id));

        // if ($entity) {
        //     $this->set("error",$comments->hasErrors());
        // }
    }

    public function create($id)
    {
        if ($this->request->is('post')) {
            $CommentData = $this->request->getData();
            if ($CommentData['text']) {
                $CommentData["thread_id"] = $id;
                $this->CommentsTable->register($CommentData);
            }
            $this->redirect("/thread/{$id}",301);
        }
    }


    //     // $entity = $this->CommentsTable->newEntity($this->request->getData());
    //     // if ($this->request->is('post')) {
    //     //     if (!$entity->hasErrors()) {
    //     //         $entity['thread_id'] = $id;
    //     //         $this->CommentsTable->register($entity);
    //     //     }
    //     // }
    //     // // dd($entity->errors());
    //     // $this->redirect("/thread/{$id}",301);

    //     $entity = $this->CommentsTable->newEntity($this->request->getData());
    //     if ($entity->hasErrors()) {
    //         $this->redirect("/thread/{$id}",301);
    //     } else {
    //         $entity["thread_id"] = $id;
    //         $this->CommentsTable->register($entity);
    //     }
    //     // $this->redirect("/thread/{$id}",301);
    //     $this->redirect(['action' => 'index',($id,$entity)]);
    // }



    // public function beforeFilter(Event $event)
    // {
    //     parent::beforeFilter($event);
    //     if ($this->request->Session->read('errors')) {
    //         foreach ($this->Session->read('errors') as $model => $errors) {
    //             $this->loadModel($model);
    //             $this->$model->validationErrors = $errors;
    //         }$this->Session->delete('errors');
    //     }
    // }

    // public function create()
    // {
    //     $user = $this->request->getData('Thread');
    //     if ($this->Thread->save($user) === false) {
    //         $this->request->Session->write('errors.Thread',$this->Thread->validationErrors);
    //         return $this->redirect($this->referer());
    //     }
    //     return $this->redirect("/thread/{$id}",301);
    // }






    public function createnewthread()
    {
        $errormessage = [];
        if ($this->request->is('post')) {
            $ThreadData = $this->request->getData();
            if (empty($ThreadData['title'])) {
                $errormessage[] = 'タイトルを入力してください';
            }
            if (empty($ThreadData['discription'])) {
                $errormessage[] = '内容を入力してください';
            }
            if (empty($errormessage)) {
                $this->ThreadsTable->register($ThreadData);
                $this->redirect("/newthread/",301);
            }
        }
        $this->set("errormessage",$errormessage);
    }

}




