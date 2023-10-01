package example.proxy;

import java.util.*;

public class ProxyDownload implements Download {

	private Download download = new RealDownload();
	private static List<String> unauthorizedFiles;
	
	
	static {
		unauthorizedFiles = new ArrayList<String>();
		unauthorizedFiles.add("a.txt");
		unauthorizedFiles.add("project.txt");
		unauthorizedFiles.add("order.txt");
	}
	
	@Override
	public void downloadFrom(String targetFile) throws Exception {
		if(unauthorizedFiles.contains(targetFile.toLowerCase())){
			throw new Exception("Access Denied");
			
		}
		
		download.downloadFrom(targetFile);

	}

}
