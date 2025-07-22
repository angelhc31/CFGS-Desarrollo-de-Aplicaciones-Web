public class Ejercicio18 {
	
	public static void main (String[] args) {
		
		int[] vec=new int [10];
		int[] vec2=new int[10];
		
		for(int i=0; i<vec.length; i++){
			vec[i]=i;
		}
		for(int i=0; i<vec.length; i++){
			System.out.print(vec[i]+" ");
		}
		
		System.out.println();
		
		for(int i=0; i<vec2.length; i++){
			vec2[i]=i+1;
		}
		for(int i=0; i<vec2.length; i++){
			System.out.print(vec2[i]+" ");
		}
	}
}
