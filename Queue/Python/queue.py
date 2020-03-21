from typing import TypeVar

T = TypeVar('T')

class Node:

    def __init__(self, item: T):
        self.item: T = item
        self.nextNode: Node = None

class Queue:

    def __init__(self, capacity: int):
        if capacity <= 0:
            raise Exception('Capacity should be greater than 0.') 

        self.capacity: int = capacity
        self.size: int = 0
        self.front: Node
        self.rear: Node

    def getSize(self) -> int:
        return self.size

    def isEmpty(self) -> bool:
        return self.getSize() == 0   

    def isFull(self) -> bool:
        return self.getSize() >= self.capacity

    def enqueue(self, item: T):
        if(self.isFull()):
            raise Exception('The Queue is overflow. It is impossible to enqueue new element.') 

        temp = Node(item)

        if (self.isEmpty()):
            self.front = self.rear = temp
        else:
            self.rear.nextNode = temp
            self.rear = temp

        self.size += 1;  

    def dequeue(self) -> T:
        if(self.isEmpty()):
            raise Exception('The Queue is empty. It is impossible to dequeue element.')

        item = self.front.item
        self.front = self.front.nextNode

        if(self.front is None):
            self.rear = None

        self.size -= 1

        return item

    def print(self):
        if(self.isEmpty()):
            print('Queue is empty. Nothing to print.')
            return

        temp = self.front
        counter = 1

        while(temp is not None):
            print(str(counter) + '. ' + str(temp.item))

            temp = temp.nextNode   
            counter += 1