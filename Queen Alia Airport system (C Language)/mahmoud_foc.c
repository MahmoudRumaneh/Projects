/*
Mahmoud Rumaneh
20120103
Computer Science
*/
#include<stdio.h>
#include"foc_fa21.h"
#include<string.h>
int menu();		//menu decleration.
int america();		//america decleration.
int europe();		//eruope decleration.
int africa();		//africa decleration.
int employee();	//employee decleration.
int get();		//get decleration.
int check();		//check decleration.


	int main()
	{
		menu();	 // calling function "menu".
		return 0;
	}
int menu()
{	
     int user,choose =0;     
     printf("*************Welcome to International Queen Alia Airport************\n1.Passenger\n2.Employee\n3.Quit\nselect a choice >");
     scanf("%d",&user);    
    switch(user) 	// "switch" to choose on of the previous options by "user" variable. 
    {
        case 1:
             printf("Passenger\n1.America\n2.Europe\n3.Africa\n4.Back\nWhere is your destination?");
                       scanf("%d",&choose);                             
                               // this switch is for the country of choice for passengers.
                         switch(choose)
                       {
                            case 1:
                            america(); // calling function "america".
                            break;
                            
                            case 2:
                            europe();  // calling function "europe".
                            break;
                            
                            case 3:
                            africa(); // calling function "africa".
                            break;
                            
                            case 4:
                            printf("Back\n");
                            menu();   // calling function "menu".
                            break;
                            
                      	     default:
			     printf("-_- invalid input -_-\n");
		      	     break;

                       }
        break;
                       
        case 2:
        employee(); // calling function "employee".
        break;               
        
        case 3:
        break;
	
	default:
	printf("-_- invalid input -_-\n");
	break;

   }
return 0;  
}


int america() 	// enter "america" function.
{
      char fname[20];
      int vnumber;
      printf("America\n");
      printf("What's your first name?");
      scanf("%s",fname);
      printf("What's your Visa Number?");
      scanf("%d",&vnumber);
      
      		// using "if" statement to take the passenger's information to America.
        if(vnumber>=12300&&vnumber<12400)
       	 // this condition was used to identify the first three stage.
        {  
          if(vnumber>=12350&&vnumber<=12380)
        	  // this condition was used to identify the last two stage.
          {                        
            printf("Please move to counter number four\n");                                                    
          }
          	// this will print if the user introduces the wrong value of the second condition.                         
          else
          {
           printf("T-T Sorry! your visa needs to be validated please check that with the USA Embassy T-T\n");
          }
        }
        else
        {
        	// this will print if the user introduces the wrong value of the first condition.
          printf("T-T Your Visa Number is invalid T-T\n");
        }                
      		 // this file will store passenger's data to America.
      FILE *Passenger1;
      Passenger1 = fopen("America.txt","a");
      fprintf(Passenger1,"%s  %d\n",fname,vnumber);
      fclose(Passenger1);
       menu();		// calling function "menu".
return 0;           
}    


int europe() 	// enter "europe" function.
{
        int snumber;
 	printf("Europe\n");
 	printf("What's your Schengen Number?");
 	scanf("%d",&snumber); 
 		// using "if" statement to take the passenger's information to Europe.                                 
 	if((snumber/10)>=1&&(snumber/10)<10)
 		// this condition will be enforced if the passenger enters a two-stage number.
 	{ 
 	   printf("Germany, Window 10\n");
        }
       	 // this condition will be enforced if the passenger enters a three-stage number.
        else if((snumber/100)>=1&&(snumber/100)<10)
        {
          printf("Italy, Window 11\n");
        }  
        	// this condition will be enforced if the passenger enters a four-stage number.
        else if((snumber/1000)>=1&&(snumber/1000)<10)
        {
          printf("Spain, Window 12\n");
        }
        	// this condition will be enforced if the passenger enters a more than four-stage number.
        else if((snumber/10000)>=1)
        {
          printf("Greece, Window 13\n");
        } 
        	// this condition will be enforced if the passenger enters wrong value.
        else
        {
          printf("*_* Invalid Schengen Number *_*\n");
        } 
        	   // this file will store passenger's data to Europe.
       	   FILE *Passenger2;
                  Passenger2 = fopen("Europe.txt","a");
                  fprintf(Passenger2,"%d\n",snumber);
                  fclose(Passenger2); 
         menu();	// calling function "menu".
return 0;                               
} 


