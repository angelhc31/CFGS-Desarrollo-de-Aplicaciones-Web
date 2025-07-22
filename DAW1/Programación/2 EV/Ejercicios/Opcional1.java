import java.util.Scanner;
public class Opcional1 {
	
	public static String secuenciaComunLarga(String ADN1, String ADN2){
		String secuenciaTemporal="";
		String secuencia="";
		
		for(int i=0; i<ADN1.length(); i++){
			for(int j=i; j<ADN1.length(); j++){
				
				secuenciaTemporal=secuenciaTemporal+ADN1.charAt(j);
				
				if(estaEnLaOtraSecuencia(secuenciaTemporal,ADN2)==true && secuenciaTemporal.length()>secuencia.length())
					secuencia=secuenciaTemporal;
			}
			secuenciaTemporal="";
		}
		return secuencia;
	}
	
	public static boolean estaEnLaOtraSecuencia(String secuencia, String ADN2){
		boolean esta=false;
		String secuenciaTemporal="";
		
		for(int i=0; i<ADN2.length() && esta==false; i++){
			for(int j=i; j<ADN2.length() && esta==false; j++){
				secuenciaTemporal=secuenciaTemporal+ADN2.charAt(j);
				
				if(secuenciaTemporal.equals(secuencia)){
					esta=true;
				}
			}
			secuenciaTemporal="";
		}
		return esta;
	}
	
	public static void main (String[] args) {
		String ADN1;
		String ADN2;
		Scanner sc=new Scanner(System.in);
		
		do{
			System.out.print("Introduce la primera secuencia de ADN: ");
			ADN1=sc.nextLine();
			System.out.print("Introduce la segunda secuencia de ADN: ");
			ADN2=sc.nextLine();
			
			System.out.println();
			
			if(ADN1.length()!=ADN2.length()){
				System.out.println("Ambas secuencias de ADN deben ser igual de largas.");
			}
			
			System.out.println();
			System.out.println();
		}
		while(ADN1.length()!=ADN2.length());
		
		System.out.println(ADN1);
		System.out.println(ADN2);
		
		System.out.println();
		
		System.out.println(secuenciaComunLarga(ADN1,ADN2));
	}
}

