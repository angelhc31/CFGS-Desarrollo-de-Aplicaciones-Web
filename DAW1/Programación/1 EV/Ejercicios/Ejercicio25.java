import java.util.Scanner;
public class Ejercicio25 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int dia=0;
		int mes=0;
		int year=0;
		int suma=0;
		String fecha;
		
		System.out.print("Introduce tu fecha: ");
		fecha=sc.nextLine();
		
		dia=Integer.parseInt(fecha.trim().substring(0,2));
		mes=Integer.parseInt(fecha.trim().substring(3,5));
		year=Integer.parseInt(fecha.trim().substring(6,10));
		
		System.out.println();
		
		suma=dia+mes+year;
		
		System.out.println(dia+"+"+mes+"+"+year+"="+suma);
		
		System.out.println();
		
		while(suma>=10){
			fecha=String.valueOf(suma);
			
			suma=0;
			
			for(int i=0; i<fecha.length()-1; i++){
				System.out.print(fecha.charAt(i)+"+");
			}
			
			System.out.print(fecha.charAt(fecha.length()-1)+"=");
			
			for(int i=0; i<fecha.length(); i++){
				suma=suma+Integer.parseInt(fecha.substring(i,i+1));			
			}
			
			System.out.println(suma);
			
			System.out.println();			
		}
	 	
		System.out.println("Tu lucky number es: "+suma);
		
	}
}
