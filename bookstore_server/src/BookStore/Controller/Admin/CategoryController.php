<?php


namespace BookStore\Controller\Admin;


use BookStore\Model\Admin\CategoryModel;
use Ninja\NinjaException;
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
    
    public function create()
    {
        $this->view_handler->render('admin/category/create.html.php');
    }
    
    public function store()
    {
        try {
            $category = $_POST;
            
            $this->category_model->create_new_category($category);
            $this->route_redirect('/admin/category');
            
        } catch (NinjaException $e) {
            // Xử lý lỗi do mình tự ném ra

            $this->view_handler->render('admin/category/create.html.php', [
                'name' => $_POST['name'] ?? null,
                'description' => $_POST['description'] ?? null,
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        } catch (Exception $e) {
            // Xử lý lỗi từ hệ thống server / PHP
        }
    }
}
