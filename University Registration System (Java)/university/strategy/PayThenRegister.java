package university.strategy;

public class PayThenRegister implements Strategy {

	@Override
	public String print(String str) {
		return "pay then register";
	}

}
