import java.util.Scanner;
public class ExplicacionScaner{
	
	public static void main (String[] args) {
		
		int x;
		String txt;
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce un numero:");
		x=sc.nextInt();
		System.out.print("Resultado="+ x);
		
		System.out.println();
		
		sc.nextLine();
		System.out.print("Introduce un texto:");
		txt=sc.nextLine();
		System.out.print("Resultado="+txt); 
		
	}
}
