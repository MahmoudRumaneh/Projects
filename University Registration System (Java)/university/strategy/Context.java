package university.strategy;

public class Context {
		
	private Strategy strategy;
	
	public Context(Strategy strategy) {
		this.strategy = strategy;
	}
	
	public String executeStrategy(String str) {
		return strategy.print(str);
		
	}
	
}
