<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class CommentsController extends AppController
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

    public function like($id)
    {

        header("Content-Type: application/json; charset=utf-8");
        $newCount =  json_encode($this->CommentsTable->plusGoodsAndGetGoods($id));
        return $newCount;

    }
}