int africa() 		// enter "africa" function.
{
        printf("Africa\nMove to this location\n");
        int location[200][400]; 	// definition two dimensional array to make a pictuer.
           for(int i=0; i<200; i++) 	// using for loop to put a condition and repeat on the number of rows.
           {
               for(int j=0; j<400; j++) 	// using for loop to put a condition and repeat on the number of columns.
               {
                    {
                    	// using if statement to determine the location in the image.
                          if((j==200 || i==100) || ((i<60&&i>40)&&(j>290&&j<310)))
                          {
                             location[i][j] = 255;
                          }
                          
                          else
                          {
                             location[i][j] = 0;
                          }
                    }
               }
           }          
        showArray(200,400,location);
        	FILE *Passenger3; 	// this file will store passenger's data to Africa.
               Passenger3 = fopen("Africa.txt","a");
               fprintf(Passenger3,"%d\n",location[200][400]);
               fclose(Passenger3);
               menu(); 	// calling function "menu". 
return 0;               
}


int employee()		// enter "employee" function.
{
  	int c;             	
        char password[10]="admin";
        char a[10];                	              	               	
              	
        printf("Enter Password :");
        scanf("%s",a);               	
        c=strcmp(password,a); 	//use string comparison to make sure your password is correct.              	
           if(c==0)
              {
                  int emplo;
                  printf("1. Get Statistcis\n2. Check name\n3. Back\nSelect a choice > ");
                  scanf("%d",&emplo);
                	switch(emplo)
                	{
                		case 1:
                		get();		// calling function "get".	
                		break;
                		
                		case 2:
                		check();	// calling function "check".
                		break;
                		
                		case 3:
                		printf("Back\n");
                		menu();	// calling function "menu".
                		break;
                		
                		default:
					printf("-_- invalid input -_-\n");
				break;
                	}
              }
return 0;              
}


