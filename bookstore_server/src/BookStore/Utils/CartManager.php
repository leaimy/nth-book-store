<?php

namespace BookStore\Utils;

use BookStore\Model\Admin\ProductModel;

class CartManager
{
    public function get_products_cart($product_model)
    {
        $products_cart = [];


        if (array_key_exists('cart', $_SESSION) == false) {
            $products_cart = [];
        } else {
            $cart = $_SESSION['cart']?? [];
            foreach ($cart as $item) {
                $product_id = $item['product_id'];
                $p = $product_model->get_by_id_product($product_id);
                $p->cart_quantity = $item['quantity'];
                $products_cart[] = $p;
            }
        }
        return $products_cart;
    }

    public function add_product_cart($product_id, $quantity)
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();

        if (array_key_exists('cart', $_SESSION) == false) {
            $_SESSION['cart'] = [];

            $item = [
                'product_id' => $product_id,
                'quantity' => $quantity
            ];

            array_push($_SESSION['cart'], $item);
        } else {
            $exist = false;
            $products = $_SESSION['cart'];

            foreach ($products as $index => $item) {
                if ($product_id == $item['product_id']) {
                    $products[$index]['quantity'] = $item['quantity'] + $quantity;
                    $exist = true;
                }
            }


            if ($exist == false) {
                $item = [
                    'product_id' => $product_id,
                    'quantity' => $quantity
                ];

                array_push($products, $item);
            }

            $_SESSION['cart'] = $products;
        }
    }

    public function edit_product_cart($product_id, $quantity)
    {
    }

    public function delete_product_cart($product_id)
    {
        $products_cart = [];

        if (array_key_exists('cart', $_SESSION) == false) {
            $products_cart = [];
        } else {
            $cart = $_SESSION['cart']?? [];
            foreach ($cart as $item) {
              if($item['product_id']!= $product_id)
              {
                  array_push($products_cart, $item);
              }
            }

            $_SESSION['cart'] = $products_cart;
        }

        return $products_cart;
    }

    public function delete_all_products_cart()
    {
        if (array_key_exists('cart', $_SESSION) == true) {
           $_SESSION['cart'] = [];
        } 
    }

    public function get_subtotal_products_cart($products)
    {
        $total = 0;

        foreach ($products as $p)
            $total += $p->sale_price * $p->cart_quantity;

        return $total;
    }
}
