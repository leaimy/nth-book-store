<?php


namespace BookStore\Controller\Admin;


use BookStore\Model\Admin\CategoryModel;
use Ninja\NJBaseController\NJBaseController;

class CategoryController extends NJBaseController
{
    private $category_model;

    public function __construct(CategoryModel $category_model)
    {
        $this->category_model = $category_model;
    }
    
    public function index()
    {
        $category_all = $this->category_model->get_all_category();
        $this->view_handler->render('admin/category/index.html.php',
        [
            'category_all'=>$category_all,
        ]);
    }
}
