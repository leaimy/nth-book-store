<?php


namespace BookStore\Controller\Admin;



use BookStore\Model\Admin\AuthorModel;
use Ninja\NJBaseController\NJBaseController;

class AuthorController extends NJBaseController
{ 
    private $author_model;

    public function __construct(AuthorModel $author_model)
    {
        $this->author_model = $author_model;
    }

    public function index()
    {
        $author_all = $this->author_model->get_all_author();
        $this->view_handler->render('admin/author/index.html.php',
            [
                'author_all'=>$author_all,
            ]);
    }
}
