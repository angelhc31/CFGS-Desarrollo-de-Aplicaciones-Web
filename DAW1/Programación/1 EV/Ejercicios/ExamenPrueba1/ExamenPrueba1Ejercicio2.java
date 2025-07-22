import java.util.Scanner;
import java.util.Random;
public class ExamenPrueba1Ejercicio2 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		Random rnd=new Random();
		int longVec;
		int [] vec;
		int sumDivisores;
		
		do{
			System.out.print("Introduce la longitud del vector: ");
			longVec=sc.nextInt();
			
			System.out.println();
		}
		while(longVec<50);
		
		vec=new int[longVec];
		
		for(int i=0; i<vec.length; i++){
			do{
				vec[i]=rnd.nextInt(201)-100;
			}
			while(vec[i]==0);
		}
		for(int i=0; i<vec.length; i++){
			System.out.print(vec[i]+" ");
		}
		
		System.out.println();
		System.out.println();
		
		System.out.print("Numeros abundantes: ");
		
		for(int i=0; i<vec.length; i++){
			sumDivisores=0;
			if(vec[i]>0){
				for(int j=1; j<vec[i]; j++){
						if(vec[i]%j==0)
							sumDivisores=sumDivisores+j;
				}
			}
			else{
				for(int j=-1; j>vec[i]; j--){
						if(vec[i]%j==0)
							sumDivisores=sumDivisores+j;
				}
			}
			if(sumDivisores>vec[i])
				System.out.print(vec[i]+" ");
		}
	}
}
