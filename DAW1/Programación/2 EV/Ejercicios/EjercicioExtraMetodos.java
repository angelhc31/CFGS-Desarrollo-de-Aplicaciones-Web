import java.util.Scanner;
public class EjercicioExtraMetodos {
	
	public static int sacarTerminoDeFibonacci(int num){
		
		int [] temp=new int[num];
		
		temp[0]=1;
		
		if(num>=2)
			temp[1]=1;		
		
		for(int i=2; i<num; i++){
			temp[i]=temp[i-1]+temp[i-2];
		}
		
		return temp[temp.length-1];
	}
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int num;
		
		System.out.print("Introduce el numero: ");
		num=sc.nextInt();
		
		System.out.println();
		
		System.out.println("El termino numero "+num+" de la serie de Fibonacci es el "+sacarTerminoDeFibonacci(num));
		
	}
}

