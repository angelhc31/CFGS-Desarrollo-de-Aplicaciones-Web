import java.util.Scanner;
public class Ejercicio6 {
	
	public static void main (String[] args) {
		
			double ladoA;
			double ladoB;
			double ladoC;
			Scanner sc=new Scanner(System.in);
			
			System.out.print("Introduce el primer lado: ");
			ladoA=sc.nextDouble();
			
			System.out.println();
			
			System.out.print("Introduce el segundo lado: ");
			ladoB=sc.nextDouble();
			
			System.out.println();
			
			System.out.print("Introduce el tercer lado: ");
			ladoC=sc.nextDouble();
			
			System.out.println();
			
		if(ladoA<=ladoB+ladoC && ladoB<=ladoA+ladoC && ladoC<=ladoA+ladoB){
			System.out.println("El triangulo si que es valido.");
				
			System.out.println();
				
			if(ladoA==ladoB && ladoA==ladoC){
				System.out.println("Es un triangulo equilatero.");
			}
				
			if((ladoA==ladoB && ladoA!=ladoC) || (ladoB==ladoC && ladoB!=ladoA) || 
			(ladoA==ladoC && ladoA!=ladoB)){
				System.out.println("Es un triangulo isosceles.");	
			}
				
			if(ladoA!=ladoB && ladoA!=ladoC && ladoB!=ladoC){
				System.out.println("Es un triangulo escaleno.");
			}
		}		
		else{
			System.out.println("El triangulo no es valido.");		
		}		
	}					
}
