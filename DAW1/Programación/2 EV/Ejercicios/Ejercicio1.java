import java.util.Scanner;
public class Ejercicio1 {
	
	public static boolean esPalindromo(String frase){
		
		boolean palindromo=true;
		
		frase=frase.toUpperCase();
		frase=quitarEspacios(frase);
		
		for(int i=0, j=frase.length()-1; i<j; i++, j--){
			if(frase.charAt(i)!=frase.charAt(j))
				palindromo=false;
		}
		
		return palindromo;
	}
	
	public static String quitarEspacios(String frase){
		
		String fraseSinEsp="";
		
		for(int i=0; i<frase.length(); i++){
			if(frase.charAt(i)!=' ')
				fraseSinEsp=fraseSinEsp+frase.charAt(i);
		}

		return fraseSinEsp;
	}
	
	public static void main (String[] args) {
			
		String frase;
		Scanner sc=new Scanner(System.in);
			
		System.out.print("Introduce la frase: ");
		frase=sc.nextLine();
		
		System.out.println();
		
		if(esPalindromo(frase)==true)
			System.out.println("La frase es un palindromo");
		else
			System.out.println("La frase no es un palindromo");
		
	}
}

