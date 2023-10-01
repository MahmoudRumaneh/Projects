package university;

public class ExamBulider {

	private int firstExam;
	private int secondExam;
	private int thirdExam;
	private int midExam;
	private int finalExam;

	public ExamBulider(int midExam, int finalExam) {
		super();
		this.midExam = midExam;
		this.finalExam = finalExam;
	}

	public ExamBulider setFirstExam(int firstExam) {
		this.firstExam = firstExam;
		return this;
	}

	public ExamBulider setSecondExam(int secondExam) {
		this.secondExam = secondExam;
		return this;
	}

	public ExamBulider setThirdExam(int thirdExam) {
		this.thirdExam = thirdExam;
		return this;
	}

	public ExamBulider setMidExam(int midExam) {
		this.midExam = midExam;
		return this;
	}

	public ExamBulider setFinalExam(int finalExam) {
		this.finalExam = finalExam;
		return this;
	}
	public Exam buildExam() {
		return new Exam(firstExam, secondExam, thirdExam, midExam, finalExam);
	}
}
