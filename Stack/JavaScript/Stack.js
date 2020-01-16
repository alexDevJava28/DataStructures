'use strict';

class Stack {

    constructor() {
        this.stack = [];
        this.top = 0;
    }

    push(item) {
        this.stack[this.top++] = item;
    }

    length() {
        return this.top;
    }

    peek() {
        return this.stack[this.top - 1];
    }

    isEmpty() {
        return this.top === 0;
    }

    pop() {

        if (this.isEmpty()) {
            console.log('The Stack is empty. It is impossible to remove element.');
            return;
        }

        --this.top;
        return this.stack.pop();
    }

    print() {

        let top = this.top - 1;

        while (top >= 0) {
            console.log(this.stack[top]);
            top--;
        }

    }

}