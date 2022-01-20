<?php

namespace BookStore;

use BookStore\Controller\Client\HomeController;
use BookStore\Controller\Client\ProfileController;
use Ninja\NJInterface\IRoutes;

class BookStoreRouteHandler implements IRoutes
{
    // Tạo các trường DatabaseTable
    
    // Tạo các trường Models
    
    public function __construct()
    {
    }

    public function getRoutes(): array
    {
        $home_controller = new HomeController();
        $profile_controller = new  ProfileController();
        
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
                ]
            ]
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
