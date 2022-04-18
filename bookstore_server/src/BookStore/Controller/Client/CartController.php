<?php

namespace BookStore\Controller\Client;


use BookStore\Controller\BookStoreBaseController;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\ProductModel;
use BookStore\Utils\CartManager;


class CartController extends BookStoreBaseController
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

    public function add_to_cart()
    {
        $product_id = $_POST["product_id"];
        $quantity = $_POST["quantity"];

        $cartManager = new CartManager();
        $cartManager->add_product_cart($product_id, $quantity);
        


        $this->route_redirect('/');
    }

    public function delete_product_cart()
    {
        $product_id = $_POST['product_id'];
        $cartManager = new CartManager();
        $cartManager->delete_product_cart($product_id);
        $cart_products = $cartManager->get_products_cart($this->product_model);
        $total = $cartManager->get_subtotal_products_cart($cart_products);

        $data = [
            'status' => 'OK',
            'data' => null,
            'msg' => null,
            'total' => $total,
            'count' => count($cart_products)
        ];
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function delete_cart()
    {
        $cartManager = new CartManager();
        $cartManager->delete_all_products_cart();

        $this->route_redirect('/cart/viewcart');
    }

    public function update_cart()
    {
        $product_ids = $_POST['product_ids'] ?? [];
        $quantities = $_POST['product_quantities'] ?? [];

        $cart = [];

        for($i = 0; $i < count($product_ids); $i++)
        {
            $item =[];
            $item['product_id'] = $product_ids[$i];
            $item['quantity'] = $quantities[$i];
            array_push($cart, $item);

            //C2: $cart[] = $item;
        }

        $_SESSION['cart'] = $cart;

        $this->route_redirect('/cart/viewcart');

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

    public function render_viewcart()
    {

        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);

        $cartManager = new CartManager();
        $cart_products = $cartManager->get_products_cart($this->product_model);
        $total = $cartManager->get_subtotal_products_cart($cart_products);


        $this->view_handler->render('client/cart/viewcart.html.php', [
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
            'cart_products' => $cart_products,
            'total' => $total,
        ]);
    }
}
