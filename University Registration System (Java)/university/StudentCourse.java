package university;

public class StudentCourse {

	private Course course;
	private int year;
	private String semester;
	private int section;
	private String grade;
	private int totalGrades;
	public StudentCourse() {

	}

	public StudentCourse(Course course, int year, String semester, int section, String grade, int totalGrades) {
		super();
		this.course = course;
		this.year = year;
		this.semester = semester;
		this.section = section;
		this.grade = grade;
		this.totalGrades =totalGrades;
	}

	public StudentCourse(Course course, int year, String semester, int section) {
		super();
		this.course = course;
		this.year = year;
		this.semester = semester;
		this.section = section;
	}

	public Course getCourse() {
		return course;
	}

	public void setCourse(Course course) {
		this.course = course;
	}

	public int getYear() {
		return year;
	}

	public void setYear(int year) {
		this.year = year;
	}

	public String getSemester() {
		return semester;
	}

	public void setSemester(String semester) {
		this.semester = semester;
	}

	public int getSection() {
		return section;
	}

	public void setSection(int section) {
		this.section = section;
	}
	public String getGrade() {
		return grade;
	}

	public void setGrade(String grade) {
		this.grade = grade;
	}

	
	public int getTotalGrades() {
		return totalGrades;
	}

	public void setTotalGrades(int totalGrades) {
		this.totalGrades = totalGrades;
	}

	@Override
	public String toString() {
		return "" + course + ", Year: " + year + ", Semester: " + semester + ", Section: " + section
				+", Sum of Marks: "+totalGrades+", Grade: " + grade +"]\n<br>";
	}


}
