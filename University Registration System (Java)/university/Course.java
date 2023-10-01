package university;

public class Course {

	private int id;
	private String name;
	private int creditHours;

	public Course() {

	}

	public Course(int id, String name, int creditHours) {
		super();
		this.id = id;
		this.name = name;
		this.creditHours = creditHours;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public int getCreditHours() {
		return creditHours;
	}

	public void setCreditHours(int creditHours) {
		this.creditHours = creditHours;
	}

	@Override
	public String toString() {
		return "Course [Course Id: " + id + ", Course Name: " + name + ", Credit Hourse: " + creditHours + "\n";
	}

}
