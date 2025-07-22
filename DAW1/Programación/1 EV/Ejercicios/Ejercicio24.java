import java.util.Random;
public class Ejercicio24 {
	
	public static void main (String[] args) {
		
		Random rnd=new Random();
		int [] vec=new int[100];
		int aux;
		
		for(int i=0; i<vec.length; i++){			
			vec[i]=rnd.nextInt(101);
		}
		
		
		//Algoritmo Burbuja (importante)
		for(int i=vec.length; i>0; i--){
			for(int j=0; j<i-1; j++){
				if(vec[j]>vec[j+1]){
					aux=vec[j+1];
					vec[j+1]=vec[j];
					vec[j]=aux;
				}
			}
		}
		//Fin Algoritmo Burbuja (importante)
		
		
		
		for(int i=0; i<vec.length; i++){
			if(i>=vec.length-10)
				System.out.print(vec[i]+" ");
		}		
	}
}

