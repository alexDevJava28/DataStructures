'use strict';

import { Queue } from "./Queue";

let capacity = 5;
let queue = new Queue(capacity);

console.log('Queue size at the beginning - ', queue.length());

console.log('Dequeue element from empty Queue...');
queue.dequeue();

for(let i = capacity; i > 0; i--) {
    let randomNumber = Math.floor(Math.random() * 10000) + 1;
    console.log('Inserting ', randomNumber);
    queue.enqueue(randomNumber);
}

queue.print();

console.log('Dequeue element from the Queue...', queue.dequeue());

queue.print();

console.log('Inserting ', 10001);
queue.enqueue(10001);

queue.print();
console.log('Queue size in the end - ', queue.length());

console.log('Inserting ', 10002);

try {
    queue.enqueue(10002);
} catch(error) {
    console.error(error);
}