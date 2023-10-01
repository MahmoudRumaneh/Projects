package university;

public class School {
	private int id;
	private String name;
	private String dean;

	public School() {

	}

	public School(int id, String name, String dean) {
		this.id = id;
		this.name = name;
		this.dean = dean;
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

	public String getDean() {
		return dean;
	}

	public void setDean(String dean) {
		this.dean = dean;
	}

	@Override
	public String toString() {
		return "name: " + name + ", School id: " + id + ",\n Dean Name: " + dean + "";
	}
	
	
}
