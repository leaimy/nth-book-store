<?php
namespace BookStore\Entity\Admin;


class CategoryEntity
{
    const PRIMARY_KEY = 'id';
    const TABLE = 'categories';
    const CLASS_NAME = '\\BookStore\\Entity\\Admin\\CategoryEntity';

    const KEY_ID = 'id';
    const KEY_NAME = 'name';
    const KEY_DESCRIPTION = 'description';
    const KEY_CREATED_AT = 'created_at';

    public $id;
    public $name;
    public $description;
    public $created_at;
}
