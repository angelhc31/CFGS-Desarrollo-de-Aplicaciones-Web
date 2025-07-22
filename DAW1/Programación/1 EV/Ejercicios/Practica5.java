import java.util.Scanner;
import java.util.Random;
public class Practica5 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		Random rnd=new Random();
		int IDGanador;
		double puntMax;
		int accion;
		boolean empate;
		boolean todosFuera;
		boolean [] plantados;
		int [][]cartasJugadores;
		int [] cartas=new int[10];
		double [] punt;
		
		do{	
			IDGanador=0;
			puntMax=0;
			accion=0;
			empate=false;
			todosFuera=false;
			
			System.out.println("-------------------PARTIDA NUEVA DEL SIETE Y MEDIO-------------------");
			
			System.out.println();
			
			do{
				System.out.print("Cuantos jugadores sois?: ");
				accion=sc.nextInt();
				
				System.out.println();
				
				if(accion<2)
					System.out.println("Muy pocos jugadores");
					
				if(accion>8)
					System.out.println("Demasiados jugadores");
					
				System.out.println();
			}
			while(accion<2 || accion>8);
			
			System.out.println();

			punt=new double[accion];
			cartasJugadores=new int[accion][14]; //El numero 14 es porque el 13 numero maximo de cartas que se pueden robar antes de pasarse de 7.5 pts (10*4+11*4+12*4+1=7 pts) y le he sumado uno por si el que juega es tonto y roba un catorzeaba carta
			plantados=new boolean[accion];
			
			for(int i=0; i<punt.length; i++){
				do{
					cartasJugadores[i][0]=rnd.nextInt(10)+1;
				}
				while(cartas[cartasJugadores[i][0]-1]==4);
				
				cartas[cartasJugadores[i][0]-1]=cartas[cartasJugadores[i][0]-1]+1;
				
				if(cartasJugadores[i][0]>7){
					punt[i]=0.5;
				}
				else{
					punt[i]=cartasJugadores[i][0];
				}
			}
			
			for(int i=1; todosFuera==false; i++){
				
				todosFuera=true;
				
				for(int j=0; j<cartasJugadores.length; j++){
					
					if(plantados[j]==false){
						
						System.out.println("----------JUGADOR "+(j+1)+"----------");
						
						System.out.println();
						
						System.out.print("Tus cartas:  ");
						
						for(int k=0; k<i; k++){
							if(cartasJugadores[j][k]>7){
								System.out.print((cartasJugadores[j][k]+2)+"  ");
							}
							else{
								System.out.print(cartasJugadores[j][k]+"  ");
							}
						}
						
						System.out.println();
						System.out.println();
						
						do{
							System.out.println("1-Robar");
							System.out.println("2-Plantarse");
							
							System.out.println();
							
							System.out.print("Que quieres hacer?: ");
							accion=sc.nextInt();
							
							System.out.println();
							
							if(accion<1 || accion>2)
								System.out.println("Opcion no valida.");
								
							System.out.println();
						}
						while(accion<1 || accion>2);

							
							switch(accion){
								case 1: do{	
											cartasJugadores[j][i]=rnd.nextInt(10)+1;
										}
										while(cartas[cartasJugadores[j][i]-1]==4);
										
										cartas[cartasJugadores[j][i]-1]=cartas[cartasJugadores[j][i]-1]+1;
												
										if(cartasJugadores[j][i]>7){
											punt[j]=punt[j]+0.5;
										}
										else{
											punt[j]=punt[j]+cartasJugadores[j][i];
										}
										
										if(cartasJugadores[j][i]>7){
											System.out.println("Te ha salido un "+(cartasJugadores[j][i]+2)+".");
										}
										else{
											System.out.println("Te ha salido un "+cartasJugadores[j][i]+".");
										}
										
										if(punt[j]>7.5){
											plantados[j]=true;
											System.out.println();
											System.out.println("Te has pasado, eliminado.");
										}
										else{
											todosFuera=false;
										}
										break;
										
								case 2: plantados[j]=true;
										System.out.println("Te has plantado con "+punt[j]+" puntos.");
										break;
										
								default: System.out.println("Elije una opcion valida.");
										 System.out.println();
								}
							
						System.out.println();
						System.out.println();
						System.out.println();
						
					}
				}
			}
			
			System.out.println();
			System.out.println();
			System.out.println();
			
			System.out.println("----------TABLA DE PUNTUACIONES----------");
			
			System.out.println();
			
			for(int i=0; i<punt.length; i++){
				
				System.out.print("Jugador "+(i+1)+": ");
				
				if(punt[i]>7.5){
					System.out.println("Eliminado, se ha pasado.");
				}
				else{
					System.out.println("----"+punt[i]+" pts----");
				}
				
				System.out.println();
				
			}
			
			todosFuera=true;
			
			for(int i=0; todosFuera==true && i<punt.length; i++){
				if(punt[i]<=7.5){
					todosFuera=false;
				}
			}
			
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				
			if(todosFuera==false){
				for(int i=0; i<punt.length; i++){
					if(punt[i]>7.5){
						punt[i]=0;
					}
					if(punt[i]>puntMax){
						puntMax=punt[i];
						IDGanador=i+1;
					}
				}
				
				for(int i=0; empate==false && i<punt.length-1; i++){
					for(int j=i+1; j<punt.length; j++){
						if(punt[i]==punt[j] && punt[i]==puntMax){
							empate=true;
						}
					}
				}
				
				if(empate==false){
					System.out.println("----------GANADOR----------");
				
					System.out.println();
				
					System.out.println("---------------------------");
					System.out.println("---------------------------");
					System.out.println("---------"+"JUGADOR "+IDGanador+"---------");
					System.out.println("----------"+puntMax+" pts----------");
					System.out.println("---------------------------");
					System.out.println("---------------------------");
				}
				else{
					System.out.println("----------GANADORES----------");
				
					System.out.println();
					
					System.out.println("---------------------------");
					System.out.println("---------------------------");
					
					for(int i=0; empate==true && i<punt.length-1; i++){
						for(int j=i+1; j<punt.length; j++){
							if(punt[i]==punt[j] && punt[i]==puntMax){
								if(empate==true){
									System.out.println("---------"+"JUGADOR "+(i+1)+"---------");
								}
								empate=false;
								System.out.println("---------"+"JUGADOR "+(j+1)+"---------");
							}
						}
					}
					System.out.println("----------"+puntMax+" pts----------");
					System.out.println("---------------------------");
					System.out.println("---------------------------");
				}
			}
			else{
				System.out.println("----------LAMENTABLE----------");
				
				System.out.println();
				
				System.out.println("Todos los jugadores se han pasado y han sido eliminados.");
			}
			
			System.out.println();
			System.out.println();
			
			do{
				System.out.println("1-Jugar de nuevo");
				System.out.println("2-Salir");
				
				System.out.println();
				
				System.out.print("Que quieres hacer?: ");
				accion=sc.nextInt();
				
				System.out.println();
				
				if(accion>2 || accion<1){
					System.out.println("Opcion no valida.");
					System.out.println();
				}
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
				System.out.println();
			}
			while(accion>2 || accion<1);

			//Aqui reseteo los valores de todos los vectores por si el usuario decide volver a ejecutar el programa, asi evito posibles problemas, las variables ya estan identadas dentro del do por lo que se resetean automaticamente
			if(accion==1){	
				for(int i=0; i<cartas.length; i++){
					cartas[i]=0;
				}
				punt=new double[0];
				cartasJugadores=new int[0][0];
				plantados=new boolean[0];
			}
		}
		while(accion==1);
	}
}

