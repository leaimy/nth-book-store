<?php


namespace BookStore\Controller\Admin;


use BookStore\Entity\Admin\ProductEntity;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\MediaModel;
use BookStore\Model\Admin\ProductModel;
use Ninja\NinjaException;
use Ninja\NJBaseController\NJBaseController;

class ProductController extends NJBaseController
{
    private $media_model;
    private $product_model;
    private $category_model;
    private $author_model;
    
    public function __construct(MediaModel $media_model, ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        $this->media_model = $media_model;
        $this->product_model = $product_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
    }
    
    public function index()
    {
        $product_all = $this->product_model->get_all_product();
        $this->view_handler->render('admin/product/index.html.php',[
            'product_all' => $product_all,
        ]);
    }

    public function create()
    {
        $category_all = $this->category_model->get_all_category();
        $author_all = $this->author_model->get_all_author();
        $this->view_handler->render('admin/product/create.html.php',[
            'category_all' => $category_all,
            'author_all' => $author_all,
        ]);
    }
    
    public function store()
    {
        try {
            $product = $_POST;

            if (isset($_FILES['file_upload'])) {
                $new_media = $this->media_model->create_new_media($_FILES);
                $media_id = $new_media->id;
                $product[ProductEntity::KEY_MEDIA_ID] = $media_id;
            }

            $this->product_model->create_new_product($product);

            $this->route_redirect('/admin/product');
        } catch (NinjaException $e) {
            // Xử lý lỗi do mình tự ném ra

            $this->view_handler->render('admin/product/create.html.php', [
                'name' => $_POST['name'] ?? null,
                'unit_price' => $_POST['unit_price'] ?? null,
                'sale_price' => $_POST['sale_price'] ?? null,
                'quantity' => $_POST['quantity'] ?? null,
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
        $product = $this->product_model->get_by_id_product($id);
        $category_all = $this->category_model->get_all_category();
        $author_all = $this->author_model->get_all_author();
        $this->view_handler->render('admin/product/edit.html.php',[
            'product' => $product,
            'category_all' => $category_all,
            'author_all' => $author_all,
        ]);
    }
    
    public function update()
    {
        try {
            $product = $_POST;
            $id = $_POST['id'];

            if (!empty($_FILES['file_upload']['name'])) {
                // Người dùng cập nhật ảnh mới

                $new_media = $this->media_model->create_new_media($_FILES);
                $media_id = $new_media->id;
                $product[ProductEntity::KEY_MEDIA_ID] = $media_id;
                $this->product_model->update_product($id, $product);
            } else {
                // Người dùng chỉ cập nhật thông tin cơ bản
                $this->product_model->update_product($id, $product);
            }


            $this->route_redirect('/admin/product');
        } catch (NinjaException $e) {
            // Xử lý lỗi do mình tự ném ra

            $this->view_handler->render('admin/product/edit.html.php', [
                'name' => $_POST['name'] ?? null,
                'unit_price' => $_POST['unit_price'] ?? null,
                'sale_price' => $_POST['sale_price'] ?? null,
                'quantity' => $_POST['quantity'] ?? null,
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
        $this->product_model->delete_product($id);
        $this->route_redirect('/admin/product');
    }
}
