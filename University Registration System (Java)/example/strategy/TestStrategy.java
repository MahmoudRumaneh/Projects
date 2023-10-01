package example.strategy;

public class TestStrategy {

	public static void main(String[] args) {
		
		ShoppingCart cart = new ShoppingCart();
		
		Item item1 = new Item("4512",5);
		Item item2 = new Item("544561",10);
		
		cart.addItem(item1);
		cart.addItem(item2);
		
		cart.pay(new Paypal("mohammad@gmail.com", "hnas85We4"));
		
		cart.pay(new CreditCard("Khaled Ahmad", "48564984564155", "786", "12/24"));

	}

}
