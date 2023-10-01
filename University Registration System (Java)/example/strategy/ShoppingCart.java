package example.strategy;

import java.util.*;

public class ShoppingCart {
	List<Item> items;
	
	public ShoppingCart() {
		this.items= new ArrayList<Item>();
	}
	
	public void addItem(Item item) {
		this.items.add(item);
	}
	
	public void removeItem(Item item) {
		this.items.remove(item);
	}
	
	public int total(){
		int sum = 0;
		for(Item item : items){
			sum += item.getPrice();
		}
		return sum;
	}
	
	public void pay(Payment paymentMethod){
		int amount = total();
		paymentMethod.pay(amount);
	}
}
