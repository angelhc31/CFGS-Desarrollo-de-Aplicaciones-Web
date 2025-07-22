import java.util.Scanner;
public class Ejercicio13 {
	
	public static void main (String[] args) {
		
		int year;
		Scanner sc=new Scanner(System.in);
		
		//Pongo year en los sout porque la ñ no la ejecuta bien.
		
		System.out.print("Introduce el year deseado: ");
		year=sc.nextInt();
		
		System.out.println();
		
		if(year%100!=0){
			if(year%4==0){
				
				System.out.println("El year es bisiesto.");
				
			}
			else{
				
				System.out.println("El year no es bisiesto.");
				
			}
		}
		else if(year%400==0){
			
				System.out.println("El year es bisiesto.");
				
			}
			else{
				
				System.out.println("El year no es bisiesto.");
				
			}	
	}
}

