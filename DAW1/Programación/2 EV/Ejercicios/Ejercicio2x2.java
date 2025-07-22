import java.util.Scanner;
public class Ejercicio2x2 {
	
	public static String comprimirTexto(String txt){
		
		String txtComp=" ";
		int a=0;
		
		while(a<txt.length()){
				
			if(contarLetras(txt,a)>1)
				txtComp=txtComp+txt.charAt(a)+String.valueOf(contarLetras(txt,a));
			else
				txtComp=txtComp+txt.charAt(a);
				
			a=a+contarLetras(txt,a);
		}
		
		return txtComp;
	}
	
	public static String descomprimirTexto(String txt){
		
		String txtDescomp="";
		
		for(int i=0; i<txt.length(); i++){
			if(!esLetra(txt.charAt(i)) && esLetra(txt.charAt(i-1))){
				for(int j=0; j<Integer.parseInt(txt.substring(i,i+digitosNum(txt,i))); j++){
					txtDescomp=txtDescomp+txt.charAt(i-1);
				}
			}
			
			if(esLetra(txt.charAt(i))){
				if(i!=txt.length()-1){
					if(esLetra(txt.charAt(i+1)))
						txtDescomp=txtDescomp+txt.charAt(i);
				}
				else{
					txtDescomp=txtDescomp+txt.charAt(i);
				}
			}
		}
		
		
		return txtDescomp;
	}
	
	public static int contarLetras(String txt, int posicionLetra){
		
		int cont=0;
		
		for(int i=posicionLetra; i<txt.length() && txt.charAt(i)==txt.charAt(posicionLetra); i++){
			cont++;
		}
		
		return cont;
	}
	
	public static int digitosNum(String text, int posicionNum){
		
		int cont=0;
		for(int i=posicionNum; i<text.length() && !esLetra(text.charAt(i)); i++)
			cont++;
		
		return cont;
	}
	
	public static boolean esLetra(char car){
		
		boolean letra=false;
		
		if((car>='A' && car<='Z') || (car>='a' && car<='z')){
			letra=true;
		}
		
		return letra;
	}
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int opcion;
		String texto;
		
		System.out.println("1-Comprimir texto");
		System.out.println("2-Descomprimir texto");
		System.out.println();
		
		System.out.print("Introduce una opcion: ");
		opcion=sc.nextInt();
		
		System.out.println();
		
		switch(opcion){
			case 1: sc.nextLine();
					System.out.print("Introduce el texto a comprimir: ");
					texto=sc.nextLine();
					System.out.println();
					System.out.println("El texto comprimido es: "+comprimirTexto(texto));
					break;
			
			case 2: sc.nextLine();
					System.out.print("Introduce el texto a descomprimir: ");
					texto=sc.nextLine();
					System.out.println();
					System.out.println("El texto descomprimido es: "+descomprimirTexto(texto));
					break;
			
			default: System.out.println("Opcion no valida");
		}	
	}
}
