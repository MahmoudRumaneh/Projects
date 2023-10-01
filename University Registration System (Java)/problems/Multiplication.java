package problems;

import java.util.*;

public class Multiplication {
	public static void main(String[] args) {

		int m, n, i, j;
		Scanner in = new Scanner(System.in);

		m = in.nextInt();
		n = in.nextInt();

		int first[][] = new int[m][n];

		for (i = 0; i < m; i++) {
			for (j = 0; j < n; j++) {
				first[i][j] = in.nextInt();
			}
		}

		int r, s, t, u;

		r = in.nextInt();
		s = in.nextInt();

		int matrix[][] = new int[r][s];

		for (int y = 0; y < r; y++) {
			for (int x = 0; x < s; x++) {
				matrix[y][x] = in.nextInt();
			}
		}
		int total = 0;
		int sum[][] = new int[m][s];
		for (int number = 0; number < n; number++) {
			for (int ali = 0; ali < m; ali++) {
				for (int ss = 0; ss < s; ss++) {

					total += first[number][ss] * matrix[ali][number];

				}
//				for (int z = 0; z < m; z++) {
//					for (int q = 0; q < s; q++) {
//						sum[z][q] = total;
//					}
//				}

			}
		}
		for (int o = 0; o < m; o++) {
			for (int p = 0; p < s; p++) {
				System.out.print(sum[o][p] + "  ");
			}
			System.out.println();
		}

	}
}
