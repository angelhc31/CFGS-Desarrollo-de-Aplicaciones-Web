import java.util.Scanner;
public class ExplicacionMetodos2 {
	
	public static int contarLetra(String text,char letter){
		
		int cont=0;
		for(int i=0; i<text.length(); i++){
			if(text.charAt(i)==letter)
				cont++;
		}
		return cont;
	}
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		String txt;
		char letra;
		
		System.out.print("Introduce un texto: ");
		txt=sc.nextLine();
		System.out.print("Introduce una letra: ");
		letra=sc.nextLine().charAt(0);
		
		System.out.println("La letra '"+ letra + "' se repite " + contarLetra(txt,letra) + " veces");
	}
}

