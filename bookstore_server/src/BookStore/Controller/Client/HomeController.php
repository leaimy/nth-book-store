<?php

namespace BookStore\Controller\Client;

use BookStore\Entity\Admin\UserEntity;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use \Ninja\NJBaseController\NJBaseController;

class HomeController extends NJBaseController
{
    
    private $product_model;
    private $category_model;
    private $author_model;
    public function __construct(ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        
        $this->product_model = $product_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
    }

    public function render_home_page()
    {
        $user = $_SESSION['user'] ?? null;
        
        $product_all = $this->product_model->get_all_product();
        $product2 = $this->product_model->random_product(2);
        $product8 = $this->product_model->random_product(8);
        $category_random4 = $this->category_model->random_category(4);
        $author_random4 = $this->author_model->random_author(4);
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        $product_author = $this->product_model->random_product_by_author( $author_random4[0]->id,4);
        
        
        $this->view_handler->render('client/home.html.php',[
            'product_all' => $product_all,
            'product2' => $product2,
            'product8' => $product8,
            'category_random' => $category_random4,
            'product_model' => $this->product_model,
            'author_random' => $author_random4,
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
            'product_author'=> $product_author,
            'user' => $user,
            'is_admin' => $user instanceof UserEntity ? $user->type == 'ADMIN' : false
        ]);
    }

    public function render_product_detail_page()
    {
        $this->view_handler->render('client/home.html.php');
    }

    
    
}
