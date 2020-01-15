<?php declare(strict_types = 1);

require_once 'Stack.php';

$stack = new Stack(10, 'integer');

echo 'Stack size at the beginning - ' . $stack->size();

for($i = 10; $i > 0; $i--) {
    //get random number from 0 to 10000
    $randomNumber = rand(0, 10000);
    echo 'Inserting ' . $randomNumber . PHP_EOL;
    $stack->push($randomNumber);
}

$stack->print();

echo 'Pop element ' . $stack->pop() . PHP_EOL;

$stack->print();

echo 'Stack size at in the end - ' . $stack->size();

echo 'Inserting 10001 in full Stack' . PHP_EOL;
$stack->push(10001);