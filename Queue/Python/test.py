import sys
from random import randrange
from queue import Queue

def main(args=None):
    """The main routine."""
    if args is None:
        args = sys.argv[1:]

    capacity = 5
    queue = Queue(capacity)

    print('Queue size at the beginning - ' + str(queue.getSize()))

    print('Dequeue element from empty Queue...')

    try:
        queue.dequeue()
    except Exception as exception:
        print(str(exception))

    i = 0
    while i < capacity :
        randomNumber = randrange(1, 10000)
        print('Inserting ' + str(randomNumber))
        queue.enqueue(randomNumber)
        i += 1

    queue.print()  

    print('Dequeue element from the Queue...' + str(queue.dequeue()))  

    queue.print()  

    print('Inserting ' + str(10001))
    queue.enqueue(10001)

    queue.print()  

    print('Queue size in the end - ' + str(queue.getSize()))  

    print('Inserting ' + str(10002))

    try:
        queue.enqueue(10002)
    except Exception as exception:
        print(str(exception))


if __name__ == "__main__":
    main()