<?php


namespace BookStore\Controller\Admin;


use BookStore\Controller\BookStoreBaseController;
use BookStore\Model\Admin\CategoryModel;
use Ninja\NinjaException;
use Ninja\NJTrait\Jsonable;

class CategoryController extends BookStoreBaseController
{
    use Jsonable;
    
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

    public function edit()
    {
        $id = $_GET['id'];
        $category = $this->category_model->get_by_id_category($id);
        $this->view_handler->render('admin/category/edit.html.php',[
            'category' => $category,
        ]);
    }
    
    public function update()
    {
        try {
            $category = $_POST;
            $id = $_POST['id'];
            
            $this->category_model->update_category($id, $category);
            $this->route_redirect('/admin/category');
            
        }  catch (NinjaException $e) {
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
    
    public function delete()
    {
        $id = $_GET['id'];
        $this->category_model->delete_category($id);
        $this->route_redirect('/admin/category');
    }
    
    public function store_api()
    {
        try {
            $category = $_POST;

            $category_new = $this->category_model->create_new_category($category);

            $this->response_json($category_new,200);
        } catch (NinjaException $e) {
            // Phản hồi JSON lỗi về cho client để client hiển thị lỗi lên cho người dùng
            $this->response_json($e->getMessage(), 400);
            
        } catch (Exception $e) {
            // Phản hồi JSON lỗi về cho client để client hiển thị lỗi lên cho người 
            $this->response_json("Server xảy ra lỗi không xác định, vui lòng thử lại sau", 500);
        }
    }
}
