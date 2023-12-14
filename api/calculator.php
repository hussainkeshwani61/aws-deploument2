<?php

class Calculator {
    public function add($a, $b) {
        return $a + $b;
    }

    public function subtract($a, $b) {
        return $a - $b;
    }

    public function multiply($a, $b) {
        return $a * $b;
    }

    public function divide($a, $b) {
        if ($b != 0) {
            return $a / $b;
        } else {
            return "Cannot divide by zero.";
        }
    }
}

// Check if the necessary parameters are provided
if (isset($_GET['operation']) && isset($_GET['a']) && isset($_GET['b'])) {
    $calculator = new Calculator();
    $operation = $_GET['operation'];
    $a = $_GET['a'];
    $b = $_GET['b'];

    switch ($operation) {
        case 'add':
            $result = $calculator->add($a, $b);
            break;
        case 'subtract':
            $result = $calculator->subtract($a, $b);
            break;
        case 'multiply':
            $result = $calculator->multiply($a, $b);
            break;
        case 'divide':
            $result = $calculator->divide($a, $b);
            break;
        default:
            $result = "Invalid operation.";
    }

    echo json_encode(['result' => $result]);
} else {
    echo json_encode(['error' => 'Missing parameters.']);
}
