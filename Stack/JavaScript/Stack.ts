'use strict';

export class Stack {

    stack: Array<number>;
    top: number;
    capacity: number;

    constructor(capacity: number) {

        if (capacity <= 0) {
            console.log('Capacity shoul be greater than 0.');
            return;
        }

        this.stack = [];
        this.top = 0;
        this.capacity = capacity;
    }

    length(): number {
        return this.top;
    }

    isEmpty(): boolean {
        return this.top === 0;
    }

    isFull(): boolean {
        return this.top >= this.capacity;
    }

    push(item: number): void {

        if (this.isFull()) {
            console.log('The Stack is overflow. It is impossible to add new element.');
            return;
        }

        this.stack[this.top++] = item;

    }

    pop(): number {

        if (this.isEmpty()) {
            console.log('The Stack is empty. It is impossible to remove element.');
            return 0;
        }

        --this.top;
        return this.stack.pop();
    }

    peek(): number {

        if (this.isEmpty()) {
            console.log('The Stack is empty. It is impossible to peek element.');
            return 0;
        }

        return this.stack[this.top - 1];
    }

    print(): void {

        let index = 0;

        while (index < this.top) {
            console.log(index + ': ' + this.stack[index]);
            index++;
        }

    }

}