<?php

namespace BookStore;

use BookStore\Controller\Admin\AuthorController;
use BookStore\Controller\Admin\CategoryController;
use BookStore\Controller\Admin\DashboardController;
use BookStore\Controller\Admin\ProductController;
use BookStore\Controller\Admin\UserController;
use BookStore\Controller\Client\AuthController;
use BookStore\Controller\Client\HomeController;
use BookStore\Controller\Client\ProductClientController;
use BookStore\Controller\Client\ProfileController;
use BookStore\Controller\Client\CartController;
use BookStore\Controller\Client\CheckoutController;
use BookStore\Entity\Admin\AuthorEntity;
use BookStore\Entity\Admin\CategoryEntity;
use BookStore\Entity\Admin\MediaEntity;
use BookStore\Entity\Admin\ProductEntity;
use BookStore\Entity\Admin\UserEntity;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\MediaModel;
use BookStore\Model\Admin\ProductModel;
use BookStore\Model\Admin\UserModel;
use BookStore\Controller\BookStoreBaseController;
use Ninja\Authentication;
use Ninja\DatabaseTable;
use Ninja\NJInterface\IRoutes;

class BookStoreRouteHandler implements IRoutes
{
    // Tạo các trường DatabaseTable
    private $admin_category_table;
    private $admin_author_table;
    private $admin_media_table;
    private $admin_product_table;
    private $admin_user_table;
    


    // Tạo các trường Models
    private $admin_category_model;
    private $admin_author_model;
    private $admin_media_model;
    private $admin_product_model;
    private $admin_user_model;


    private $authentication_helper;

    public function __construct()
    {
        $this->admin_category_table = new DatabaseTable(CategoryEntity::TABLE, CategoryEntity::PRIMARY_KEY, CategoryEntity::CLASS_NAME);
        $this->admin_category_model = new CategoryModel($this->admin_category_table);

        $this->admin_media_table = new DatabaseTable(MediaEntity::TABLE, MediaEntity::PRIMARY_KEY, MediaEntity::CLASS_NAME);
        $this->admin_media_model = new MediaModel($this->admin_media_table);

        $this->admin_author_table = new DatabaseTable(AuthorEntity::TABLE, AuthorEntity::PRIMARY_KEY, AuthorEntity::CLASS_NAME, [
            &$this->admin_media_model, &$this->admin_author_model
        ]);
        $this->admin_author_model = new AuthorModel($this->admin_author_table);

        $this->admin_product_table = new DatabaseTable(ProductEntity::TABLE, ProductEntity::PRIMARY_KEY, ProductEntity::CLASS_NAME, [
            &$this->admin_media_model, &$this->admin_product_model, &$this->admin_category_model, &$this->admin_author_model
        ]);
        $this->admin_product_model = new ProductModel($this->admin_product_table);

        $this->admin_user_table = new DatabaseTable(UserEntity::TABLE, UserEntity::PRIMARY_KEY, UserEntity::CLASS_NAME);
        $this->admin_user_model = new UserModel($this->admin_user_table);

        $this->authentication_helper = new Authentication($this->admin_user_table, UserEntity::KEY_EMAIL, UserEntity::KEY_PASSWORD);
    }

    public function required_login($routes): array
    {
        $results = [];

        foreach ($routes as $key => $route) {
            $item = $route;
            $item['login'] = true;

            $results[$key] = $item;
        }

        return $results;
    }

    public function restrict_admin($routes): array
    {
        $results = [];

        foreach ($routes as $key => $route) {
            $item = $route;
            $item['permissions'] = true;

            $results[$key] = $item;
        }

        return $results;
    }


    public function getRoutes(): array
    {
        $controller_routes = $this->get_all_controller_routes();
//        $api_routes = $this->get_all_api_routes();

//        return $controller_routes + $api_routes;
        return $controller_routes;
    }

