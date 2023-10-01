package enhance.template;

import java.time.LocalDate;

public class Schedule {

	private int id;
	private LocalDate date;

	public Schedule(int id) {
		this.id = id;
		this.date = LocalDate.now();
	}

	public int getId() {
		return id;
	}

	public LocalDate getDate() {
		return date;
	}

}
