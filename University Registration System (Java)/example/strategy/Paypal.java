package example.strategy;

public class Paypal implements Payment {
	
	private String email;
	private String password;

	public Paypal(String email, String password) {
		super();
		this.email = email;
		this.password = password;
	}

	@Override
	public void pay(int amount) {
		System.out.println(amount+"$ paid using Paypal");

	}

}
