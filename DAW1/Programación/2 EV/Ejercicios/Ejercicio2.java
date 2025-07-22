import java.util.Scanner;
public class Ejercicio2 {
	
	public static char letraDNI(int DNI){
		
		char [] posiblesLetras={'T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'};
		
		return posiblesLetras[DNI%23];
	}
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int DNI;
		
		System.out.print("Introduce tu DNI: ");
		DNI=sc.nextInt();
		
		System.out.println();
		
		System.out.println("La letra es "+letraDNI(DNI)+", por lo tanto el NIE es "+DNI+letraDNI(DNI));
		
	}
}

