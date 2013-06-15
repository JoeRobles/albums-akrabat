<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract {

    protected $_name = 'albums';

    /**
     * Retrieves a single row as an array
     * 
     * @param integer $id
     * @return array
     * @throws Exception
     */
    public function getAlbum($id)
    {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        
        return $row->toArray();
    }

    /**
     * Creates a new row in the database
     * 
     * @param string $artist
     * @param string $title
     */
    public function addAlbum($artist, $title)
    {
        $data = array(
            'artist' => $artist,
            'title' => $title,
        );
        
        $this->insert($data);
    }

    /**
     * Updates an album row
     * 
     * @param integer $id
     * @param string $artist
     * @param string $title
     */
    public function updateAlbum($id, $artist, $title)
    {
        $data = array(
            'artist' => $artist,
            'title' => $title,
        );
        
        $this->update($data, 'id = ' . (int) $id);
    }

    /**
     * Removes the row completely
     * 
     * @param integer $id
     */
    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int) $id);
    }
}