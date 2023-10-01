package example.strategy;

public class CreditCard implements Payment {
	
	private String name;
	private String cardNumber;
	private String cvv;
	private String EXP;
	
	
	public CreditCard(String name, String cardNumber, String cvv, String eXP) {
		super();
		this.name = name;
		this.cardNumber = cardNumber;
		this.cvv = cvv;
		EXP = eXP;
	}


	@Override
	public void pay(int amount) {
		System.out.println(amount+"$ paid by credit card");
	}

}
