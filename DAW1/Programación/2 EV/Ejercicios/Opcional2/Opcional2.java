import java.util.Scanner;
public class Opcional2 {
	
	public static void mostrarTablero(char [][] tablero){
		for(int i=0; i<tablero.length; i++){
			for(int j=0; j<tablero[0].length; j++){
				System.out.print(" "+tablero[i][j]);
			}
			System.out.println();
		}
	}
	
	public static void main (String[] args) {
		Scanner sc=new Scanner(System.in);
		int numFilas, numColumnas, numMinas;
		String casilla;
		buscaMinas partida1;
		
		System.out.print("Introduce el numero de filas: ");
		numFilas=sc.nextInt();
		System.out.print("Introduce el numero de columnas: ");
		numColumnas=sc.nextInt();
		System.out.print("Introduce el numero de minas: ");
		numMinas=sc.nextInt();
		
		partida1=new buscaMinas(numFilas,numColumnas,numMinas);
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		
		System.out.println("***************EMPIEZA EL JUEGO***************");
		
		sc.nextLine();
		
		while(partida1.terminado()==false){
			
			System.out.println();
			System.out.println();
			
			mostrarTablero(partida1.getTableroOculto());
			
			System.out.println();
			
			System.out.print("Que casilla quieres destapar? ");
			casilla=sc.nextLine();
			
			partida1.destaparCasilla(casilla);
		}
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		
		if(partida1.victoria())
			System.out.println("***************HAS GANADO***************");
		else
			System.out.println("***************HAS PERDIDO***************");
		
		System.out.println();
		System.out.println();
		
		mostrarTablero(partida1.getTablero());
	}
}

