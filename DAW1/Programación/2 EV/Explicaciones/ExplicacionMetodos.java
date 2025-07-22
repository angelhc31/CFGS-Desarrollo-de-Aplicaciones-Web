public class ExplicacionMetodos {
	
	public static int sumar(int num1,int num2){
		int temp;
		temp=num1+num2;
		return temp;
	}
	
	public static void main (String[] args) {
		
		int x=5;
		int y=8;
		int total=0;
		
		total=sumar(x,y);
		System.out.println("La suma es: " + total);
	}
}