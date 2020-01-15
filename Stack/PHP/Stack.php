<?php declare(strict_types = 1);

class Stack {

    protected array $stack;
    protected int $capacity;
    protected int $size;
    protected string $itemType;

    public function __construct(int $capacity, string $itemType = '') {

        if ($capacity <= 0) {
            throw new InvalidArgumentException('Capacity should be greater than 0.');
        }

        $this->stack = [];
        $this->size = 0;
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

    public function print() {
        var_dump($this->stack);
    }

    public function push($item): void {

        if (!$this->isValidType($item)) {
            throw new InvalidArgumentException('Expecting ' . $this->itemType . ', but got ' . gettype($item) . '.');
        }

        if ($this->isFull()) {
            throw new RuntimeException('The Stack is overflow. It is impossible to add new element');
        }

        $this->stack[] = $item;
        $this->size++;

    }

    public function pop()  {

        if ($this->isEmpty()) {
            throw new RuntimeException('The Stack is empty. It is impossible to remove element.');
        }

        $item = $this->stack[$this->size - 1];
        unset($this->stack[$this->size--]);
        return $item;

    }

    public function peek() {

        if ($this->isEmpty()) {
            return null;
        }

        return $this->stack[$this->size - 1];

    }

}
