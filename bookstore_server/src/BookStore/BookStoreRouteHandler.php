<?php

namespace BookStore;

use BookStore\Controller\Admin\AuthorController;
use BookStore\Controller\Admin\CategoryController;
use BookStore\Controller\Admin\DashboardController;
use BookStore\Controller\Admin\ProductController;
use BookStore\Controller\Admin\UserController;
use BookStore\Controller\Client\HomeController;
use BookStore\Controller\Client\ProductClientController;
use BookStore\Controller\Client\ProfileController;
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
    }

    public function getRoutes(): array
    {
        /*
         * Client
         */
        $home_controller = new HomeController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $profile_controller = new  ProfileController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $product_client_controller = new  ProductClientController($this->admin_product_model, $this->admin_category_model, $this->admin_author_model);

        /*
         * Admin
         */
        $dashboard_controller = new DashboardController();
        $category_controller = new CategoryController($this->admin_category_model);
        $author_controller = new AuthorController($this->admin_author_model, $this->admin_media_model);
        $product_controller = new ProductController($this->admin_media_model, $this->admin_product_model, $this->admin_category_model, $this->admin_author_model);
        $user_controller = new UserController($this->admin_user_model, $this->admin_category_model, $this->admin_author_model, $this->admin_product_model);

        return [
            /*
             * Client
             */
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
            '/signin' => [
                'GET' => [
                    'controller' => $profile_controller,
                    'action' => 'render_signin_page'
                ],
            ],
            '/signup' => [
                'GET' => [
                    'controller' => $profile_controller,
                    'action' => 'render_signup_page'
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


            /*
             * Admin
             */
            '/admin' => [
                'REDIRECT' => '/admin/dashboard'
            ],
            '/admin/dashboard' => [
                'GET' => [
                    'controller' => $dashboard_controller,
                    'action' => 'index'
                ]
            ],

            // Category => thể loại
            '/admin/category' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'index'
                ]
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


            // Author => tác giả
            '/admin/author' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'index'
                ]
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
                'login' => true
            ],
            '/admin/author/delete' => [
                'GET' => [
                    'controller' => $author_controller,
                    'action' => 'delete'
                ],
                'login' => true
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

            //User => Người dùng
            '/admin/user/store' => [
                'POST' => [
                    'controller' => $user_controller,
                    'action' => 'store'
                ],
                'login' => true
            ],
            '/admin/user/signin' => [
                'POST' => [
                    'controller' => $user_controller,
                    'action' => 'signin'
                ],
                'login' => true
            ],
        ];
    }

    public function getAuthentication(): ?\Ninja\Authentication
    {
        return null;
    }

    public function checkPermission($permission): ?bool
    {
        return null;
    }
}
