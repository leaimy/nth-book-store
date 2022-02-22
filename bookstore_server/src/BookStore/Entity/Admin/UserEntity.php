<?php


namespace BookStore\Entity\Admin;


class UserEntity
{
    const PRIMARY_KEY = 'id';
    const TABLE = 'users';
    const CLASS_NAME = '\\BookStore\\Entity\\Admin\\UserEntity';

    const KEY_ID = 'id';
    const KEY_FIRSTNAME = 'firstname';
    const KEY_LASTNAME = 'lastname';
    const KEY_USERNAME = 'username';
    const KEY_EMAIL = 'email';
    const KEY_PASSWORD = 'password';
    const KEY_PHONENUMBER= 'phonenumber';
    const KEY_STREET = 'street';
    const KEY_VILLAGE = 'village';
    const KEY_DISTRICT = 'district';
    const KEY_PROVINCE = 'province';
    const KEY_TYPE = 'type';
    const KEY_CREATED_AT = 'created_at';
    
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $password;
    public $phonenumber;
    public $street;
    public $village;
    public $district;
    public $province;
    public $type;
    public $created_at;
}
