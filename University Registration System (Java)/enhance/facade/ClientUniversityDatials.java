package enhance.facade;

import java.util.Scanner;

public class ClientUniversityDatials {

	public static void main(String[] args) {
		int j = 0;
		UniversityDetails h = new UniversityDetails();
		while (j != 3) {
			System.out.print("**************** ");
			System.out.print("Welcome to Al-Hussein Technical University");
			System.out.println(" ****************");
			System.out.println("1. School of Computing and Informatics");
			System.out.println("2. School of Engineering Technology");
			System.out.println("3. Exit");
			System.out.println("**************************************************************");

			switch (j) {
			case 1: {

				h.schoolcomputDetails();
				System.out.println("You entnerd the computing school successfully");
			}
				break;
			case 2: {

				h.schoolengDetalis();
				System.out.println("You entnerd the engineering school successfully");
			}
				break;
			case 3: {
				break;
			}

			}
		}
	}
}
