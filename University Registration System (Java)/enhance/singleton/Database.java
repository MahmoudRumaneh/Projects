package enhance.singleton;

import java.util.HashMap;
import java.util.Map;

public class Database {

	public static Database instance;
	private Map<String, String> configDatabaseInfo;

	private Database() {
		configDatabaseInfo = new HashMap<String, String>();
		configDatabaseInfo.put("host", "reg-db.htu.edu.jo");
		configDatabaseInfo.put("port", "1521");
		configDatabaseInfo.put("database", "ORCL");
		configDatabaseInfo.put("username", "reg");
		configDatabaseInfo.put("password", "Reg#2022");
	}

	public String get(String key) {
		return configDatabaseInfo.get(key);
	}

	public String update(String key, String value) {
		return configDatabaseInfo.put(key, value);
	}

	public static Database getInstance() {
		if (instance == null) {
			instance = new Database();
		}
		return instance;
	}

}
