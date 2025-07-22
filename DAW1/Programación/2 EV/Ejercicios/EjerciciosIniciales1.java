import java.util.Scanner;
public class EjerciciosIniciales1 {
	
	public static double areaCircunf(double radio){
		double area;
		area=Math.PI*Math.pow(radio,2);
		return area;
	}
	
	public static void main (String[] args) {
		
		double radio;
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce el radio: ");
		radio=sc.nextDouble();
		
		System.out.println();
		System.out.println("El area es: "+areaCircunf(radio));
	}
}

