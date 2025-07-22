public class Ejercicio12x0{
	
	public static void main (String[] args) {
		
		int num1=0;
		int num2=0;
		int num3=0;
		int num4=0;
		int num5=0;
		
		while(num1<=9){
			
			if(num5<=9){
				num5++;
			}
			if(num5==10 && num4<=9){		
				num4++;
			}
			if(num5==10){
				num5=0;
			}
			if(num4==10){
				num4=0;
			}
			if(num5==0 && num4==0){
				num3++;
			}
			if(num3==10){
				num3=0;
			}
			if(num5==0 && num4==0 && num3==0){
				num2++;
			}
			if(num2==10){
				num2=0;
			}
			if(num5==0 && num4==0 && num3==0 && num2==0){
				num1++;
			}
			
			System.out.println();
			
			if(num1!=10){
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
