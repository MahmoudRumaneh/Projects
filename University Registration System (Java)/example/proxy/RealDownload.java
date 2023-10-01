package example.proxy;

public class RealDownload implements Download {

	@Override
	public void downloadFrom(String targetFile) throws Exception {
		System.out.println("Download from "+targetFile);
		

	}

}
