package example.proxy;

public class TestProxy {

	public static void main(String[] args) {
			
		Download download = new ProxyDownload();
		
		try {
			
			download.downloadFrom("mahmoud.txt");
			download.downloadFrom("a.txt");
			
		} catch (Exception e) {

			System.out.println(e.getMessage());
			
		}
		
		

	}

}
