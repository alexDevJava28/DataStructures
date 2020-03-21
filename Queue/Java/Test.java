import java.util.NoSuchElementException;

public class Test {

    public static void main(String[] args) {
        
        int capacity = 5;
        Queue<Integer> queue = new Queue<Integer>(capacity);

        System.out.println("Queue size at the beginning - " + queue.size());

        try {
            queue.dequeue();
        } catch(NoSuchElementException exception) {
            System.out.println(exception.getMessage());
        }

        for(int i = capacity; i > 0; i--) {
            int randomNumber = 1 + (int) (Math.random() * 10000);
            System.out.println("Inserting " + randomNumber);
            queue.enqueue(randomNumber);
        }

        queue.print();

        System.out.println("Dequeue element " + queue.dequeue());

        queue.print();

        System.out.println("Inserting 10001");
        queue.enqueue(10001);

        queue.print();
        System.out.println("Queue size in the end - " + queue.size());

        try {
            System.out.println("Inserting 10002");
            queue.enqueue(10002);
        } catch(StackOverflowError exception) {
            System.out.println(exception.getMessage());
        }

    }

}