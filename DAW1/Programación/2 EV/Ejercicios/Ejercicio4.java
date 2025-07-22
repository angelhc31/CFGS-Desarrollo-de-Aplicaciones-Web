import java.util.Random;
public class Ejercicio4 {
	
	public static void rellenarVecNumsAleatorios(int [] vec){
		
		Random rnd=new Random();
		
		for(int i=0; i<vec.length; i++)
			vec[i]=rnd.nextInt(101);
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
	
	public static String diezMayoresNumsSinRepetir(int [] vec){
		
		String numsMayores="";
		int contRepe;
		int a=vec.length-1;
		int numNums=0;
		
		ordenarVecInt(vec);
		
		while(a>=0 && numNums<10){
			contRepe=1;
			for(int i=a-1; i>=0; i--){
				if(vec[a]==vec[i]){
					contRepe++;
				}
			}
			numsMayores=numsMayores+vec[a]+" ";
			a=a-contRepe;
			numNums++;
		}
		
		return numsMayores;
	}
	
	public static void main (String[] args) {
		
		int [] vec=new int [50];
		
		rellenarVecNumsAleatorios(vec);
		ordenarVecInt(vec);
		for(int i=0; i<vec.length; i++)
			System.out.print(vec[i]+" ");
		
		System.out.println();
		System.out.println();
		
		System.out.println(diezMayoresNumsSinRepetir(vec));
	}
}

