'use strict';

export class Node {

    item: any;
    nextNode: Node;

}

export class Queue {

    front: Node;
    rear: Node;
    capacity: number;
    size: number;

    constructor(capacity: number) {

        if (capacity <= 0) {
            console.log('Capacity should be greater than 0.');
            return;
        }

        this.capacity = capacity;
        this.size = 0;

    }

    length(): number {
        return this.size;
    }

    isEmpty(): boolean {
        return this.length() === 0;
    }

    isFull(): boolean {
        return this.length() >= this.capacity;
    }

    enqueue(item: any): void {

        if (this.isFull()) {
            console.log('The Queue is overflow. It is impossible to enqueue new element.');
            return;
        }

        let temp = new Node;
        temp.item = item;

        if (this.isEmpty()) {
            this.front = this.rear = temp;        
        } else {
            this.rear.nextNode = temp;
            this.rear = temp;
        }

        this.size++;

    }

    dequeue(): number {

        if (this.isEmpty()) {
            console.log('The Queue is empty. It is impossible to dequeue element.');
            return 0;
        }

        const item = this.front.item;

        this.front = this.front.nextNode;

        if (this.front === null) {
            this.rear = null;
        }

        this.size--;

        return item;
    }

    print(): void {

        if (this.isEmpty()) {
            console.log('The Queue is empty. Nothing to print.');
            return;
        }

        let temp = this.front;
        let counter = 1;

        while (temp) {
            console.log(counter + '. ' + temp.item);
            temp = temp.nextNode;
            counter++;
        }

    }

}