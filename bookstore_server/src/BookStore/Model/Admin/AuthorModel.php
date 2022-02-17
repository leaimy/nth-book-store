<?php


namespace BookStore\Model\Admin;


use BookStore\Entity\Admin\AuthorEntity;
use Ninja\DatabaseTable;

class AuthorModel
{
    private $author_table;

    public function __construct(DatabaseTable $author_table)
    {
        $this->author_table = $author_table;
    }

    public function get_all_author()
    {
        return $this->author_table->findAll();
    }
    
    public function get_by_id_author($id)
    {
        return $this->author_table->findById($id);
    }

    public function create_new_author($args)
    {
        if (empty($args[AuthorEntity::KEY_NAME]))
            throw new NinjaException('Vui lòng nhập tên thể loại');

        return $this->author_table->save([
            AuthorEntity::KEY_NAME => $args[AuthorEntity::KEY_NAME],
            AuthorEntity::KEY_DESCRIPTION => $args[AuthorEntity::KEY_DESCRIPTION] ?? null,
            AuthorEntity::KEY_MEDIA_ID => $args[AuthorEntity::KEY_MEDIA_ID] ?? null,
        ]);
    }

    public function update_author($id, $args)
    {
        if (isset($args[AuthorEntity::KEY_MEDIA_ID])) {
            return $this->author_table->save([
                AuthorEntity::KEY_ID => $id,
                AuthorEntity::KEY_NAME => $args[AuthorEntity::KEY_NAME],
                AuthorEntity::KEY_DESCRIPTION => $args[AuthorEntity::KEY_DESCRIPTION] ?? null,
                AuthorEntity::KEY_MEDIA_ID => $args[AuthorEntity::KEY_MEDIA_ID] ?? null,
            ]);
        }

        return $this->author_table->save([
            AuthorEntity::KEY_ID => $id,
            AuthorEntity::KEY_NAME => $args[AuthorEntity::KEY_NAME],
            AuthorEntity::KEY_DESCRIPTION => $args[AuthorEntity::KEY_DESCRIPTION] ?? null,
        ]);
    }

    public function delete_author($id)
    {
        $this->author_table->delete($id);
    }

    public function random_author($number)
    {
        $sql = "SELECT * FROM authors
                ORDER BY RAND()
                LIMIT $number";

        return $this->author_table->raw($sql, DatabaseTable::FETCH_RAW_MULTIPLE);
    }
}
