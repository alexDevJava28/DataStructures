import java.util.NoSuchElementException;

public class Queue<T> {

    private Node front;
    private Node rear;
    private int capacity;
    private int size = 0;

    private static class Node<T> {

        public T item;
        public Node<T> nextNode;

    }

    Queue(int capacity) {

        if(capacity <= 0) {
            throw new IllegalArgumentException("Capacity should be greater than 0.");
        }

        this.capacity = capacity;

    }

    public int size() {

        return this.size;

    }

    public boolean isEmpty() {

        return this.size() == 0;
        
    }

    public boolean isFull() {

        return this.size() >= this.capacity;
        
    }

    public void enqueue(T item) {

        if (this.isFull()) {
            throw new StackOverflowError("The Queue is overflow. It is impossible to enqueue new element");
        }

        Node<T> temp = new Node<T>();
        temp.item = item;

        if (this.isEmpty()) {
            this.front = this.rear = temp;
        } else {
            this.rear.nextNode = temp;
            this.rear = temp;
        }

        this.size++;

    }

    public T dequeue() {

        if (this.isEmpty()) {
            throw new NoSuchElementException("The Queue is empty. It is impossible to dequeue element.");
        }

        T item = (T) this.front.item;

        this.front = this.front.nextNode;

        if (this.front == null) {
            this.rear = null;
        }

        this.size--;

        return item;

    } 

    public void print() {

        if (this.isEmpty()) {
            System.out.println("Can't print Queue. The Queue is empty.");
        }

        Node temp = this.front;
        int counter = 1;

        while(temp != null) {

            System.out.println(counter + ". " + temp.item);

            temp = temp.nextNode;
            counter++;

        }

    }

}