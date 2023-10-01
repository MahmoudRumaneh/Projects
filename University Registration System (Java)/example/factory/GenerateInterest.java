package example.factory;
import java.util.*;
public class GenerateInterest {

	public static void main(String[] args) {
		
		BankAccountFactory factory = new BankAccountFactory();
		Scanner sc1 = new Scanner(System.in); 
		Scanner sc2 = new Scanner(System.in); 
		System.out.print("Enter your amount of money: ");
		int a = sc2.nextInt();
		
		System.out.print("Choose your account type by character: \n1. Saving Account (S)\n2. Business Account (B)\n"
				+ "3. Personal Account (P)\nEnter here: ");
		
		String type = sc1.nextLine();
		BankAccount bankAccount1 = factory.getAccount(type);
		bankAccount1.calculateInterestRate(a);

	}

}
