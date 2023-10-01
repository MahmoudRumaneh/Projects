package enhance.template;

import java.util.Date;
import java.util.List;
import university.InstructorStudent;
import university.Student;
import university.StudentCourse;


public class TextPrinter extends SchedulePrinter {

	Date currentDate = new Date();
	protected String header(InstructorStudent instructorStudent,Student student) {
		return "Advanced Programming Project: Student Schedule:\n\n\n\n" + instructorStudent.getName() + ", "+instructorStudent.getSchool() +", "+ student.getProgram()+ ", "+ currentDate+ " \n";
	}

	@Override
	protected String content(List<StudentCourse> studentcourses, Student student) {
		return "Courses Information: " + studentcourses+"\nThe Average is: "+student.getAvg()+"\n\n\n\n\n\n\n" ;
	}

	@Override
	protected String footer(Schedule schedule, Student student) {
		StringBuilder builder = new StringBuilder("The total of credit hours is: "+student.totalCreditHours());
				
		
		return builder.toString();
	}

	@Override
	protected String end() {
		return " ";
	}


}
