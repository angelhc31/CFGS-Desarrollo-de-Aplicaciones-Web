import java.util.Random;
public class Ejercicio27 {
	
	public static void main (String[] args) {
		
		Random rnd=new Random();
		int [][] mt1=new int[3][3];
		int [][] mt2=new int[3][3];
		int [][] mt3=new int[3][3];
		
		for(int i=0; i<mt1.length; i++){
			for(int j=0; j<mt1[0].length; j++){			
				mt1[i][j]=rnd.nextInt(10);
			}
		}
		for(int i=0; i<mt1.length; i++){
			for(int j=0; j<mt1[0].length; j++){	
				System.out.print(mt1[i][j]+" ");
			}
			System.out.println();
		}
		
		System.out.println();
		System.out.println();
		
		for(int i=0; i<mt2.length; i++){
			for(int j=0; j<mt2[0].length; j++){			
				mt2[i][j]=rnd.nextInt(10);
			}
		}
		for(int i=0; i<mt2.length; i++){
			for(int j=0; j<mt2[0].length; j++){	
				System.out.print(mt2[i][j]+" ");
			}
			System.out.println();
		}
		
		System.out.println();
		System.out.println();
		
		for(int i=0; i<mt3.length; i++){
			for(int j=0; j<mt3[0].length; j++){
				mt3[i][j]=mt1[i][j]+mt2[i][j];
			}
		}
		for(int i=0; i<mt3.length; i++){
			for(int j=0; j<mt3[0].length; j++){	
				System.out.print(mt3[i][j]+" ");
			}
			System.out.println();
		}		
	}
}
