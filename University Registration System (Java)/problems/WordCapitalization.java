package problems;

import java.util.Scanner;

public class WordCapitalization {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		String letter  = sc.next();
		String output = letter.substring(0, 1).toUpperCase()+letter.substring(1);
		
		System.out.println(output);

	}

}
