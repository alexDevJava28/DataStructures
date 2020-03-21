<?php declare(strict_types = 1);

class Node {

    public $value;
    public ?Node $nextNode = null;

}

class Queue {

    public const MIN_CAPACITY = 1;

    private Node $firstNode;
    private Node $lastNode;
    private int $capacity = self::MIN_CAPACITY;
    private int $size = 0;
    private string $itemType;

    private array $allowedItemTypes = [
        'boolean',
        'integer',
        'double',
        'string',
        'array',
        'object',
        'NULL',
    ];

    public function __construct(int $capacity, string $itemType) {

        if ($capacity <= 0) {
            throw new InvalidArgumentException('Capacity should be greater than 0.');
        }

        if (empty($itemType) && !in_array(gettype($itemType), $this->allowedItemTypes)) {
            throw new InvalidArgumentException('Please, choose the correct itemType.');
        }

        $this->capacity = $capacity;
        $this->itemType = $itemType;

    }

    public function size(): int {

        return $this->size;

    }

    public function isEmpty(): bool {

        return $this->size <= 0;

    }

    public function isFull(): bool {

        return $this->size >= $this->capacity;

    }

    public function isValidType($item): bool {

        return gettype($item) === $this->itemType;

    }

    public function enqueue($item): void {

        if (!$this->isValidType($item)) {
            throw new InvalidArgumentException('Expecting ' . $this->itemType . ', but got ' . gettype($item) . '.');
        }

        if ($this->isFull()) {
            throw new RuntimeException('The Queue is overflow. It is impossible to enqueue new element');
        }

        $newNode = new Node();
        $newNode->value = $item;

        if ($this->isEmpty()) {
            $this->firstNode = $newNode;
            $this->lastNode = $newNode;
        } else {
            $this->lastNode->nextNode = $newNode;
            $this->lastNode = $newNode;
        }

        $this->size++;

    }

    public function dequeue() {

        if ($this->isEmpty()) {
            throw new RuntimeException('The Queue is empty. It is impossible to dequeue element.');
        }

        $item = $this->firstNode->value;

        $this->firstNode = $this->firstNode->nextNode;

        $this->size--;

        return $item;

    }

    public function print(): void {

        if ($this->isEmpty()) {
            echo 'The current Queue is empty.' . PHP_EOL;
        }

        $loopNode = $this->firstNode;
        $counter = 1;

        while($loopNode !== null) {
            
            echo $counter . '. ' . $loopNode->value . ';' . PHP_EOL;

            $loopNode = $loopNode->nextNode;
            $counter++;

        }        

    }

}