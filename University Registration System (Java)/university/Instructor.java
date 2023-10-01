package university;

import java.util.ArrayList;
import java.util.List;

public class Instructor {

	private int salary;
	private List<Exam> exams = new ArrayList<Exam>();

	public Instructor() {

	}

	public Instructor(int salary) {
		super();
		this.salary = salary;

	}

	public int getSalary() {
		return salary;
	}

	public void setSalary(int salary) {
		this.salary = salary;
	}

	public List<Exam> getExams() {
		return exams;
	}

	public void addExams(Exam... exam) {

		for (int i = 0; i < exam.length; i++) {
			exams.add(exam[i]);
		}
	}
	public int totalGrades(Exam...exams) {
		int totalGrades = 0;
		for (Exam exam : exams) {

			totalGrades += ((exam.getFirstExam() + exam.getSecondExam() + exam.getThirdExam() + exam.getMidExam()
					+ exam.getFinalExam()));
		}
		return totalGrades;
	}
	
	public String getGrade(Exam...exams) {
		int totalGrades = 0;
		List <String> list1 = new ArrayList<>();
		list1.add("A");
		list1.add("B");
		list1.add("C");
		list1.add("D");
		list1.add("F");
		String string1=null;
		for (Exam exam : exams) {

			totalGrades += ((exam.getFirstExam() + exam.getSecondExam() + exam.getThirdExam() + exam.getMidExam()
					+ exam.getFinalExam()));
			if (totalGrades >= 90 && totalGrades <= 100) {
				System.out.println("the Mark is "+list1.get(0));
				string1=list1.get(0);
			} else if (totalGrades >= 80 && totalGrades <= 89) {
				System.out.println("the Mark is "+list1.get(1));
				string1=list1.get(1);
			} else if (totalGrades >= 70 && totalGrades <= 79) {
				System.out.println("the Mark is "+list1.get(2));
				string1=list1.get(2);
			} else if (totalGrades >= 60 && totalGrades <= 69) {
				System.out.println("the Mark is "+list1.get(3));
				string1=list1.get(3);
			} else {
				System.out.println("the Mark is "+list1.get(4));
				string1=list1.get(4);
			}
			return string1;
		}
		return string1;
	}

	
	@Override
	public String toString() {
		return "Instructor [salary=" + salary + ", exams=" + exams + "]";
	}

}
