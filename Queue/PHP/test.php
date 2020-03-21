<?php declare(strict_types = 1);

require_once 'Queue.php';

$itemsType = 'integer';
$capacity = 10;
$queue = new Queue($capacity, $itemsType);

echo 'Queue size at the beginning - ' . $queue->size() . PHP_EOL;

echo 'Inserting not ' . $itemsType . PHP_EOL;

try {
    $queue->enqueue('Test');
} catch(InvalidArgumentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    echo 'Dequeue element ' . $queue->dequeue() . PHP_EOL;
} catch(RuntimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

for($i = $capacity; $i > 0; $i--) {
    $randomNumber = rand(0, 10000);
    echo 'Inserting ' . $randomNumber . PHP_EOL;
    $queue->enqueue($randomNumber);
}

$queue->print();

echo 'Dequeue element ' . $queue->dequeue() . PHP_EOL;

$queue->print();

echo 'Inserting ' . 10001 . PHP_EOL;
$queue->enqueue(10001);

$queue->print();
echo 'Queue size in the end - ' . $queue->size() . PHP_EOL;

try {
    echo 'Inserting 10002 in full Queue' . PHP_EOL;
    $queue->enqueue(10002);
} catch(RuntimeException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}