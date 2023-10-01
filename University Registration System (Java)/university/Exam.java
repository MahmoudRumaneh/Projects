package university;

public class Exam {

	private int firstExam;
	private int secondExam;
	private int thirdExam;
	private int midExam;
	private int finalExam;

	public Exam() {

	}

	public Exam(int firstExam, int secondExam, int thirdExam, int midExam, int finalExam) {
		super();
		this.firstExam = firstExam;
		this.secondExam = secondExam;
		this.thirdExam = thirdExam;
		this.midExam = midExam;
		this.finalExam = finalExam;
	}

	public int getFirstExam() {
		return firstExam;
	}

	public void setFirstExam(int firstExam) {
		this.firstExam = firstExam;
	}

	public int getSecondExam() {
		return secondExam;
	}

	public void setSecondExam(int secondExam) {
		this.secondExam = secondExam;
	}

	public int getThirdExam() {
		return thirdExam;
	}

	public void setThirdExam(int thirdExam) {
		this.thirdExam = thirdExam;
	}

	public int getMidExam() {
		return midExam;
	}

	public void setMidExam(int midExam) {
		this.midExam = midExam;
	}

	public int getFinalExam() {
		return finalExam;
	}

	public void setFinalExam(int finalExam) {
		this.finalExam = finalExam;
	}

	@Override
	public String toString() {
		return "Exam [firstExam=" + firstExam + ", secondExam=" + secondExam + ", thirdExam=" + thirdExam + ", midExam="
				+ midExam + ", finalExam=" + finalExam + "]";
	}



}
