	package university;

import java.util.ArrayList;
import java.util.List;

public class Student {
	private double avg;
	private Program program;
	private List<StudentCourse> studentCourses = new ArrayList<StudentCourse>();

	List<Course> courses = new ArrayList<Course>();

	public Student() {
	}

	public Student(Program program) {
		super();
		this.program = program;

	}

	public String getProgram() {
		return program.getName();
	}

	public List<StudentCourse> getStudentcourses() {
		return studentCourses;
	}

	public void setStudentcourses(List<StudentCourse> studentcourses) {
		this.studentCourses = studentcourses;
	}
	
	
	public double getAvg() {
		return avg;
	}

	public void setAvg(double avg) {
		this.avg = avg;
	}

	public void addCourse(StudentCourse... courses) {
		for (int i = 0; i < courses.length; i++) {
			studentCourses.add(courses[i]);
		}
	}

	public void dropCourse(StudentCourse... courses) {
		for (int i = 0; i < courses.length; i++) {
			studentCourses.remove(courses[i]);
		}
	}

	public double calcReqFees() {
		double totalfees = 0;
		for (StudentCourse creditHoures : studentCourses) {
			totalfees = totalfees + (creditHoures.getCourse().getCreditHours() * program.getCreditHourFees());
		}
		return totalfees;
	}
	
	public int totalCreditHours() {
		int totalCreditHours = 0;
		for (StudentCourse creditHours : studentCourses) {
			totalCreditHours = totalCreditHours + (creditHours.getCourse().getCreditHours());
		}
		return totalCreditHours;
	}

	public double calcSemesterAvg(Exam... exams) {
		double avgGrades = 0;
		double totalGrades = 0;
		for (int i = 0; i < exams.length; i++) {

			for (Exam exam : exams) {

				totalGrades += ((exam.getFirstExam() + exam.getSecondExam() + exam.getThirdExam() + exam.getMidExam()
						+ exam.getFinalExam()));

			}
		}
		avgGrades = ((totalGrades / exams.length)/100);
		avg=avgGrades;
		return avgGrades;

	}

	@Override
	public String toString() {
		return "\n [" +studentCourses + ", The avg is: "+avg+ "]\n";
	}

}
