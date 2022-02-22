<?php


namespace BookStore\Model\Admin;


use BookStore\Entity\Admin\UserEntity;
use Ninja\DatabaseTable;

class UserModel
{
    private $user_table;

    public function __construct(DatabaseTable $user_table)
    {
        $this->user_table = $user_table;
    }

    public function create_new_user($args)
    {
        return $this->user_table->save([
            UserEntity::KEY_FIRSTNAME => $args[UserEntity::KEY_FIRSTNAME],
            UserEntity::KEY_LASTNAME => $args[UserEntity::KEY_LASTNAME],
            UserEntity::KEY_USERNAME => $args[UserEntity::KEY_USERNAME],
            UserEntity::KEY_EMAIL => $args[UserEntity::KEY_EMAIL],
            UserEntity::KEY_PASSWORD => $args[UserEntity::KEY_PASSWORD],
            UserEntity::KEY_PHONENUMBER => $args[UserEntity::KEY_PHONENUMBER],
            UserEntity::KEY_STREET => $args[UserEntity::KEY_STREET] ?? null,
            UserEntity::KEY_VILLAGE => $args[UserEntity::KEY_VILLAGE] ?? null,
            UserEntity::KEY_DISTRICT => $args[UserEntity::KEY_DISTRICT] ?? null,
            UserEntity::KEY_PROVINCE => $args[UserEntity::KEY_PROVINCE] ?? null,
        ]);
    }
    
    public function signin($email,$password)
    {
        $results = $this->user_table->find(UserEntity::KEY_EMAIL, $email);
        
        if (count($results) == 0) return null;
        
        $user_account = $results[0];
        
        if ($user_account->{UserEntity::KEY_PASSWORD} == $password) return $user_account;
        
        return null;
    }
}
