<?php declare(strict_types = 1);

require_once 'Stack.php';

$itemsType = 'integer';
$capacity = 10;
$stack = new Stack($capacity, $itemsType);

echo 'Stack size at the beginning - ' . $stack->size() . PHP_EOL;

echo 'Inserting not ' . $itemsType . PHP_EOL;
try {
    $stack->push('Test');
} catch(InvalidArgumentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    echo 'Pop element ' . $stack->pop() . PHP_EOL;
} catch(RuntimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

for($i = $capacity; $i > 0; $i--) {
    $randomNumber = rand(0, 10000);
    echo 'Inserting ' . $randomNumber . PHP_EOL;
    $stack->push($randomNumber);
}

$stack->print();

echo 'Pop element ' . $stack->pop() . PHP_EOL;

$stack->print();

echo 'Inserting ' . 10001 . PHP_EOL;
$stack->push(10001);

$stack->print();
echo 'Stack size in the end - ' . $stack->size() . PHP_EOL;

try {
    echo 'Inserting 10002 in full Stack' . PHP_EOL;
    $stack->push(10002);
} catch(RuntimeException $exception) {
    echo $exception->getMessage();
}