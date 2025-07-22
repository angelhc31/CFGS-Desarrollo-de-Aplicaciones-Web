import java.util.Scanner;
public class Ejercicio9 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		partidas partida1=new partidas();
		char[] jugadores={'x','o'};
		String lugarFicha;
		
		System.out.println("**********NUEVA PARTIDA DE 3 EN RAYA**********");
		
		System.out.println();
		System.out.println("Para elegir la casilla donde poner");
		System.out.println("la ficha hay que poner primero la");
		System.out.println("columna y despues la fila separados");
		System.out.println("por una coma de forma que quede x,y.");
		System.out.println();
		System.out.println("Las casillas son 1,2y3.");
		System.out.println();
		System.out.println("Debes poner las fichas en un lugar libre.");
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		
		while(partida1.terminado()==false){
			for(int i=0; i<jugadores.length && partida1.terminado()==false; i++){
				System.out.println("**********JUGADOR "+(i+1)+"**********");
				System.out.println();
				
				do{
					System.out.println("Donde quieres poner tu ficha? ");
					lugarFicha=sc.nextLine();
				}
				while(partida1.ponerFicha(jugadores[i],Integer.parseInt(lugarFicha.substring(0,1))-1,
				Integer.parseInt(lugarFicha.substring(2,3))-1)==false);
				
				System.out.println();
				
				partida1.verTablero();

			}
		}
		
		System.out.println();
		System.out.println();
		System.out.println();
		
		if(partida1.ganador()==' ')
			System.out.println("**********EMPATE**********");
		
		if(partida1.ganador()=='x')
			System.out.println("JUGADOR 1 HA GANADO!!!!!");
		else 
			if(partida1.ganador()=='o')
				System.out.println("JUGADOR 2 HA GANADO!!!!!");
	}
}

