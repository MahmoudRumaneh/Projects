package university;

public class Program {

	private int id;
	private String name;
	private int creditHourFees;
	private String headDepartment;

	public Program() {

	}

	

	public Program(int id, String name, int creditHourFees, String headDepartment) {
		super();
		this.id = id;
		this.name = name;
		this.creditHourFees = creditHourFees;
		this.headDepartment = headDepartment;
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

	public double getCreditHourFees() {
		return creditHourFees;
	}

	public String getHeadDepartment() {
		return headDepartment;
	}

	public void setHeadDepartment(String headDepartment) {
		this.headDepartment = headDepartment;
	}

	
	public void setCreditHourFees(int creditHourFees) {
		this.creditHourFees = creditHourFees;
	}

	@Override
	public String toString() {
		return "" + name + ", creditHourFees=" + creditHourFees + ", headDepartment="
				+ headDepartment + ",\n";
	}


}
