<?php

namespace controllers;

use core\TemplateEngine;
use model\Database;
use model\SurveyModel;

class SurveyController {
    private $conn;

    // Constructor que acepta la conexión como parámetro
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public static function save() {
        $docente = $_POST['docente'] ?? '';
        $p1 = (int) ($_POST['pregunta1'] ?? 0);
        $p2 = (int) ($_POST['pregunta2'] ?? 0);
        $p3 = (int) ($_POST['pregunta3'] ?? 0);
        $comentarios = $_POST['comentarios'] ?? '';
        $conn = Database::getConnection();
        $model = new SurveyModel($conn);
        [$success, $message] = $model->save($docente, $p1, $p2, $p3, $comentarios);

        $response = (object)[
            'success' => $success,
            'message' => $message,
            'data' => []
        ];

        TemplateEngine::render("response", ['response' => $response]);
    }
    public static function add() {
        TemplateEngine::render("survey_add");
    }
}
