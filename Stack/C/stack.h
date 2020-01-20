#include <stdio.h>
#include <stdlib.h>

struct stack;
typedef struct stack* Stack;

struct stack 
{
    int capacity;
    int top;
    int *items;
};

Stack CreateStack(int capacity)
{
    
    if (capacity <= 0) 
    {
        printf("Capacity shoul be greater than 0.\n");
        return 0;
    }

    Stack st;
    st = (struct stack*) malloc(sizeof(struct stack));
    st->items = (int *) malloc(sizeof(int) * capacity);
    st->capacity = capacity;
    st->top = 0;
    return st;

}

int isFull(Stack st)
{
    return st->top == st->capacity;
}
 
int isEmpty(Stack st)
{
    return st->top == 0;
}

int Size(Stack st)
{
    return st->top;
}

void Push(int item, Stack st)
{

    if(isFull(st))
    {
        printf("The Stack is overflow. It is impossible to add new element.\n");
    }
    else 
    {
        st->items[st->top++] = item;
    }
        
}

int Pop(Stack st)
{

    if(isEmpty(st))
    {
        printf("The Stack is empty. It is impossible to remove element.\n");
    }
    else
    {
        return st->items[--st->top];
    }

}

int Peek(Stack st)
{

    if(isEmpty(st))
    {
        printf("The Stack is empty. It is impossible to peek element.\n");
    }
    else
    {
        return st->items[st->top - 1];
    }

}

void Print(Stack st)
{

    if(isEmpty(st))
    {
        printf("The Stack is empty. It is impossible to peek element.\n");
    }
    else
    {
        int n = Size(st);

        for (int i = 0; i < n; i++) 
        { 
            printf("%i - %i\n", i, st->items[i]);     
        } 
    }
    
}

void Clean(Stack st)
{

    if(!isEmpty(st))
    {
        free(st->items);
    }

    free(st);
    
}