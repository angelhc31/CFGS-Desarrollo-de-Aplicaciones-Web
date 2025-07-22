import java.util.Random;
public class MetodoLlenarVectorAleatoriamente {
	
	public static void rellenarVecNumsAleatorios(int [] vec){
		
		Random rnd=new Random();
		
		for(int i=0; i<vec.length; i++)
			vec[i]=rnd.nextInt(100)+1;
	}
}

