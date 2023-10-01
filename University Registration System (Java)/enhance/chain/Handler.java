package enhance.chain;

public interface Handler {
	
	void setNextHandler(Handler handler);
	void handleLink(Grade grade);

}
