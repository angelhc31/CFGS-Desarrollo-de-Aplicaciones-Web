import java.util.Scanner;
public class Ejercicio31 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int estadoHorca;
		int volverJugar;
		boolean eliminado;
		boolean terminado;
		boolean acertado;
		String palabra;
		char carElegido;
		char [] caracteres;
		char [] palabraOculta;
		
		do{
			eliminado=false;
			estadoHorca=0;
			
			System.out.println("-------------------PARTIDA NUEVA DE EL AHORCADO-------------------");
			
			System.out.println();
			
			
			System.out.print("Introduce una frase o una palabra: ");
			palabra=sc.nextLine();
			
			palabra=palabra.toUpperCase().trim();
			
			caracteres=new char[palabra.length()];
			palabraOculta=new char[palabra.length()];
			
			System.out.println();
			System.out.println();
			System.out.println();
			System.out.println("-------------------------EMPIEZA EL JUEGO-------------------------");
			
			for(int i=0; i<caracteres.length; i++){
				caracteres[i]=palabra.charAt(i);
				if(caracteres[i]==' ')
					palabraOculta[i]=' ';
				else
					palabraOculta[i]='_';
			}	
			
			System.out.println("      _______");
			System.out.println("      |/    |");
			System.out.println("      |");
			System.out.println("      |");
			System.out.println("      |");
			System.out.println("    __|__");
			
			System.out.println();
			System.out.print("Palabra:"); 
			  
			for(int i=0; i<palabraOculta.length; i++)
				System.out.print("   "+palabraOculta[i]);
			
			System.out.println();
			System.out.println();
			
			do{
				terminado=true;
				acertado=false;
				
				System.out.print("Di una letra: ");
				carElegido=sc.nextLine().trim().toUpperCase().charAt(0);
				
				System.out.println();
				System.out.println("------------------------------------------------------------------");
				System.out.println();
				
				for(int i=0; i<caracteres.length; i++){
					if(caracteres[i]==carElegido)
						acertado=true;
				}
				
				switch(estadoHorca){
					case 0: if(acertado==true){
								System.out.println("Correcto, has acertado.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |");
								System.out.println("      |");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							else{
								System.out.println("Incorrecto.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							break;
					case 1: if(acertado==true){
								System.out.println("Correcto, has acertado.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							else{
								System.out.println("Incorrecto.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |     |");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							break;
					case 2: if(acertado==true){
								System.out.println("Correcto, has acertado.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |     |");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							else{
								System.out.println("Incorrecto.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							break;
					case 3: if(acertado==true){
								System.out.println("Correcto, has acertado.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							else{
								System.out.println("Incorrecto.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|-");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							break;
					case 4: if(acertado==true){
								System.out.println("Correcto, has acertado.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|-");
								System.out.println("      |");
								System.out.println("    __|__");
							}
							else{
								System.out.println("Incorrecto, ultima oportunidad.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|-");
								System.out.println("      |    -");
								System.out.println("    __|__");
							}
							break;
					case 5: if(acertado==true){
								System.out.println("Correcto, has acertado.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|-");
								System.out.println("      |    -");
								System.out.println("    __|__");
							}
							else{
								System.out.println("Incorrecto.");
								System.out.println();
								System.out.println("      _______");
								System.out.println("      |/    |");
								System.out.println("      |     O");
								System.out.println("      |    -|-");
								System.out.println("      |    - -");
								System.out.println("    __|__");
								eliminado=true;
							}
							break;
				}
				
				if(acertado==false)
					estadoHorca++;
				
				System.out.println();
				System.out.print("Palabra:"); 
				
				for(int i=0; i<caracteres.length; i++){
					if(caracteres[i]==carElegido)
						palabraOculta[i]=carElegido;
				}
				
				for(int i=0; i<palabraOculta.length; i++){
					System.out.print("   "+palabraOculta[i]);
					if(palabraOculta[i]=='_')
						terminado=false;
				}
					
				System.out.println();
				System.out.println();
			}
			while(terminado==false && eliminado==false);
			
			System.out.println();
			
			if(terminado==true){
				System.out.println("------------------------------------------------------------------");
				System.out.println("------------------------------------------------------------------");
				System.out.println("---------------------------HAS GANADO!----------------------------");
				System.out.println("------------------------------------------------------------------");
				System.out.println("------------------------------------------------------------------");
			}
			if(eliminado==true){
				System.out.println("------------------------------------------------------------------");
				System.out.println("------------------------------------------------------------------");
				System.out.println("---------------------------HAS PERDIDO----------------------------");
				System.out.println("------------------------------------------------------------------");
				System.out.println("------------------------------------------------------------------");
				System.out.println();
				System.out.println("La palabra era: " + palabra);
			}
			do{
				System.out.println();
				System.out.println();
				System.out.println();
				
				System.out.println("1-Jugar de nuevo");
				System.out.println("2-Salir");
				
				System.out.println();
				
				System.out.print("Que quieres hacer?: ");
				volverJugar=sc.nextInt();
				sc.nextLine();
				
				System.out.println();
				
				if(volverJugar>2 || volverJugar<1){
					System.out.println("Opcion no valida.");
					System.out.println();
				}
			}
			while(volverJugar>2 || volverJugar<1);
		}
		while(volverJugar==1);
	}
}
