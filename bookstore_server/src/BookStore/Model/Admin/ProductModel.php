<?php


namespace BookStore\Model\Admin;


use BookStore\Entity\Admin\ProductEntity;
use Ninja\DatabaseTable;
use Ninja\NinjaException;

class ProductModel
{
    private $product_table;
    
    public function __construct(DatabaseTable $product_table)
    {
        $this->product_table = $product_table;
    }
    
    public function get_all_product()
    {
        return $this->product_table->findAll();
    }
    
    public function get_by_id_product($id)
    {
        return $this->product_table->findById($id);
    }

    public function create_new_product($args)
    {
        if (empty($args[ProductEntity::KEY_NAME]))
            throw new NinjaException('Vui lòng nhập tên sách');
        if (empty($args[ProductEntity::KEY_UNIT_PRICE]))
            throw new NinjaException('Vui lòng nhập giá nhập');
        if (empty($args[ProductEntity::KEY_SALE_PRICE]))
            throw new NinjaException('Vui lòng nhập giá bán');
        if (empty($args[ProductEntity::KEY_QUANTITY]))
            throw new NinjaException('Vui lòng nhập số lượng');

        return $this->product_table->save([
            ProductEntity::KEY_NAME => $args[ProductEntity::KEY_NAME],
            ProductEntity::KEY_CATEGORY_ID => $args[ProductEntity::KEY_CATEGORY_ID],
            ProductEntity::KEY_AUTHOR_ID => $args[ProductEntity::KEY_AUTHOR_ID],
            ProductEntity::KEY_SALE_PRICE => $args[ProductEntity::KEY_SALE_PRICE],
            ProductEntity::KEY_UNIT_PRICE => $args[ProductEntity::KEY_UNIT_PRICE],
            ProductEntity::KEY_QUANTITY => $args[ProductEntity::KEY_QUANTITY],
            ProductEntity::KEY_DESCRIPTION => $args[ProductEntity::KEY_DESCRIPTION] ?? null,
            ProductEntity::KEY_MEDIA_ID => $args[ProductEntity::KEY_MEDIA_ID] ?? null,
        ]);
    }

    public function update_product($id, $args)
    {
        if (isset($args[ProductEntity::KEY_MEDIA_ID])) {
            return $this->product_table->save([
                ProductEntity::KEY_ID => $id,
                ProductEntity::KEY_NAME => $args[ProductEntity::KEY_NAME],
                ProductEntity::KEY_CATEGORY_ID => $args[ProductEntity::KEY_CATEGORY_ID],
                ProductEntity::KEY_AUTHOR_ID => $args[ProductEntity::KEY_AUTHOR_ID],
                ProductEntity::KEY_SALE_PRICE => $args[ProductEntity::KEY_SALE_PRICE],
                ProductEntity::KEY_UNIT_PRICE => $args[ProductEntity::KEY_UNIT_PRICE],
                ProductEntity::KEY_QUANTITY => $args[ProductEntity::KEY_QUANTITY],
                ProductEntity::KEY_DESCRIPTION => $args[ProductEntity::KEY_DESCRIPTION] ?? null,
                ProductEntity::KEY_MEDIA_ID => $args[ProductEntity::KEY_MEDIA_ID] ?? null,
            ]);
        }

        return $this->product_table->save([
            ProductEntity::KEY_ID => $id,
            ProductEntity::KEY_NAME => $args[ProductEntity::KEY_NAME],
            ProductEntity::KEY_CATEGORY_ID => $args[ProductEntity::KEY_CATEGORY_ID],
            ProductEntity::KEY_AUTHOR_ID => $args[ProductEntity::KEY_AUTHOR_ID],
            ProductEntity::KEY_SALE_PRICE => $args[ProductEntity::KEY_SALE_PRICE],
            ProductEntity::KEY_UNIT_PRICE => $args[ProductEntity::KEY_UNIT_PRICE],
            ProductEntity::KEY_QUANTITY => $args[ProductEntity::KEY_QUANTITY],
            ProductEntity::KEY_DESCRIPTION => $args[ProductEntity::KEY_DESCRIPTION] ?? null,
        ]);
    }

    public function delete_product($id)
    {
        $this->product_table->delete($id);
    }

    public function random_product($number)
    {
        $sql = "SELECT * FROM products
                ORDER BY RAND()
                LIMIT $number";
        
        return $this->product_table->raw($sql, DatabaseTable::FETCH_RAW_MULTIPLE);
    }
    
    
    
    public function random_product_by_category($id, $number)
    {
        $sql = "SELECT * FROM categories INNER JOIN products ON categories.id = products.category_id
                WHERE categories.id = $id
                ORDER BY RAND()
                LIMIT $number";

        return $this->product_table->raw($sql, DatabaseTable::FETCH_RAW_MULTIPLE);
    }

    public function random_product_by_author($id, $number)
    {
        $sql = "SELECT * FROM authors INNER JOIN products ON authors.id = products.author_id
                WHERE authors.id = $id
                ORDER BY RAND()
                LIMIT $number";

        return $this->product_table->raw($sql, DatabaseTable::FETCH_RAW_MULTIPLE);
    }
}
