import java.util.Scanner;
public class ExamenPrueba1Ejercicio1 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int cantidad;
		int [] sucesion;
		
		do{
			System.out.print("Introduce un numero mayor que 1: ");
			cantidad=sc.nextInt();
			
			System.out.println();
		}
		while(cantidad<=1);
		
		sucesion=new int[cantidad];
		sucesion[0]=0;
		sucesion[1]=1;
		
		if(cantidad==2)
			System.out.println(sucesion[0]+"  "+sucesion[1]);
		else{
			for(int i=0; i+2<sucesion.length; i++){
				sucesion[i+2]=sucesion[i]+sucesion[i+1];
			}
			for(int i=0; i<sucesion.length; i++){
				System.out.print(sucesion[i]+"  ");
			}
		}
	}
}

