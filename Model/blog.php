<?php
class blog
{
    public function getAllBlogs()
    {
        $db = new connect();
        $select = 'SELECT * FROM BLOGS';
        $result = $db->getList($select);
        return $result;
    }
    public function getABlog($blog_id)
    {
        $db = new connect();
        $select = 'SELECT * FROM BLOGS WHERE blog_id = ' . $blog_id;
        $result = $db->getSingle($select);
        return $result;
    }
}
