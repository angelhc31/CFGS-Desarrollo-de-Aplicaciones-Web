import java.util.Scanner;
public class Ejercicio9{
	
	public static void main (String[] args) {
		
		int num1;
		int num2;
		int numVar;
		
		Scanner sc=new Scanner(System.in);
		
		do{
			System.out.print("Introduce el primer numero:");
			num1=sc.nextInt();
			
			numVar=num1;
			
			System.out.println();
			
			System.out.print("Introduce el segundo numero:");
			num2=sc.nextInt();
			
			System.out.println();
		
		
			if(num1<num2){
				
				while(numVar<=num2){
					
					System.out.print(numVar + " ");
					
					numVar=numVar+1;
				}	
			}
			
			else{

				while(numVar>=num2 && num1!=num2){
					
					System.out.print(numVar + " ");
					
					numVar=numVar-1;
				}	
			}
			if(num1==num2){
				System.out.println("Error, numeros iguales.");
				
				System.out.println();
			}
		}
		while(num1==num2);
	}
}
