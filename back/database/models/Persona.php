<?php

class Persona {
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $proyectos;  // Relación: Una persona tiene muchos proyectos

    // Constructor y métodos de acceso (getters y setters) según sea necesario

    public function __construct($id, $nombre , $email , $clave) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->proyectos = array();  // Inicializar la relación
    }

    public function agregarProyecto($proyecto) {
        $this->proyectos[] = $proyecto;
    }

    // Otros métodos para operaciones CRUD
}
