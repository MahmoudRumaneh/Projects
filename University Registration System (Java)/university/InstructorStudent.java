package university;

public class InstructorStudent {
	private int id;
	private String name;
	private School school;

	public InstructorStudent() {

	}

	public InstructorStudent(int id, String name, School school) {
		super();
		this.id = id;
		this.name = name;
		this.school = school;
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

	public School getSchool() {
		return school;
	}

	public void setSchool(School school) {
		this.school = school;
	}

	@Override
	public String toString() {
		return "InstructorStudent [Id: " + id + ", Name: " + name + ", School: " + school + "]";
	}



}
