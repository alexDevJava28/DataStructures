#include <stdio.h>
#include <stdlib.h>

struct node;
struct queue;
typedef struct node* Node;
typedef struct queue* Queue;

struct node { 
    int key; 
    Node next; 
};

struct queue 
{
    int capacity;
    int size;
    Node front, rear; 
};

Node newNode(int k) 
{ 
    Node temp = (Node) malloc(sizeof(Node)); 
    temp->key = k; 
    temp->next = NULL; 
    return temp; 
} 

Queue CreateQueue(int capacity)
{
    
    if (capacity <= 0) 
    {
        printf("Capacity should be greater than 0.\n");
        return 0;
    }

    Queue q = (Queue)malloc(sizeof(Queue)); 
    q->front = q->rear = NULL; 
    q->capacity = capacity;
    q->size = 0;
    return q; 

}

int isFull(Queue queue)
{
    return queue->size == queue->capacity;
}

int isEmpty(Queue queue)
{
    return queue->size == 0;
}

int Size(Queue queue)
{
    return queue->size;
}

void Enqueue(int item, Queue queue)
{

    if(isFull(queue))
    {
        printf("The Queue is overflow. It is impossible to enqueue new element.\n");
    }
    else 
    {
        
        Node temp = newNode(item); 
  
        queue->size++;

        if (queue->rear == NULL) { 
            queue->front = queue->rear = temp; 
            return; 
        } 
    
        queue->rear->next = temp; 
        queue->rear = temp;

    }
        
}

int Dequeue(Queue queue)
{

    if(isEmpty(queue))
    {
        printf("The Queue is empty. It is impossible to dequeue element.\n");
        return 0;
    }
    else
    {
       
        Node temp = queue->front;
        int value = temp->key;
  
        queue->front = queue->front->next; 
  
        if (queue->front == NULL) 
            queue->rear = NULL; 

        queue->size--;    
  
        free(temp); 

        return value;

    }

}

void Print(Queue queue)
{

    if(isEmpty(queue))
    {
        printf("The Queue is empty. It is impossible to print elements.\n");
    }
    else
    {

        Node temp = queue->front;
        int counter = 1;

        while (temp)
        {
            printf("%i - %i\n", counter, temp->key);
            temp = temp->next;
            counter++;
        }

        temp = NULL;
        free(temp);
        
    }
    
}

void Clean(Queue queue)
{

    if(!isEmpty(queue))
    {
        free(queue->front);
        free(queue->rear);
    }

    free(queue);
    
}