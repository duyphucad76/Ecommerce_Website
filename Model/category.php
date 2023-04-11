<?php
class category {
    
    public function getAllCategory()
    {
        $db = new connect();
        $select = "SELECT * FROM categories";
        $result = $db->getList($select);
        return $result;
    }
    
    public function getCategoryById($id)
    {
        $db = new connect();
        $select = "SELECT * FROM categories WHERE id = $id";
        $result = $db->getSingle($select);
        return $result;
    }
    public function updateCategoryById($id, $name) {
        
    }
}
