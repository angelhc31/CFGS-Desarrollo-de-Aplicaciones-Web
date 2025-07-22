import java.util.Random;
public class ExplicacionVectorMatriz {
	
	public static void main (String[] args) {
		
		Random rnd=new Random(); //Esto es una variable que crea numeros aleatorios
		int [] vec=new int[10]; //este vector alberga 10 valores
		int [][] matriz=new int[10][5]; //Esta matriz es de 10 filas y 5 columnas
		String hola="123";
		
		System.out.println(hola.substring(0,1));
		
/*		for(int i=0; i<vec.length; i++){
			vec[i]=rnd.nextInt(10); 	//Esto hara numeros entre el 0(incluido) y el 10(sin incluir) de forma aleatoria
		}		*/		

//---------------------------------Vectores---------------------------------------------------------------


		System.out.println("----------VECTOR----------");
		
		System.out.println();
		
		for(int i=0; i<vec.length; i++){
			vec[i]=rnd.nextInt(41)+10;			//Esto genera numeros entre el 10 y el 50, gracias al "+10" del final
		}
		
		
		
		for(int i=0; i<vec.length; i++){
			System.out.print(vec[i] + " "); //Para imprimir el vector
		}
		
		System.out.println();
		System.out.println();
		
		System.out.println("--------------------------");
		
		System.out.println();
		System.out.println();
		System.out.println();

//-----------------------------------Matrizes-------------------------------------------------------------


		System.out.println("----------MATRIZ----------");
		
		System.out.println();
		
		for(int i=0; i<matriz.length; i++){ //Este for recorre por filas
			for(int j=0; j<matriz[0].length; j++){ //Este for recorre por columnas	
				matriz[i][j]=rnd.nextInt(41)+10;	
			}
		}
		for(int i=0; i<matriz.length; i++){
			for(int j=0; j<matriz[0].length; j++){	
				System.out.print(matriz[i][j]+" ");
			}
			System.out.println();
		}
		
		System.out.println();
		
		System.out.println("--------------------------");
		
	}
}