    public function get_all_controller_routes(): array
    {
        $admin_dashboard_routes = $this->get_admin_dashboard_routes();
        $admin_category_routes = $this->get_admin_category_routes();
        $admin_author_routes = $this->get_admin_author_routes();
        $admin_product_routes = $this->get_admin_product_routes();
//        $admin_order_routes = $this->get_admin_order_routes();
        $admin_user_routes = $this->get_admin_user_routes();

        $client_routes = $this->get_client_routes();
        $auth_routes = $this->get_auth_routes();

        /**
         * Login required
         */

        $admin_dashboard_routes = $this->required_login($admin_dashboard_routes);
        $admin_category_routes = $this->required_login($admin_category_routes);
        $admin_author_routes = $this->required_login($admin_author_routes);
        $admin_product_routes = $this->required_login($admin_product_routes);
        //$admin_order_routes = $this->required_login($admin_order_routes);
        $admin_user_routes = $this->required_login($admin_user_routes);

        /**
         * Restrict only admin user
         */
        $admin_dashboard_routes = $this->restrict_admin($admin_dashboard_routes);
        $admin_category_routes = $this->restrict_admin($admin_category_routes);
        $admin_author_routes = $this->restrict_admin($admin_author_routes);
        $admin_product_routes = $this->restrict_admin($admin_product_routes);
        //$admin_order_routes = $this->restrict_admin($admin_order_routes);
        $admin_user_routes = $this->restrict_admin($admin_user_routes);
        
        return $client_routes +
            $admin_dashboard_routes +
            $admin_category_routes +
            $admin_author_routes +
            $admin_product_routes +
            //$admin_order_routes +
            $admin_user_routes +
            $auth_routes;
    }

//    public function get_all_api_routes(): array
//    {
//        
//    }

    public function get_client_routes(): array
    {
        $home_controller = new HomeController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $profile_controller = new  ProfileController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $product_client_controller = new  ProductClientController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $cart_client_controller = new CartController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $checkout_client_controller = new CheckoutController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        
        return [
            '/' => [
                'GET' => [
                    'controller' => $home_controller,
                    'action' => 'render_home_page'
                ]
            ],
            '/my-profile' => [
                'GET' => [
                    'controller' => $profile_controller,
                    'action' => 'render_profile_dashboard_page'
                ],


            ],
            '/product/product-detail' => [
                'GET' => [
                    'controller' => $product_client_controller,
                    'action' => 'render_product_detail_page'
                ]
            ],
            '/product/product-all' => [
                'GET' => [
                    'controller' => $product_client_controller,
                    'action' => 'render_product_all_page'
                ]
            ],
            '/product/category' => [
                'GET' => [
                    'controller' => $product_client_controller,
                    'action' => 'render_product_by_category_page'
                ]
            ],
            '/product/author' => [
                'GET' => [
                    'controller' => $product_client_controller,
                    'action' => 'render_product_by_author_page'
                ]
            ],
            '/cart/add' => [
                'POST' => [
                    'controller' => $cart_client_controller,
                    'action' => 'add_to_cart'
                ]
            ],
           
            '/cart/viewcart' => [
                'GET' => [
                    'controller' => $cart_client_controller,
                    'action' => 'render_viewcart'
                ]
            ],

            '/api/v1/cart/delete' => [
                'POST' => [
                    'controller' => $cart_client_controller,
                    'action' => 'delete_product_cart'
                ]
            ],

            '/cart/delete-all' => [
                'GET' => [
                    'controller' => $cart_client_controller,
                    'action' => 'delete_cart'
                ]
            ],

            '/cart/update' => [
                'POST' => [
                    'controller' => $cart_client_controller,
                    'action' => 'update_cart'
                ]
            ],

            '/checkout' => [
                'GET' => [
                    'controller' => $checkout_client_controller,
                    'action' => 'render_checkout'
                ]
            ],

            '/api/v1/checkout/get-province' => [
                'GET' => [
                    'controller' => $checkout_client_controller,
                    'action' => 'get_province'
                ]
            ],

            '/api/v1/checkout/get-province-detail' => [
                'GET' => [
                    'controller' => $checkout_client_controller,
                    'action' => 'get_province_detail'
                ]
            ],
            
        ];
    }

    public function get_auth_routes(): array
    {
        $auth_controller = new AuthController($this->authentication_helper, $this->admin_user_model, $this->admin_category_model, $this->admin_author_model, $this->admin_product_model);

        return [
            '/auth/sign-in' => [
                'GET' => [
                    'controller' => $auth_controller,
                    'action' => 'sign_in'
                ],
                'POST' => [
                    'controller' => $auth_controller,
                    'action' => 'process_sign_in'
                ]
            ],
            '/auth/sign-up' => [
                'GET' => [
                    'controller' => $auth_controller,
                    'action' => 'sign_up'
                ],
                'POST' => [
                    'controller' => $auth_controller,
                    'action' => 'process_register'
                ]
            ],
            '/auth/logout' => [
                'GET' => [
                    'controller' => $auth_controller,
                    'action' => 'log_user_out'
                ]
            ]
        ];
    }

