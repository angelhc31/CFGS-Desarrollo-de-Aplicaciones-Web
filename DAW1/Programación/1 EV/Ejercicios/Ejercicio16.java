import java.util.Scanner;
public class Ejercicio16 {
	
	public static void main (String[] args) {
		
		String txt;
		char txtDef=' ';
		Scanner sc=new Scanner(System.in);
		
		System.out.print("Introduce el texto a revertir: ");
		txt=sc.nextLine();
		
		for(int i=txt.length()-1; i>=0; i--){
			
			if(txt.charAt(i)==' '){
					
				System.out.print("-");
						
			}
			else{
			txtDef=txt.charAt(i);
			
			System.out.print(txtDef);
			}				
		}	
	}
}

