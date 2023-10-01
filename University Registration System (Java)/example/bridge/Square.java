package example.bridge;

public class Square extends Shape {

	public Square(Color color1) {
		super(color1);
	}
	
	@Override
	public void draw() {
		System.out.print("Square drawn. ");
		color1.fillColor();
	}

}
