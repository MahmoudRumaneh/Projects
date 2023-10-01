package problems;

import java.util.Arrays;
import java.util.Collections;
import java.util.Scanner;

public class Drums {

	public static void main(String args[]) {
		int n, k, sum = 0,x;
		Scanner sc = new Scanner(System.in);
		n = sc.nextInt();
		k = sc.nextInt();

		int[] a = new int[n];
		for (int j = 0; j < n; j++) {
			a[j] = sc.nextInt();
		}
		Arrays.sort(a, 0, n);
		for (int i = 0; i < (k); i++) {
			x=a[n-1-i];
			sum+=x;
		}
		System.out.println(sum);
	}
}
