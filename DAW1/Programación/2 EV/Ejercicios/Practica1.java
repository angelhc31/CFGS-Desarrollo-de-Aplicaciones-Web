import java.util.Random;
public class Practica1 {
	
	public static void rellenarVecNumsAleatorios1_100(int [] vec){
		
		Random rnd=new Random();
		
		for(int i=0; i<vec.length; i++)
			vec[i]=rnd.nextInt(100)+1;
	}
	
	public static int [] juntarDosVecs(int [] vec1, int [] vec2){
		
		int [] vecTot=new int[vec1.length+vec2.length];
		
		for(int i=0; i<vec1.length; i++)
			vecTot[i]=vec1[i];		

		for(int i=vec1.length,j=0; i<vecTot.length; i++,j++){
			vecTot[i]=vec2[j];
		}			

		return vecTot;
	}
	
	public static void ordenarVecInt(int [] vec){
		int temp;
		boolean ordenado=false;
		
		while(!ordenado){
			ordenado=true;
			for(int i=0; i<vec.length-1; i++){
				if(vec[i]>vec[i+1]){
					temp=vec[i];
					vec[i]=vec[i+1];
					vec[i+1]=temp;
					ordenado=false;
				}
			}
		}
	}
	
	public static void main (String[] args) {
		
		int [] vec1=new int[10];
		int [] vec2=new int[10];
		int [] vecFinal;
		
		rellenarVecNumsAleatorios1_100(vec1);
		rellenarVecNumsAleatorios1_100(vec2);
		
		vecFinal=juntarDosVecs(vec1,vec2);
		ordenarVecInt(vecFinal);
		
		for(int i=0; i<vec1.length; i++)
			System.out.print(vec1[i]+" ");
		
		System.out.println();
		System.out.println();

		for(int i=0; i<vec2.length; i++)
			System.out.print(vec2[i]+" ");
			
		System.out.println();
		System.out.println();
		
		for(int i=0; i<vecFinal.length; i++)
			System.out.print(vecFinal[i]+" ");
	}
}

