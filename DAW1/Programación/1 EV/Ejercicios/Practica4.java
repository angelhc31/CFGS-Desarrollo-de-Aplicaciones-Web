import java.util.Scanner;
public class Practica4 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		String txt;
		int cont=0;
		
		System.out.print("Introduce un texto: ");
		txt=" "+sc.nextLine();
		
		System.out.println();
		
		for(int i=0; i<txt.length()-1; i++){
			
			if(txt.charAt(i)==' ' && txt.charAt(i+1)!=' '){
					cont++;
			}
		}
		if(cont>0)
			System.out.print("Este texto tiene "+cont+" palabras.");
		else
			System.out.print("No hay palabras en el texto.");
	}
}

