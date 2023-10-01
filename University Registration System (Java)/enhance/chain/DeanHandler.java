package enhance.chain;

public class DeanHandler implements Handler {

	private Handler handler;

	@Override
	public void setNextHandler(Handler handler) {
		this.handler = handler;
	}

	@Override
	public void handleLink(Grade grade) {
		if (grade.getAprove().toLowerCase().contains("dean")) {
			System.out.println("Dean of school approving: Yes, I approve");
		} else {
			System.out.println("Dean of school saying: The Head of the department didn't approve the grade");
			handler.handleLink(grade);
		}
	}

}
