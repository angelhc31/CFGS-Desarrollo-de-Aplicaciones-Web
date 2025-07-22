import java.util.Scanner;
public class Ejercicio4{
	
	public static void main (String[] args) {
		
		double var1;
		double var2;
		int operacion;
		double resp=0;
		
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce el primer numero: ");
		var1=sc.nextDouble();
		
		System.out.println();
		
		System.out.print("Introduce el segundo numero: ");
		var2=sc.nextDouble();
		
		System.out.println();
		
		System.out.println("1-Sumar");
		System.out.println("2-Restar");
		System.out.println("3-Multiplicar");
		System.out.println("4-Dividir");
		
		System.out.println();
		
		System.out.print("Selecciona una operacion a ejecutar: ");
		operacion=sc.nextInt();
		
		System.out.println();
		
		switch (operacion){
			case 1: resp=var1+var2;
					System.out.println("El resultado es: "+resp);
					break;
			case 2: resp=var1-var2;
					System.out.println("El resultado es: "+resp);
					break;
			case 3: resp=var1*var2;
					System.out.println("El resultado es: "+resp);
					break;
			case 4: if(var1!=0 || var2!=0){
						resp=var1/var2;
						System.out.println("El resultado es: "+resp);
					}
					else{
						System.out.println("Error matematico.");
					}
					break;
			default: System.out.println("Operacion no valida.");
		}
	}
}
