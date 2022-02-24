<?php

namespace BookStore\Controller\Client;

use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use \Ninja\NJBaseController\NJBaseController;

class ProfileController extends NJBaseController
{

    private $product_model;
    private $category_model;
    private $author_model;
    public function __construct(ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        $this->product_model = $product_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
    }
    
    public function render_profile_dashboard_page()
    {
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        $this->view_handler->render('client/user/my-profile.html.php',[
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }

    public function render_profile_update_page()
    {
        $this->view_handler->render('client/user/my-profile.html.php');
    }

    public function render_profile_order_page()
    {
        $this->view_handler->render('client/user/my-profile.html.php');
    }
    
    public function render_signin_page()
    {
        $is_error = $_GET['error'] ?? null;
        $error_message = '';
        
        if ($is_error == 1) {
            $error_message = 'Thông tin đăng nhập không hợp lệ';
        }
        
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        $this->view_handler->render('client/user/signin.html.php',[
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
            'is_error' => $is_error,
            'error_message' => $error_message
        ]);
    }
    
    public function render_signup_page()
    {
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        $this->view_handler->render('client/user/signup.html.php',[
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }
}
