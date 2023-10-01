package example.bridge;

public class BridgePattern {

	public static void main(String[] args) {
		
		Shape shape1 = new Triangle(new Green());
		shape1.draw();
		
		Shape shape2 = new Square(new Blue());
		shape2.draw();

	}

}
