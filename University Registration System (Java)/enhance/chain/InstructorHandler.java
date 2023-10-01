package enhance.chain;

public class InstructorHandler implements Handler {

	private Handler handler;

	@Override
	public void setNextHandler(Handler handler) {
		this.handler = handler;
	}

	@Override
	public void handleLink(Grade grade) {
		if (grade.getAprove().toLowerCase().contains("instructor")) {
			System.out.println("Instructor: Yes, i approve");

		} else {
			System.out.println("Instructor syaing: I didn't approve the grade");
			handler.handleLink(grade);
		}
	}

}
