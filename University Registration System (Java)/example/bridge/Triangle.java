package example.bridge;

public class Triangle extends Shape {

	public Triangle(Color color1) {
		super(color1);
	}
	
	@Override
	public void draw() {
		System.out.print("Triangle drawn. ");
		color1.fillColor();
	}

}
