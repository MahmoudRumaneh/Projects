package problems;

import java.util.*;

public class BearAndBigBrother {

	public static void main(String[] args) {
		int a=0, b=0, i=0;
		Scanner sc= new Scanner(System.in);
		a = sc.nextInt();
		b = sc.nextInt();
		
		while(a<=b) {
			a = a*3;
			b = b*2;
			i++;
		}
		System.out.println(i);

	}

}
