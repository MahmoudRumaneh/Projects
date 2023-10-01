package enhance.facade;

public class SchoolOfComputingAndInformatics implements University {

	private int idSC;
	private String nameSC;
	private String deanSC;

	public SchoolOfComputingAndInformatics() {

	}

	public SchoolOfComputingAndInformatics(int idSC, String nameSC, String deanSC) {
		this.idSC = idSC;
		this.nameSC = nameSC;
		this.deanSC = deanSC;
	}

	@Override
	public void nameSchool() {
		System.out.println("School of Computing and Informatics");
	}

	@Override
	public void nameProgram() {
	
		System.out.println("1. Computer Science \n" + "2. Data Science \n" + "3. Cyber Security \n");
	}

	public int getIdSC() {
		return idSC;
	}

	public void setIdSC(int idSC) {
		this.idSC = idSC;
	}

	public String getNameSC() {
		return nameSC;
	}

	public void setNameSC(String nameSC) {
		this.nameSC = nameSC;
	}

	public String getDeanSC() {
		return deanSC;
	}

	public void setDeanSC(String deanSC) {
		this.deanSC = deanSC;
	}

	@Override
	public String toString() {
		return "The school Id = " + idSC + ", Name = " + nameSC + ", Dean of the school = " + deanSC;
	}

}