int get()	// enter "get" function.
{
	printf("get statistics\n");
	char pname[20];
	int storage;
	int digitA=0;
	FILE *nsb; 		//this file will read the information of passengers to "America".
	nsb = fopen("America.txt","r");
	if(nsb != NULL) 	//we make sure in this condition that the file isn't empty.
	{
		while(fscanf(nsb,"%s  %d",pname,&storage) != EOF)	 //It reads through two symbols is this file contains information.
		{
			digitA++;
		}
	}
			//if it doesn't contain information, it'll print this.
	else 
	{
		printf("T-T Sorry! the name of this file is incorrect T-T\n");
	}
	printf("The numbers of passengers to America is: %d\n",digitA);
	fclose(nsb);
	
	int schengen[20];
	int digitE=0;
	FILE *nsp;		//this file will read the information of passengers to "Europe".
	nsp = fopen("Europe.txt","r");
	if(nsp != NULL)	//we make sure in this condition that the file isn't empty.
	{
		while(fscanf(nsp,"%d",schengen) != EOF)	//It reads through one symbol is this file contains information.
		{
			digitE++;
		}
	}
			//if it doesn't contain information, it'll print this.
	else
	{
		printf("T-T Sorry! the name of this file is incorrect T-T\n");
	}
	printf("The numbers of passengers to Europe is: %d\n",digitE);
	fclose(nsp);
	
	double travelersF[20];
	double digitF=0;
	FILE *nsbeh;		//this file will read the information of passengers to "Africa".
	nsbeh = fopen("Africa.txt","r");
	if(nsbeh != NULL)	//we make sure in this condition that the file isn't empty.
	{
		while(fscanf(nsbeh,"%lf",travelersF) != EOF)		//It reads through one symbol is this file contains information.
		{
			digitF++;
		}
	}
			//if it doesn't contain information, it'll print this.
	else
	{
		printf("T-T Sorry! the name of this file is incorrect T-T\n");
	}
	printf("The numbers of passengers to Africa is: %lf\n",digitF);
	fclose(nsbeh);
	
	double sum,A,E,F;
	sum = (digitA+digitE+digitF); 	//The sum of three files.
	printf("Total number of passengers = %lf\n",sum);
	A=100*digitA/sum;		//percentage of passenger data to "America".
	printf("Percentage of passengers to America = %lf\n",A);
	E=100*digitE/sum;		//percentage of passenger data to "Europe".
	printf("Percentage of passengers to Europe = %lf\n",E);
	F=100*digitF/sum;		//percentage of passenger data to "Africa".
	printf("Percentage of passengers to Africa = %lf\n",F);
	/*
	  use array to creat an image.
	*/
	int sta[200][600];
		for(int y=0; y<200; y++)
		{
	  		for(int z=0; z<600; z++)
	  		{
	    			sta[y][z]=255;
	  		}  
		}
					//these conditions will show the painting in white.
	
				/* this drawing will show America's first column
					with a hundred percent in it.
				*/
		for(int y=100; y<200; y++)
		{
			for(int z=80; z<100; z++)
			{
				sta[y][z]=0;
			}
		}
		for(int y=101; y<199; y++)
		{
			for(int z=81; z<99; z++)
			{
				sta[y][z]=255;
				if(y<=200&&y>=200-A)
				{
					sta[y][z]=0;
				}
			}
		}
				//
		/* this drawing will show Europe's second column
			with a hundred percent in it.
		*/				
		for(int y=100; y<200; y++)
		{
			for(int z=280; z<300; z++)
			{
				sta[y][z]=0;
			}
		}
		for(int y=101; y<199; y++)
		{
			for(int z=281; z<299; z++)
			{
				sta[y][z]=255;
				if(y<=200&&y>=200-E)
				{
					sta[y][z]=0;
				}
			}
		}
		//
			/* this drawing will show Africa's third column
				with a hundred percent in it.
			*/
		for(int y=100; y<200; y++)
		{
			for(int z=480; z<500; z++)
			{
				sta[y][z]=0;
			}
		}
		for(int y=101; y<199; y++)
		{
			for(int z=481; z<499; z++)
			{
				sta[y][z]=255;
				if(y<=200&&y>=200-F)
				{
					sta[y][z]=0;
				}
			}
		}
			//
	showArray(200,600,sta);
menu();	// calling function "menu".
return 0;				
} 
 
    
int check()	// enter "check" function.
{
  char name[5];
  char person[5];
  int data,inf;
  FILE *cname;		//this file will read the information of Employees.	
  cname = fopen("names.txt","r");
  scanf("%s",name);
  printf("Check Names.\nenter name: ");
  if(cname != NULL)		//we make sure in this condition that the file isn't empty.
  {
 	while(fscanf(cname,"%s %d",person,&data) != EOF)	//It reads through two symbols is this file contains information.	
  	{   
    		inf=strcmp(name,person); 	//use string comparison to make sure your name is in file "names.txt".
    		
    		if(inf==0&&data==1) 	//if the passenger has the number 1.
    		{
    		    printf("This Passenger %s can travel\n",name);
    		}
    		else if(inf==0&&data==0)	//if the passenger has the number 0.
    		{
    		    printf("This Passenger %s cannot travel\n",name);
    		}
  	} 
 }
 else
 {
 	printf("-_- Your names is invalid -_-\n");
 }
fclose(cname);
menu();	// calling function "menu".
return 0; 
}
