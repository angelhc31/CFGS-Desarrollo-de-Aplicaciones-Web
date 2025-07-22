public class MetodoQuitarEspacios {
	
	
	
	public static String quitarEspacios(String frase){	
		String fraseSinEsp="";
		
		for(int i=0; i<frase.length(); i++){
			if(frase.charAt(i)!=' ')
				fraseSinEsp=fraseSinEsp+frase.charAt(i);
		}
		return fraseSinEsp;
	}
	
	
	
	public static void main (String[] args) {
	
	}
}

