<?php

class Cour extends Model {
    public static function getAll() {
        $db = new Database();
        $query = "SELECT * FROM cours ";
        $data = $db->query($query, [], "assoc");
        return $data;
    }
    
    public static function getArchived() {
        $db = new Database();
        $query = "SELECT * FROM cours  WHERE archived = 1";
        $data = $db->query($query, [], "assoc");
        return $data;
    }
    public static function getDesarchived() {
        $db = new Database();
        $query = "SELECT * FROM cours WHERE archived = 0";
        $data = $db->query($query, [], "assoc");
        return $data;
    }

    public static function archiveById($id) {
        $db = new Database();
        $query = "UPDATE cours SET archived = 1 WHERE IdCours = ?";
        $db->query($query, [$id], "assoc");
    }

    public static function desarchiveById($id){
        $db = new Database();
        $query = "UPDATE cours SET archived = 0 WHERE IdCours = ?";
        $db->query($query, [$id], "assoc");
    }
}