import sys
from random import randrange
from stack import Stack

def main(args=None):
    """The main routine."""
    if args is None:
        args = sys.argv[1:]

    capacity = 5
    stack = Stack(capacity)

    print('Stack size at the beginning - ' + str(stack.size()))

    print('Pop element from empty Stack...')

    try:
        stack.pop()
    except Exception as exception:
        print(str(exception))

    i = 0
    while i < capacity :
        randomNumber = randrange(1, 10000)
        print('Inserting ' + str(randomNumber))
        stack.push(randomNumber)
        i += 1

    stack.print()  

    print('Pop element from the Stack...' + str(stack.pop()))  

    stack.print()  

    print('Inserting ' + str(10001))
    stack.push(10001)

    stack.print()  

    print('Stack size in the end - ' + str(stack.size()))  

    print('Inserting ' + str(10002))

    try:
        stack.push(10002)
    except Exception as exception:
        print(str(exception))


if __name__ == "__main__":
    main()