    public function get_admin_dashboard_routes(): array
    {
        $dashboard_controller = new DashboardController();
        return [
            '/admin' => [
                'REDIRECT' => '/admin/dashboard',
               
            ],
            '/admin/dashboard' => [
                'GET' => [
                    'controller' => $dashboard_controller,
                    'action' => 'index'
                ],
            ],
        ];
        
    }

    public function get_admin_category_routes(): array
    {
        $category_controller = new CategoryController($this->admin_category_model);
        return [
            // Category => thể loại
            '/admin/category' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'index'
                ],
            ],
            '/admin/category/create' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'create'
                ],
                'POST' => [
                    'controller' => $category_controller,
                    'action' => 'store'
                ],
            ],
            '/admin/category/edit' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $category_controller,
                    'action' => 'update'
                ],
            ],
            '/admin/category/delete' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'delete'
                ],
            ],
            '/api/v1/admin/category/store' => [
                'POST' => [
                    'controller' => $category_controller,
                    'action' => 'store_api'
                ],
            ],
        ];
    }

    public function get_admin_author_routes(): array
    {
        $author_controller = new AuthorController($this->admin_author_model, $this->admin_media_model);
        return [
            // Author => tác giả
            '/admin/author' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'index'
                ],
            ],
            '/admin/author/create' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'create'
                ],
                'POST' => [
                    'controller' => $author_controller,
                    'action' => 'store'
                ],
            ],
            '/admin/author/edit' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $author_controller,
                    'action' => 'update'
                ],
            ],
            '/admin/author/delete' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'delete'
                ],
            ],
            '/api/v1/admin/author/store' => [
                'POST' => [
                    'controller' => $author_controller,
                    'action' => 'store_api'
                ],
            ],
            '/api/v1/admin/author/get-all' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'get_all'
                ],
            ],
            
        ];
    }

    public function get_admin_product_routes(): array
    {
        $product_controller = new ProductController($this->admin_media_model, $this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        return [
            // Product => sản phẩm sách
            '/admin/product' => [
                'GET' => [
                    'controller' => $product_controller,
                    'action' => 'index'
                ],
                'login' => true
            ],
            '/admin/product/create' => [
                'GET' => [
                    'controller' => $product_controller,
                    'action' => 'create'
                ],
                'POST' => [
                    'controller' => $product_controller,
                    'action' => 'store'
                ],
                'login' => true
            ],
            '/admin/product/edit' => [
                'GET' => [
                    'controller' => $product_controller,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $product_controller,
                    'action' => 'update'
                ],
                'login' => true
            ],
            '/admin/product/delete' => [
                'GET' => [
                    'controller' => $product_controller,
                    'action' => 'delete'
                ],
                'login' => true
            ],
        ];
    }

//    public function get_admin_order_routes(): array
//    {
//        
//    }

    public function get_admin_user_routes(): array
    {
        $user_controller = new UserController($this->admin_user_model, $this->admin_category_model, $this->admin_author_model, $this->admin_product_model, $this->authentication_helper);
        return [
            //User => Người dùng
            '/admin/user/store' => [
                'POST' => [
                    'controller' => $user_controller,
                    'action' => 'store'
                ],
            ],
            '/admin/user/signin' => [
                'POST' => [
                    'controller' => $user_controller,
                    'action' => 'signin'
                ],
            ],
            '/admin/user/signout' => [
                'GET' => [
                    'controller' => $user_controller,
                    'action' => 'signout'
                ],
            ],
        ];
    }

    public function getAuthentication(): ?\Ninja\Authentication
    {
        return $this->authentication_helper;
    }

    public function checkPermission($permission): ?bool
    {
        $user = $this->authentication_helper->getUser();

        if (!($user instanceof UserEntity))
            return false;

        return $user->{UserEntity::KEY_USER_TYPE} =='ADMIN';
    }

    public function getBaseController()
    {
        return new BookStoreBaseController();
    }
}
