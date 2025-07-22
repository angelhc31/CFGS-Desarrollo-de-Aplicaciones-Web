import java.util.Random;
public class ExplicacionAlgoritmoBurbuja {
	
	public static void main (String[] args) {
		
		Random rnd=new Random();
		int [] vec=new int[10];
		int aux;
		
		for(int i=0; i<vec.length; i++){			
			vec[i]=rnd.nextInt(10);
		}
		
		for(int i=vec.length; i>0; i--){ //Para ordenar el vector
			for(int j=0; j<i-1; j++){
				if(vec[j]>vec[j+1]){
					aux=vec[j+1];
					vec[j+1]=vec[j];
					vec[j]=aux;
				}
			}
		}
		for(int i=0; i<vec.length; i++){
			System.out.print(vec[i] + " "); //Para imprimir el vector
		}
	}
}

