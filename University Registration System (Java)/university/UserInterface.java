package university;

import java.io.IOException;
import java.util.*;

import enhance.chain.DeanHandler;
import enhance.chain.Grade;
import enhance.chain.HeadHandler;
import enhance.chain.InstructorHandler;
import enhance.singleton.Database;
import enhance.template.HtmlPrinter;
import enhance.template.Schedule;
import enhance.template.SchedulePrinter;
import enhance.template.TextPrinter;
import university.strategy.Context;
import university.strategy.PayThenRegister;
import university.strategy.RegisterThenPay;

public class UserInterface {

	public static void main(String[] args) throws IOException {

		Database user1 = Database.getInstance();

		System.out.println(user1.get("username"));

		user1.update("password", "Reg#2022");
		System.out.println(user1.get("password"));
		System.out.println("You are connecting successfully to Oracel database");

		School school1 = new School(1, "School of Computing and Informatics", "Dr.Mohammad");
		School school2 = new School(2, "School of Engineering Technology", "Dr.Ali");

		Program program1 = new Program(14507, "Computer Science", 30, "Dr.Mahmoud");
		Program program2 = new Program(14508, "CyberSecurty", 50, "Dr.Saleem");
		Program program3 = new Program(14509, "Data Science", 75, "Dr.Emran");

		Program program4 = new Program(7825043, "Energy Engineering", 50, "Dr.Alia");
		Program program5 = new Program(7825044, "Electrical Engineering", 40, "Dr.Rasha");
		Program program6 = new Program(7825045, "Mechanical Engineering", 45, "Dr.Mazen");

		Course course1 = new Course(103101, "Stem Lab I", 1);
		Course course2 = new Course(30201100, "Fundamentals of Computing", 4);
		Course course3 = new Course(30201101, "Programming", 3);
		Course course4 = new Course(30201102, "Website Design & Development", 3);
		Course course5 = new Course(30201110, "Networking", 3);

		Course course6 = new Course(30303111, "Functional Math", 3);
		Course course7 = new Course(101112, "Engineering Design", 4);
		Course course8 = new Course(101231, "Dynamics and Vibrations", 2);
		Course course9 = new Course(101442, "Heat and Mass Transfer", 3);
		Course course10 = new Course(101571, "Building Services", 3);

		InstructorStudent /* i1 */ instructorS1 = new InstructorStudent(115, "Muhammad", school1);
		InstructorStudent instructorS2 = new InstructorStudent(116, "Salma", school1);
		InstructorStudent instructorS3 = new InstructorStudent(117, "Rami", school1);
		InstructorStudent instructorS4 = new InstructorStudent(118, "Wasayef", school1);
		InstructorStudent instructorS5 = new InstructorStudent(119, "Hamzeh", school1);

		Instructor /* i5 */ instructor1 = new Instructor(4500);
		Instructor instructor2 = new Instructor(4200);
		Instructor instructor3 = new Instructor(5000);
		Instructor instructor4 = new Instructor(3500);
		Instructor instructor5 = new Instructor(6100);

		InstructorStudent instructorS6 = new InstructorStudent(120, "Marwan", school2);
		InstructorStudent instructorS7 = new InstructorStudent(121, "Ma'an", school2);
		InstructorStudent instructorS8 = new InstructorStudent(122, "Zaina", school2);
		InstructorStudent instructorS9 = new InstructorStudent(123, "Malak", school2);
		InstructorStudent instructorS0 = new InstructorStudent(124, "Ahmad", school2);

		Instructor /* i5 */ instructor6 = new Instructor(4200);
		Instructor instructor7 = new Instructor(6000);
		Instructor instructor8 = new Instructor(5500);
		Instructor instructor9 = new Instructor(4000);
		Instructor instructor10 = new Instructor(6500);

		InstructorStudent studentI1/* s1 */ = new InstructorStudent(15, "Mahmoud", school1);
		Student /* s11 */ student1 = new Student(program1);
		InstructorStudent studentI2 = new InstructorStudent(20, "Ahmad", school2);
		Student student2 = new Student(program4);

		Exam exam1 = new ExamBulider(40, 40).setFirstExam(10).setSecondExam(8).buildExam();
		Exam exam2 = new ExamBulider(25, 30).setFirstExam(7).setSecondExam(9).setThirdExam(10).buildExam();
		Exam exam3 = new ExamBulider(23, 22).setFirstExam(15).buildExam();
		Exam exam4 = new ExamBulider(14, 12).setFirstExam(8).buildExam();
		Scanner sc = new Scanner(System.in);
		int choice = 0;
		do {
			System.out.print("You need to do first:\n1. regsiter then pay\n2. pay then rigester\n3. Exit\nEnter your choice: ");
			choice = sc.nextInt();
			String str = "Your choice is: ";
			switch (choice) {
			case 1: {
				
				Context context = new Context(new RegisterThenPay());
				System.out.println(str + context.executeStrategy(str));
				System.out.println("*********************************************************");
				System.out.println("The courses are: \n" + course1 + course2 + course3+ course4 + course5 + course6
						+ course7 + course8 + course9 + course10);
				System.out.println("*********************************************************");
				StudentCourse studentCourse1 = new StudentCourse(course2, 2022, "Winter", 4);
				StudentCourse studentCourse2 = new StudentCourse(course3, 2022, "Winter", 7);
				StudentCourse studentCourse3 = new StudentCourse(course4, 2022, "Winter", 1);
				StudentCourse studentCourse4 = new StudentCourse(course5, 2022, "Winter", 1);
				student1.addCourse(studentCourse1, studentCourse2, studentCourse3, studentCourse4);
				System.out.println(student1);
				System.out.println("The fees for the courses is: " + student1.calcReqFees());
				System.out.println("*********************************************************");
				student1.dropCourse(studentCourse4);
				System.out.println("After drop courses: " + student1);
				System.out.println("The fees for the courses after drop is: " + student1.calcReqFees());

			}
				break;
			case 2: {
				Context context = new Context(new PayThenRegister());
				System.out.println(str + context.executeStrategy(str));
				Scanner scanner = new Scanner(System.in);
				System.out.print("Enter the amount of money you want to: ");
				int money = scanner.nextInt();

				System.out.println("The fees for the courses is: " + money);
				System.out.println("The all courses are: " + course1 + course2 + course3 + course4 + course5 + course6
						+ course7 + course8 + course9 + course10);

				StudentCourse studentCourse1 = new StudentCourse(course6, 2022, "Spring", 2);
				StudentCourse studentCourse2 = new StudentCourse(course8, 2022, "Spring", 3);
				StudentCourse studentCourse3 = new StudentCourse(course7, 2022, "Spring", 3);
				StudentCourse studentCourse4 = new StudentCourse(course10, 2022, "Spring", 1);

				student2.addCourse(studentCourse1, studentCourse2, studentCourse3, studentCourse4);
				System.out.println(student2);
				System.out.println("The fees for the courses is: " + student2.calcReqFees() + " The rest of your money "
						+ (money - student2.calcReqFees()));
				student2.dropCourse(studentCourse1);
				System.out.println("Your courese after the drop: " + student2);
				System.out.println("The fees for the courses is: " + student2.calcReqFees() + " The rest of your money "
						+ (money - student2.calcReqFees()));
			}
				break;
			case 3: {
				break;
			}

			}

		} while (choice != 3);

		StudentCourse studentCourse1 = new StudentCourse(course1, 2022, "Spring", 1, instructor1.getGrade(exam1),instructor1.totalGrades(exam1));
		StudentCourse studentCourse2 = new StudentCourse(course4, 2022, "Spring", 4, instructor4.getGrade(exam2),instructor1.totalGrades(exam2));
		StudentCourse studentCourse3 = new StudentCourse(course5, 2022, "Spring", 2, instructor5.getGrade(exam3),instructor1.totalGrades(exam3));
		StudentCourse studentCourse4 = new StudentCourse(course2, 2022, "Spring", 1, instructor2.getGrade(exam4),instructor1.totalGrades(exam4));
		student1.addCourse(studentCourse1, studentCourse2, studentCourse3, studentCourse4);
		instructor1.addExams(exam1);
		instructor4.addExams(exam2);
		instructor5.addExams(exam3);
		instructor2.addExams(exam4);

		student1.calcSemesterAvg();
		System.out.println("The avg is: " + student1.calcSemesterAvg(exam1, exam2, exam3, exam4));

		Schedule schedule1 = new Schedule(1);
		SchedulePrinter schedulePrinter = new TextPrinter();
		schedulePrinter.printScedule(schedule1, "d:\\student1.txt", studentI1, student1, student1.getStudentcourses());

		schedulePrinter = new HtmlPrinter();
		schedulePrinter.printScedule(schedule1, "d:\\student1.html", studentI1, student1, student1.getStudentcourses());

		
		System.out.println("Aprroving the grades: ");
		InstructorHandler handler1 = new InstructorHandler();
		HeadHandler handler2 = new HeadHandler();
		DeanHandler handler3 = new DeanHandler();

		handler1.setNextHandler(handler2);
		handler2.setNextHandler(handler3);

		instructor1.getGrade(exam1);
		handler1.handleLink(new Grade("instructor"));
		handler2.handleLink(new Grade("head"));
		handler3.handleLink(new Grade("dean"));
		System.out.println("The grade of exam1 is aprroved");



	}

}
