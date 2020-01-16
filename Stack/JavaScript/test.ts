'use strict';

import { Stack } from "./Stack";

let capacity = 5;
let stack = new Stack(capacity);

console.log('Stack size at the beginning - ', stack.length());

console.log('Pop element from empty Stack...');
stack.pop();

for(let i = capacity; i > 0; i--) {
    let randomNumber = Math.floor(Math.random() * 10000) + 1;
    console.log('Inserting ', randomNumber);
    stack.push(randomNumber);
}

stack.print();

console.log('Pop element from the Stack...', stack.pop());

stack.print();

console.log('Inserting ', 10001);
stack.push(10001);

stack.print();
console.log('Stack size in the end - ', stack.length());

console.log('Inserting ', 10002);

try {
    stack.push(10002);
} catch(error) {
    console.error(error);
}