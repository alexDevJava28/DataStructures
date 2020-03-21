from typing import List

class Stack:

    def __init__(self, capacity: int):
        if capacity <= 0:
            raise Exception('Capacity should be greater than 0.') 

        self.stack: List[int] = []
        self.capacity: int = capacity
        self.top: int = 0

    def size(self) -> int:
        return self.top

    def isEmpty(self) -> bool:
        return self.top == 0   

    def isFull(self) -> bool:
        return self.top >= self.capacity

    def push(self, item: int):
        if(self.isFull()):
            raise Exception('The Stack is overflow. It is impossible to add new element.') 

        self.stack += [item]
        self.top += 1

    def pop(self) -> int:
        if(self.isEmpty()):
            raise Exception('The Stack is empty. It is impossible to remove element.')

        self.top -= 1
        item = self.stack[self.top]
        del(self.stack[self.top])
        return item

    def peek(self) -> int:
        if(self.isEmpty()):
            raise Exception('The Stack is empty. It is impossible to peek element.')  

        return self.stack[self.top - 1]   

    def print(self):
        for i, item in enumerate(self.stack):
            print(i, item)     
