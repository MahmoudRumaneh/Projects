package problems;
import java.util.*;
public class SystemOfEquations {

	public static void main(String[] args) {
		int n, m, ans=0;
		Scanner sc = new Scanner(System.in);
		n= sc.nextInt();
		m= sc.nextInt();
		
		for(int i=0; i*i<=n&& i<=m; i++) {
			int b = n - i*i;
			if (i+b*b==m) {
				ans+=1;
			}
		}
		
		System.out.println(ans);
		
	}

}
