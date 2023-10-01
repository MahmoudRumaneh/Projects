package example.factory;


public class BankAccountFactory {
	public BankAccount getAccount(String type) {

	if (type.equalsIgnoreCase("p")) {
		return new PersonalAccount();
	}
	if (type.equalsIgnoreCase("b")) {
		return new BusinessAccount();
	}
	if (type.equalsIgnoreCase("s")) {
		return new SavingAccount();
	}
	return null;
	}
}
