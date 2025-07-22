public class Ejercicio17 {
	
	public static void main (String[] args) {
		
		int sp=8;
		int up=1;
		
		while(up<=9){
			
			System.out.print("                             ");
			
			for(int i=1; i<=sp; i++){ //Esto es para poner los espacios
				
					System.out.print(" ");
				
			}
			for(int j=1; j<up; j++){ //Esto es para poner los numeros ascendentes
				
				System.out.print(j);
				
			}
			for(int k=up; k>0; k--){ //Esto es para poner los numeros descendentes
				
				System.out.print(k);
				
			}
			
			up++;
			sp--;
			
			System.out.println(); //Esto le da forma de piramide
			
		}
	}
}
