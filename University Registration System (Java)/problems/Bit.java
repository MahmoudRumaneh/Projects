package problems;

import java.util.*;

public class Bit {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
        int num = sc.nextInt();
        int x = 0;
        for (int i = 0; i < num; i++) {
            String str = sc.next();
            switch (str){
                case "++X":
                case "X++":
                    x++;
                    break;
                case "X--":
                case "--X":
                    x--;
                    break;
            }
        }
        System.out.println(x);

}
}
