<?php

namespace BookStore\Controller\Client;


use BookStore\Controller\BookStoreBaseController;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;

class CartController extends BookStoreBaseController
{
    private $product_model;
    private $category_model;

    public function __construct(ProductModel $product_model, CategoryModel $category_model)
    {
        parent::__construct();
        
        $this->product_model = $product_model;
        $this->category_model = $category_model;
    }

    public function add_to_cart()
    {
        $product_id = $_POST["product_id"];
        $quantity = $_POST["quantity"];

        $cart = $_SESSION['cart'] ?? [];
        $cart[] = [
            'product_id' => $product_id,
            'quantity' => $quantity
        ];

        $_SESSION['cart'] = $cart;

       
    }
}