import java.util.Scanner;
public class EjerciciosIniciales2 {
	
	public static String numsEntre(int num1, int num2){
		String numsFinales="";
		
		if(num1<num2){
			for(int i=num1; i<=num2; i++)
				numsFinales=numsFinales+String.valueOf(i)+" ";
		}
		else{
			for(int i=num2; i<=num1; i++)
				numsFinales=numsFinales+String.valueOf(i)+" ";
		}
		
		return numsFinales;
	}
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int num1;
		int num2;
		
		System.out.print("Introduce el primer numero: ");
		num1=sc.nextInt();
		
		System.out.println();
		
		System.out.print("Introduce el segundo numero: ");
		num2=sc.nextInt();
		
		System.out.println();
		System.out.println();
		
		System.out.println(numsEntre(num1,num2));
	}
}

