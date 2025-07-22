import java.util.Scanner;
public class Practica1{
	
	public static void main (String[] args) {
		
		double var1;
		double var2;
		int op;
		double resp=0;
		
		Scanner sc=new Scanner(System.in);
		
		do{
				System.out.print("Introduce el primer numero: ");
				var1=sc.nextDouble();
				
				System.out.println();
				
				System.out.print("Introduce el segundo numero: ");
				var2=sc.nextDouble();
				
				System.out.println();
				
			do{	
				System.out.println("1-Sumar");
				System.out.println("2-Restar");
				System.out.println("3-Multiplicar");
				System.out.println("4-Dividir");
				System.out.println("5-Volver a introducir los numeros");
				System.out.println("6-Salir");
				
				System.out.println();
				
				System.out.print("Selecciona una operacion a ejecutar: ");
				op=sc.nextInt();
				
				System.out.println();
				
				switch (op){
					case 1: resp=var1+var2;
							System.out.println("El resultado es: "+resp);
							break;
					case 2: resp=var1-var2;
							System.out.println("El resultado es: "+resp);
							break;
					case 3: resp=var1*var2;
							System.out.println("El resultado es: "+resp);
							break;
					case 4: if(var2!=0){
								resp=var1/var2;
								System.out.println("El resultado es: "+resp);
							}
							else{
								System.out.println("Error matematico.");
							}
							break;
					case 6: System.out.println("Calculadora cerrada.");
			
				}
				if(op<1 || op>6){
					System.out.println();
					
					System.out.println("Operacion no valida, selecciona una de estas:");
				}
			}
			while(op<1 || op>6);
			
			System.out.println();
			
		}
		while(op>=1 && op<6);
	}
}
