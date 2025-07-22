public class Ejercicio21 {
	
	public static void main (String[] args) {
		
		double[] vec=new double [50];
		
		for(int i=0; i<vec.length; i++){
			vec[i]=Math.pow(i, 2);
		}
		for(int i=0; i<vec.length; i++){
			System.out.println((int)vec[i]);
			System.out.println();
		}
	}
}
