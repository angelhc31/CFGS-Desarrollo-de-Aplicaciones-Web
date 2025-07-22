import java.util.Random;
public class Ejercicio3 {
	
	public static void rellenarVecNumsAleatorios(int [] vec){

		Random rnd=new Random();
		
		for(int i=0; i<vec.length; i++)
			vec[i]=rnd.nextInt(50)+1;
	}
	
	public static void mostrarVec(int [] vec){
		
		for(int i=0; i<vec.length; i++)
			System.out.print(vec[i]+" ");
		
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
	
	public static String numerosQueNoAparecen(int [] vec){
		
		boolean aparece;
		String numsQueNoAparecen="";
		
		for(int i=1; i<=50; i++){
			aparece=false;
			for(int j=0; j<vec.length; j++){
				if(vec[j]==i)
					aparece=true;
			}
			if(aparece==false)
				numsQueNoAparecen=numsQueNoAparecen+String.valueOf(i)+" ";
		}
		
		return numsQueNoAparecen;
	}
	
	public static void main (String[] args) {
		int [] vec=new int [20];
		
		rellenarVecNumsAleatorios(vec);

		mostrarVec(vec);
		System.out.println();
		System.out.println();
		
		ordenarVecInt(vec);
		
		mostrarVec(vec);
		System.out.println();
		System.out.println();
		
		System.out.println(numerosQueNoAparecen(vec));
	}
}

