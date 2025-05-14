<?php

namespace model;

class SurveyModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function save($docente, $p1, $p2, $p3, $comentarios) {
        $stmt = $this->conn->prepare(
            "INSERT INTO respuestas (docente, pregunta1, pregunta2, pregunta3, comentarios) 
             VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("siiis", $docente, $p1, $p2, $p3, $comentarios);

        if ($stmt->execute()) {
            return [true, "Gracias por enviar tu evaluación."];
        } else {
            return [false, "Error al guardar los datos: " . $stmt->error];
        }
    }
}
