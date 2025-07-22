import java.util.Scanner;
public class Extra2 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		String puente;
		boolean valido=true;
		int cont=0;
		int centro=0;
		
		System.out.print("Introduce un puente: ");
		puente=sc.nextLine();
		
		System.out.println();
		
		if(puente.charAt(0)=='*' && puente.charAt(puente.length()-1)=='*'){
			for(int i=1; i<puente.length()-1; i++){
				if(puente.charAt(i)=='*')
					valido=false;
			}
			if(valido==true){
				if(puente.length()%2==0){
					for(int i=0; i<puente.length()/2; i++){
						if(puente.charAt(i)!=puente.charAt(puente.length()-i-1)){
							valido=false;
						}
						if(puente.charAt(i)=='='){
							cont++;
						}
						if(puente.charAt(i)=='+'){
							cont=0;
						}
					}
					if(cont>2){
						valido=false;
					}
				}
				else{
					for(int i=0,j=puente.length()-1; i<puente.length(); j--,i++){
						if(i==j){
							centro=i;
						}
					}
					for(int i=0; i<puente.length(); i++){
						if(puente.charAt(i)!=puente.charAt(puente.length()-i-1)){
							valido=false;
						}
						if(puente.charAt(i)=='='){
							cont++;
						}
						if(puente.charAt(i)=='+'){
							cont=0;
						}
						if(cont>2){
							if(i!=centro+1){
								valido=false;
							}
						}
					}
				}
			}
		}
		else{
			valido=false;
		}
		if(valido==true){
			System.out.println("Valido");
		}
		else{
			System.out.println("No valido");
		}
	}
}

