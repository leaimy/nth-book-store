<?php

namespace BookStore\Controller\Client;

use BookStore\Controller\BookStoreBaseController;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\ProductModel;
use BookStore\Utils\CartManager;


class CheckoutController extends BookStoreBaseController
{
    private $product_model;
    private $category_model;
    private $author_model;


    public function __construct(ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        parent::__construct();

        $this->product_model = $product_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
    }


    public function render_checkout()
    {

        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);

        $cartManager = new CartManager();
        $cart_products = $cartManager->get_products_cart($this->product_model);
        $total = $cartManager->get_subtotal_products_cart($cart_products);

        $this->view_handler->render('client/cart/checkout.html.php', [
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
            'cart_products' => $cart_products,
            'total' => $total,
        ]);
    }

    public function get_province()
    {
        // Cach lay duong dan SAI
        // $str = file_get_contents('./Data/Index.json');

        // Cach lay duong dan DUNG || Phai truyen duong dan tuyet doi thi moi chay duoc
        // $file_path = __DIR__ . '/../../Data/Index.json';
        // $str = file_get_contents($file_path);

        // Lay duong dan thong qua CONSTANT duoc khai bao san o tap tin public/index.php
        $file_path = ROOT_DIR . '/src/BookStore/Data/Index.json';
        $content = file_get_contents($file_path);
        $json = json_decode($content, true);

        $data = [
            'status' => 'OK',
            'data' => $json,
            'msg' => null,            
        ];
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function get_province_detail()
    {
        $code = $_GET["code"];

        $file_path = ROOT_DIR . '/src/BookStore/Data/data/'.$code.'.json';
        $content = file_get_contents($file_path);
        $json = json_decode($content,true);

        $data = [
            'status' => 'OK',
            'data' => $json,
            'msg' => null,            
        ];
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

}