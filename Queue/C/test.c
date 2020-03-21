#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include "queue.h"

const int RANDOM_MIN = 1;
const int RANDOM_MAX = 10000;

int main() {

   srand(time(0));
   
   int capacity = 5;
   Queue queue = CreateQueue(capacity);

   printf("Queue size at the beginning - %d\n", Size(queue));

   printf("Dequeue element from empty Queue...\n");

   Dequeue(queue);

   for(int i = 0; i < capacity; i++)
   {
      int randomNumber = (rand() % (RANDOM_MAX - RANDOM_MIN + 1)) + RANDOM_MIN;
      printf("Inserting %d\n", randomNumber);
      Enqueue(randomNumber, queue);
   }

   Print(queue);

   printf("Dequeue element from the Queue %d\n", Dequeue(queue));

   Print(queue);

   printf("Inserting %d\n", 10001);
   Enqueue(10001, queue);

   Print(queue);

   printf("Queue size in the end - %d\n", Size(queue));

   printf("Inserting to the full Queue %d\n", 10002);
   Enqueue(10002, queue);

   Clean(queue);

   return 0;

}