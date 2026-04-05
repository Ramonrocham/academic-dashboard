<?php

function dd(...$vars){
    echo '<pre style="background-color: #f5f5f5; padding: 10px; margin: 10px 5px; border-radius: 5px;">';
    echo "<strong>Debug Output:</strong> <br>";
    foreach ($vars as $var) {
        echo '<pre style="background-color: #d1d1d1; color: #333; padding: 10px; margin: 10px 5px; border-radius: 5px;">';
        var_dump($var);
        echo '</pre>';
    }
    $backtrace = debug_backtrace()[0];
    echo "Arquivo: " . $backtrace['file'] . "<br>";
    echo "Linha: " . $backtrace['line'] . "<br>";
    echo "</pre>";
    die();
}