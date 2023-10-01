package enhance.facade;

public class SchoolOfEngineeringTechnology implements University {

	private int idET;
	private String nameET;
	private String deanET;

	public SchoolOfEngineeringTechnology() {

	}

	public SchoolOfEngineeringTechnology(int idET, String nameET, String deanET) {
		this.idET = idET;
		this.nameET = nameET;
		this.deanET = deanET;
	}

	@Override
	public void nameSchool() {
		System.out.println("School of Engineering Technology");
	}

	@Override
	public void nameProgram() {
		System.out
				.println("1. Electrical Engineering \n" + "2. Mechanical Engineering \n" + "3. Energy Engineering \n");
	}

	public int getIdET() {
		return idET;
	}

	public void setIdET(int idET) {
		this.idET = idET;
	}

	public String getNameET() {
		return nameET;
	}

	public void setNameET(String nameET) {
		this.nameET = nameET;
	}

	public String getDeanET() {
		return deanET;
	}

	public void setDeanET(String deanET) {
		this.deanET = deanET;
	}

	@Override
	public String toString() {
		return "The school: Id = " + idET + ", Name = " + nameET + ", Dean of the school = " + deanET ;
	}

}