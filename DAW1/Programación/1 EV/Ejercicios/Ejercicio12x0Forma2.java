public class Ejercicio12x0Forma2{
	
	public static void main (String[] args) {
		
		for (int num1=0; num1<10; num1++) {
			for (int num2=0; num2<10; num2++) {
				for (int num3=0; num3<10; num3++) {
					for (int num4=0; num4<10; num4++) {
						for (int num5=0; num5<10; num5++) {
			
							System.out.println();
				
							if(num1==3){
								System.out.print("E" + "-");
							}
							else{
								System.out.print(num1 + "-");	
							}
							if(num2==3){
								System.out.print("E" + "-");
							}
							else{
								System.out.print(num2 + "-");	
							}
							if(num3==3){
								System.out.print("E" + "-");
							}
							else{
								System.out.print(num3 + "-");	
							}
							if(num4==3){
								System.out.print("E" + "-");
							}
							else{
								System.out.print(num4 + "-");	
							}
							if(num5==3){
								System.out.print("E");
							}
							else{
								System.out.print(num5);
							}
						}
					}
				}
			}
		}				
	}
}
