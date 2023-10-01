package enhance.chain;

public class HeadHandler implements Handler {

	private Handler handler;

	@Override
	public void setNextHandler(Handler handler) {
		this.handler = handler;
	}

	@Override
	public void handleLink(Grade grade) {
		if (grade.getAprove().toLowerCase().contains("head")) {
			System.out.println("Head of department: Yes, I approve");

		} else {
			System.out.println("Head of department saying: The instructor didn't approve the grade");
			handler.handleLink(grade);
		}
	}

}
