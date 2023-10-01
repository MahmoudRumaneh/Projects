package example.factory;

public abstract class BankAccount {
	protected double interestRate;
	abstract double getInterestRate();
	
	public void calculateInterestRate(int amountOfMoney) {
		System.out.println("The total of interest is: "+amountOfMoney*(getInterestRate()/100)+"$");
	}
}
