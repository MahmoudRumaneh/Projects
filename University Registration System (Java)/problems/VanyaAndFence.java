package problems;

import java.util.*;

public class VanyaAndFence {

	public static void main(String[] args) {
		int n = 0, h, width = 0;
		Scanner sc = new Scanner(System.in);
		n = sc.nextInt();
		h = sc.nextInt();
		int[] arr = new int[n];
		for (int j = 0; j < n; j++) {
			arr[j] = sc.nextInt();
		}
		for (int i = 0; i < n; i++) {
			if(arr[i]>h) {
				width=width+2;
			}
			else if(arr[i]<=h){
				width++;
			}
		}
		System.out.println(width);
	}

}
