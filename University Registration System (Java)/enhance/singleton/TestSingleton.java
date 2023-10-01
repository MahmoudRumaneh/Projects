package enhance.singleton;

public class TestSingleton {

	public static void main(String[] args) {

		Singleton user1 = Singleton.getInstance();
		Singleton user2 = Singleton.getInstance();
		Singleton user3 = Singleton.getInstance();

		System.out.println("user1 pointer is: " + user1);
		System.out.println("user2 pointer is: " + user2);
		System.out.println("user3 pointer is: " + user3);

		if (user1 == user2 && user2 == user3) {
			System.out.println("Three objects for user are pointing to the same memory location");
		}

	}

}
