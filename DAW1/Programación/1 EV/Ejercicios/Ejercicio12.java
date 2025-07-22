import java.util.Scanner;
public class Ejercicio12 {
	
	public static void main (String[] args) {
		
		int num;
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce el numero: ");
		num=sc.nextInt();
		
		System.out.println();
		
		System.out.print(num+" ");
		
		while(num>1){
			
			if(num%2==0){
				num=num/2;
				System.out.print(num+" ");
			}
			else{
				num=num*3+1;
				System.out.print(num+" ");
			}
		}
	}
}
