<?php

class Proyecto {
    private $id;
    private $nombre;
    private $tema;
    private $personaId;  // Relación: Un proyecto pertenece a una persona

    // Constructor y métodos de acceso (getters y setters) según sea necesario

    public function __construct($id, $nombre, $tema, $personaId) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this ->tema =$tema;
        $this->personaId = $personaId;
    }

    // Otros métodos para operaciones CRUD
}
