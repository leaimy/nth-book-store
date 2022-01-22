<?php

namespace BookStore;

use BookStore\Controller\Admin\AuthorController;
use BookStore\Controller\Admin\CategoryController;
use BookStore\Controller\Admin\DashboardController;
use BookStore\Controller\Client\HomeController;
use BookStore\Controller\Client\ProfileController;
use BookStore\Entity\Admin\CategoryEntity;
use BookStore\Model\Admin\CategoryModel;
use Ninja\DatabaseTable;
use Ninja\NJInterface\IRoutes;

class BookStoreRouteHandler implements IRoutes
{
    // Tạo các trường DatabaseTable
    private $admin_category_table;

    // Tạo các trường Models
    private $admin_category_model;

    public function __construct()
    {
        $this->admin_category_table = new DatabaseTable(CategoryEntity::TABLE, CategoryEntity::PRIMARY_KEY, CategoryEntity::CLASS_NAME);
        $this->admin_category_model = new CategoryModel($this->admin_category_table);
    }

    public function getRoutes(): array
    {
        /*
         * Client
         */
        $home_controller = new HomeController();
        $profile_controller = new  ProfileController();

        /*
         * Admin
         */
        $dashboard_controller = new DashboardController();
        $category_controller = new CategoryController($this->admin_category_model);
        $author_controller = new AuthorController();

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
            
            // Author => tác giả
            '/admin/author' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'index'
                ]
            ],
            '/admin/author/create' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'create'
                ],
                'POST' => [
                    'controller' => $category_controller,
                    'action' => 'store'
                ],
            ],
            '/admin/author/edit' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'edit'
                ],
                'POST' => [
                    'controller' => $category_controller,
                    'action' => 'update'
                ],
            ],
            '/admin/author/delete' => [
                'GET' => [
                    'controller' => $category_controller,
                    'action' => 'delete'
                ],
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
