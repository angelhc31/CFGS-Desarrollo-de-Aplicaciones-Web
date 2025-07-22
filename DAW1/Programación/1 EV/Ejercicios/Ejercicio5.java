import java.util.Scanner;
public class Ejercicio5 {
	
	public static void main (String[] args) {
		
		double nota;
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce tu nota: ");
		nota=sc.nextDouble();
		
		System.out.println();
		
		if(nota<5 && nota>=0)
			System.out.println("Suspenso.");
			
		if(nota>=5 && nota<6)
			System.out.println("Aprobado.");
			
		if(nota>=6 && nota<7.5)
			System.out.println("Bien.");
			
		if(nota>=7.5 && nota<9)
			System.out.println("Notable.");
			
		if(nota>=9 && nota<10)
			System.out.println("Sobresaliente.");
			
		if(nota==10)
			System.out.println("Excelente.");
			
		if(nota<0 || nota>10)
			System.out.println("Nota no permitida.");
	}
}
