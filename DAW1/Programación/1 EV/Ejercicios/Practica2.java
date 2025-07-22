import java.util.Scanner;
public class Practica2 {
	
	public static void main (String[] args) {
		
		String txt;
		String car;
		int repe=0;
		Scanner sc=new Scanner(System.in);
		
		while(repe==0){
			System.out.print("Introduce un texto: ");
			txt=sc.nextLine();
			
			System.out.println();
			
			System.out.print("Introduce el caracter a contar: ");
			car=sc.nextLine();	
			
			for(int i=0; i<txt.length(); i++){
				
				if(txt.charAt(i)==car.charAt(0)){
					repe++;
				}
			}
			
			System.out.println();
			
			if(repe!=0){
			
				System.out.println("El caracter "+car.charAt(0)+" se repite "+repe+" veces.");
			
			}
			else{
				
				System.out.println("Este caracter no se encuentra en el texto.");
				
			}
			
			System.out.println();
			
		}
	}
}
