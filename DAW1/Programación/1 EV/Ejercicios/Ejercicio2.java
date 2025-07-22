public class Ejercicio2{
	
	public static void main (String[] args) {
		
		int var1=0;	//Insertar numero deseado en lugar del 0.
		int var2=0; //Insertar numero deseado en lugar del 0.
		
		if(var1==var2)
			System.out.println("Las dos variables son de igual valor.");
		
		if(var1!=var2){
			if(var1>var2){
				System.out.println("Mayor: var1.");
				System.out.println("Menor: var2.");
			}
			
			else{
				System.out.println("Mayor: var2.");
				System.out.println("Menor: var1.");
			}
		}
	}
}
