public class Ejercicio11{
	
	public static void main (String[] args) {
		
		int mult=1;
		int var1=0;
		int resp;
		
		while(mult<=9){	
			System.out.println("Tabla del "+ mult);
			System.out.println();
			
			while(var1<=10){
				
				resp=mult*var1;
				
				System.out.println(mult+"x"+var1+"="+resp);
				
				var1++;
			}
			
			System.out.println();
			
			mult++;
			var1=0;
		}
	}
}
