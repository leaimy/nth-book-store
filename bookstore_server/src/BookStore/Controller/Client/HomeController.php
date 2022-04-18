<?php

namespace BookStore\Controller\Client;

use BookStore\Controller\BookStoreBaseController;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use BookStore\Utils\CartManager;

class HomeController extends BookStoreBaseController
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
        $product_all = $this->product_model->get_all_product();
        $product2 = $this->product_model->random_product(2);
        $product8 = $this->product_model->random_product(8);
        $category_random4 = $this->category_model->random_category(4);
        $author_random4 = $this->author_model->random_author(4);
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        if(count($author_random4)>0){
        $product_author = $this->product_model->random_product_by_author( $author_random4[0]->id,4);
        }else {
            $product_author = [];
        }


        $cartManager = new CartManager();
        $cart_products = $cartManager->get_products_cart($this->product_model);
        $total = $cartManager->get_subtotal_products_cart($cart_products);

        
        
        
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
            'cart_products' => $cart_products,
            'total' => $total,
        ]);
    }

    public function render_product_detail_page()
    {
        $this->view_handler->render('client/home.html.php');
    }

    
    
}
