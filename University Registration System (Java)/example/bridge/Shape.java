package example.bridge;

public abstract class Shape {
	public Color color1;
	
	public Shape(Color color1) {
		
		this.color1 = color1;
	}
	
	abstract public void draw();
}
