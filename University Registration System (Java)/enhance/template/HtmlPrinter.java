package enhance.template;

import java.util.Date;
import java.util.List;
import university.InstructorStudent;
import university.Student;
import university.StudentCourse;

public class HtmlPrinter extends SchedulePrinter {

	Date currentDate = new Date();
	
	@Override
	protected String header(InstructorStudent instructorStudent,Student student) {
		return "<html><head><title>Advanced programing </title></head><body><h1> Advanced programing Project: Student Schedule:<br><h2>Student name:"+ instructorStudent.getName() + ", School "+instructorStudent.getSchool() +", Program: "+ student.getProgram()+ ", Current Date: "+ currentDate+ "</h2></h1>";
	}

	@Override
	protected String content(List<StudentCourse> studentcourses, Student student) {
		return "<h2><br>Courses Information:<br><h3>" + studentcourses+"<br>The average is: "+student.getAvg()+"</h3><br></h2>";
	}

	@Override
	protected String footer(Schedule schedule, Student student) {
		StringBuilder builder = new StringBuilder("<br><br><br><br><br><br><br><footer><h1> The total of credit hours is: "+student.totalCreditHours());
		
		builder.append("</h1></footer>");
		return builder.toString();
	}

	@Override
	protected String end() {
		return "</body></html>";
	}

	
	

}
