package enhance.facade;

public class UniversityDetails {

	private University schoolcomput;
	private University schooleng;

	public UniversityDetails() {
		schoolcomput = new SchoolOfComputingAndInformatics();
		schooleng = new SchoolOfComputingAndInformatics();
	}

	public void schoolcomputDetails() {
		schoolcomput.nameSchool();
		schoolcomput.nameProgram();
	}

	public void schoolengDetalis() {
		schooleng.nameSchool();
		schooleng.nameProgram();
	}
}
