import java.util.Scanner;
public class EjerciciosIniciales2_1 {
	
	public static int sumarImpares(int numLimite){
		
		int suma=0;
		int contImpares=0;
		
		for(int i=1; contImpares!=numLimite; i++){
			if(i%2!=0){
				suma=suma+i;
				contImpares++;
			}
		}
		
		return suma;
	}
	
	public static void main (String[] args) {
		
		int n;
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Escribe un numero: ");
		n=sc.nextInt();
		
		System.out.println("La suma es "+sumarImpares(n));
	}
}

