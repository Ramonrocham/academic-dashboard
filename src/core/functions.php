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

function dump(...$vars){
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
}

function dotenv($key){
    $env = [];
    $lines = file(__DIR__. '/../../.env');
    foreach($lines as $line){
        $line = trim($line);
        if(empty($line) || str_starts_with($line, '#')){
            continue;
        }
        $parts = explode ('=', $line);
        if(count($parts) < 2){
            continue;
        }
        $newKey = trim($parts[0]);
        $value = trim($parts[1]);
        $env = [... $env, $newKey => $value];
    }
    
    return $env[$key] ?? null;
}