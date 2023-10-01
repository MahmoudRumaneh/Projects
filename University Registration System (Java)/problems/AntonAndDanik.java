package problems;

import java.util.Scanner;

public class AntonAndDanik {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
        int num = sc.nextInt();
        int a = 0,d = 0;
        String str = sc.next();
            for (char x : str.toCharArray()) {
            if(x=='A') {
               a++;
            }
            else {
            	d++;
            }
        }
        if(a>d) {
        	System.out.println("Anton");
        }
        else if(d>a) {
        	System.out.println("Danik");
        }
        else{
        	System.out.println("Friendship");
        }
        
	}

}
