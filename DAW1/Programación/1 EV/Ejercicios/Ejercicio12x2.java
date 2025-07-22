import java.util.Scanner;
public class Ejercicio12x2{
	
	public static void main (String[] args) {
		
		int n;
		double resp=0;
		Scanner sc=new Scanner(System.in);
		
		do{
			System.out.print("Introduce un numero: ");
			n=sc.nextInt();
				
			System.out.println();
			System.out.println();
				
			if(n>0){
				for(int i=1; i<=n; i++){
						
					resp=(double)i/(2*i)+resp;
					
				}
				
				System.out.println("La respuesta es: "+resp);
				
			}
			
			if(n<0)
				System.out.println("Error matematico.");
				
			if(n==0){
	
				System.out.println("No se puede ejecutar, elige otro numero.");
				System.out.println();
				
			}
		}
		while(n==0);
	}
}
 
