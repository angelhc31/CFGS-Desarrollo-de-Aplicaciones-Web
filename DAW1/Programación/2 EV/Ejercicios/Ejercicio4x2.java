import java.util.Random;
public class Ejercicio4x2 {
	
	private static void modificar(){
		System.out.println("Modificado");
	}
	
	public static void crearEspacio(int[][][][] universoNuevo){
		
		Random rnd=new Random();
		
		for(int x=0; x<universoNuevo.length; x++)
			for(int y=0; y<universoNuevo[0].length; y++)
				for(int z=0; z<universoNuevo[0][0].length; z++)
					for(int t=0; t<universoNuevo[0][0][0].length; t++)
						universoNuevo[x][y][z][t]=rnd.nextInt(3);		
	}
	
	public static void viajar(int[][][][] universo, int x, int y, int z, int t){
		
		if(universo[x][y][z][t]!=2)
			universo[x][y][z][t]=1;
		
	}
	
	public static void alterarPunto(int[][][][] universo, int x, int y, int z, int t){
		
		if(universo[x][y][z][t]!=2){
			universo[x][y][z][t]=1;
			modificar();
		}
	}
	
	public static int contarPuntosInalterables(int[][][][] universo){
		
		int cont=0;
		
		for(int x=0; x<universo.length; x++)
			for(int y=0; y<universo[0].length; y++)
				for(int z=0; z<universo[0][0].length; z++)
					for(int t=0; t<universo[0][0][0].length; t++)
						if(universo[x][y][z][t]==2)
							cont++;	
								
		return cont;
	}
	
	public static int[][][][] paralelo(int [][][][] universo){
		
		Random rnd=new Random();
		int[][][][] universoParalelo=new int[universo.length][universo[0].length][universo[0][0].length][universo[0][0][0].length];
		
		for(int x=0; x<universoParalelo.length; x++){
			for(int y=0; y<universoParalelo[0].length; y++){
				for(int z=0; z<universoParalelo[0][0].length; z++){
					for(int t=0; t<universoParalelo[0][0][0].length; t++){
						
						if(universo[x][y][z][t]!=2)
							universoParalelo[x][y][z][t]=rnd.nextInt(2);
						else
							universoParalelo[x][y][z][t]=2;
					}
				}
			}
		}					
		
		return universoParalelo;
	}
	
	public static void main (String[] args) {
		
		Random rnd=new Random();
		int [][][][] universo=new int[50][50][50][50];
		int [][][][] universoParalelo;
		int x=rnd.nextInt(49);
		int y=rnd.nextInt(49);
		int z=rnd.nextInt(49);
		int t=rnd.nextInt(49);
		
		System.out.println("********************CREANDO UNIVERSO********************");
		System.out.println();
		
		crearEspacio(universo);
		
		System.out.println("-----------------------TERMINADO------------------------");
		
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		
		
		System.out.println("************************VIAJANDO************************");
		System.out.println();
		System.out.println("Antes de viajar: "+universo[x][y][z][t]);
		System.out.println();
		
		viajar(universo,x,y,z,t);
		
		System.out.println("Despues de viajar: "+universo[x][y][z][t]);
		System.out.println();
		System.out.println("-----------------------TERMINADO------------------------");
		
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		x=rnd.nextInt(49);
		y=rnd.nextInt(49);
		z=rnd.nextInt(49);
		t=rnd.nextInt(49);
		
		
		System.out.println("*******************ALTERANDO UN PUNTO*******************");
		System.out.println();
		System.out.println("Antes de viajar: "+universo[x][y][z][t]);
		System.out.println();
		
		alterarPunto(universo,x,y,z,t);
		
		System.out.println();
		System.out.println("Despues de viajar: "+universo[x][y][z][t]);
		System.out.println();
		System.out.println("-----------------------TERMINADO------------------------");
		
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		
		
		System.out.println("**************CONTANDO PUNTOS INALTERABLES**************");
		System.out.println();
		
		System.out.println("Hay "+contarPuntosInalterables(universo)+" puntos inalterables.");
		
		System.out.println();
		System.out.println("-----------------------TERMINADO------------------------");
		
		
		System.out.println();
		System.out.println();
		System.out.println();
		System.out.println();
		
		
		System.out.println("***************CREANDO UNIVERSO PARALELO****************");
		System.out.println();
		
		universoParalelo=paralelo(universo);
		
		System.out.println("-----------------------TERMINADO------------------------");
	}
}

