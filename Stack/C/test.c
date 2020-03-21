#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include "stack.h"

const int RANDOM_MIN = 1;
const int RANDOM_MAX = 10000;

int main() {

   srand(time(0));
   
   int capacity = 5;
   Stack stack = CreateStack(capacity);

   printf("Stack size at the beginning - %d\n", Size(stack));

   printf("Pop element from empty Stack...\n");

   Pop(stack);

   for(int i = 0; i < capacity; i++)
   {
      int randomNumber = (rand() % (RANDOM_MAX - RANDOM_MIN + 1)) + RANDOM_MIN;
      printf("Inserting %d\n", randomNumber);
      Push(randomNumber, stack);
   }

   Print(stack);

   printf("Pop element from the Stack %d\n", Pop(stack));

   Print(stack);

   printf("Inserting %d\n", 10001);
   Push(10001, stack);

   Print(stack);

   printf("Stack size in the end - %d\n", Size(stack));

   printf("Inserting %d\n", 10002);
   Push(10002, stack);

   Clean(stack);

   return 0;

}