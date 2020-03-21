import java.util.NoSuchElementException;

public class Stack {

    private int stack[];
    private int capacity;
    private int top;

    Stack(int capacity) {

        if(capacity <= 0) {
            throw new IllegalArgumentException("Capacity should be greater than 0.");
        }

        this.capacity = capacity;
        this.stack = new int[capacity];
        this.top = 0;

    }

    public int size() {

        return this.top;

    }

    public boolean isEmpty() {

        return this.size() == 0;

    }

    public boolean isFull() {

        return this.size() >= this.capacity;
        
    }

    public void push(int item) {

        if (this.isFull()) {
            throw new StackOverflowError("The Stack is overflow. It is impossible to add new element");
        }

        this.stack[this.top++] = item;

    }

    public int pop() {

        if (this.isEmpty()) {
            throw new NoSuchElementException("The Stack is empty. It is impossible to remove element.");
        }

        return this.stack[--this.top];

    }

    public int peek() {

        if (this.isEmpty()) {
            throw new NoSuchElementException("The Stack is empty. It is impossible to peek element.");
        }

        return this.stack[this.top - 1];

    }

    public void print() {

        for(int i = 0; i < this.top; i++) {
            System.out.println(i + " - " + this.stack[i]);
        }

    }

}