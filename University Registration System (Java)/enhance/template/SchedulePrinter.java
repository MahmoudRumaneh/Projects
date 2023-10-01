package enhance.template;

import java.io.FileWriter;
import java.io.IOException;
import java.io.Writer;
import java.util.List;
import university.InstructorStudent;
import university.Student;
import university.StudentCourse;

public abstract class SchedulePrinter {

	 

	protected abstract String header(InstructorStudent instructorStudent,Student student);

	protected abstract String content(List<StudentCourse> studentcourse, Student student);

	protected abstract String footer(Schedule schedule, Student student);

	protected abstract String end();

	public final void printScedule(Schedule schedule, String fileName, InstructorStudent instructorStudent, Student student, List<StudentCourse> studentcourses)
			throws IOException {

		Writer fw = new FileWriter(fileName);
		fw.write(header(instructorStudent, student));
		fw.write(content(studentcourses, student));
		fw.write(footer(schedule, student));
		fw.write(end());
		fw.close();
	}



	
}
