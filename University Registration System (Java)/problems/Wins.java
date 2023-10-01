package problems;

import java.util.*;

public class Wins {

	public static void main(String[] args) {
		int n, fc = 0, other = 0, points = 0;
		Scanner sc = new Scanner(System.in);
		n = sc.nextInt();
 
		ArrayList<Integer> arr = new ArrayList<Integer>();
		for (int j = 0; j < n; j++) {
			fc = sc.nextInt();
			other = sc.nextInt();
			arr.add(fc);
			arr.add(other);
			if (fc > other) {
				points++;
			}
		}
		System.out.println(points);
	}
}
