import java.util.Scanner;
import java.util.Random;
public class Extra1 {
	
	public static void main (String[] args) {
		
		String numElementsSt;
		int numElements;
		int aux;
		int repe=1;
		char car;
		boolean seguir;
		boolean contado;
		boolean repetidos=false;
		Scanner sc=new Scanner(System.in);
		Random rnd=new Random();
		

		do{
			seguir=true;
			
			System.out.print("Introduce el numero de elementos que quieres para el vector: ");
			numElementsSt=sc.nextLine();
			
			System.out.println();
			
			for(int j=0; j<numElementsSt.length(); j++){
				car=numElementsSt.charAt(j);
				
				if((car>='a' && car<='z') || (car>='A' && car<='Z') || car==' ')
					seguir=false;
			}
		}
		while(seguir==false);
		
		numElements=Integer.parseInt(numElementsSt);
		
		int[] vec=new int[numElements];
		
		for(int i=0; i<vec.length; i++)
			vec[i]=rnd.nextInt(100)+1;

		for(int i=0; i<vec.length; i++)
			System.out.print(vec[i]+" ");
			
		System.out.println();
		System.out.println();
		
		for(int i=0; i<vec.length; i++){	
			repe=1;
			contado=false;
			
			
			for(int j=0; j<i; j++){
				if(vec[j]==vec[i])
					contado=true;	
			}		
			
			if(contado==false){
				for(int k=i+1; k<vec.length; k++){
					if(vec[i]==vec[k])
						repe++;
				}
			}
				
			if(repe>1){
				System.out.println("El numero "+vec[i]+" se repite "+repe+" veces.");
				repetidos=true;
				System.out.println();
			}
		}
		if(repetidos==false)
			System.out.println("No hay numeros repetidos.");
	}
}
