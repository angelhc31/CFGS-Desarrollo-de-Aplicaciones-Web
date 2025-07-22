import java.util.Random;
public class Ejercicio28 {
	
	public static void main (String[] args) {
		
		Random rnd=new Random();
		int [][] mt=new int[10][10];
		
		for(int i=0; i<mt.length; i++){
			for(int j=0; j<mt[0].length; j++){
				mt[i][j]=rnd.nextInt(90)+10;
			}
		}
		
		for(int i=0; i<mt.length; i++){
			for(int j=0; j<mt[0].length; j++){
				mt[i][j]=mt[j][i];
			}
		}
		
		System.out.println("----------------------MATRIZ----------------------");
		System.out.println();
		
		for(int i=0; i<mt.length; i++){
			for(int j=0; j<mt[0].length; j++){
				System.out.print("   "+mt[i][j]);
			}
			System.out.println();
			System.out.println();
		}
		
		System.out.println();
		
		System.out.println("-----------------MATRIZ TRASPUESTA-----------------");
		System.out.println();
		
		for(int i=0; i<mt.length; i++){
			for(int j=0; j<mt[0].length; j++){
				System.out.print("   "+mt[j][i]);
			}
			System.out.println();
			System.out.println();
		}
	}
}

