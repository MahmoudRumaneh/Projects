package example.strategy;

public class Item {

	private String upc;
	private int price;
	
	public Item(String upc, int price) {
		super();
		this.upc = upc;
		this.price = price;
	}

	public String getUpc() {
		return upc;
	}

	public int getPrice() {
		return price;
	}
	
	
}
