import java.util.Scanner;
public class Ejercicio12x3 {
	
	public static void main (String[] args) {
		
		int punt;
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce la puntuacion: ");
		punt=sc.nextInt();
		
		System.out.println();
		
		for(int i=1; i<7; i++){
			for(int z=1; z<7; z++){
				if(i+z==punt)
					System.out.println(i+"+"+z);
					
			}
		}
	}
}

