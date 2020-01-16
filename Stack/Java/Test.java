import java.util.NoSuchElementException;

public class Test {

    public static void main(String[] args) {
        
        int capacity = 5;
        Stack stack = new Stack(capacity);

        System.out.println("Stack size at the beginning - " + stack.size());

        try {
            stack.pop();
        } catch(NoSuchElementException exception) {
            System.out.println(exception.getMessage());
        }

        for(int i = capacity; i > 0; i--) {
            int randomNumber = 1 + (int) (Math.random() * 10000);
            System.out.println("Inserting " + randomNumber);
            stack.push(randomNumber);
        }

        stack.print();

        System.out.println("Pop element " + stack.pop());

        stack.print();

        System.out.println("Inserting 10001");
        stack.push(10001);

        stack.print();
        System.out.println("Stack size in the end - " + stack.size());

        try {
            System.out.println("Inserting 10002");
        stack.push(10002);
        } catch(StackOverflowError exception) {
            System.out.println(exception.getMessage());
        }

    }

}