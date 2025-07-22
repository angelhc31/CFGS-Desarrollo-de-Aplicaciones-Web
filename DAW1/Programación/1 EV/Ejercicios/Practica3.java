import java.util.Random;
public class Practica3 {
	
	public static void main (String[] args) {
		
		int [] vec=new int[50];
		Random rnd=new Random();
		int max;
		int min;
		
		for(int i=0; i<vec.length; i++){
			vec[i]=rnd.nextInt(100)+1;
		}
		max=vec[0];
		min=vec[0];
		for(int i=0; i<vec.length; i++){
			System.out.print(vec[i]+" ");
		}
		for(int i=0; i<vec.length; i++){
			if(vec[i]>max)
				max=vec[i];
			if(vec[i]<min)
				min=vec[i];
		}
		
		System.out.println();
		System.out.println();
		
		System.out.println("El mayor es: "+max);
		System.out.println();
		System.out.println("El menor es: "+min);
		
	}
}
