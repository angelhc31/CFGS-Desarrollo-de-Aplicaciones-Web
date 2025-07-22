public class Ejercicio5 {
	
	int numero;
	
	Ejercicio5(int num){
		numero=num;
	}
	
	int doble(){
		return numero*2;
	}
	int triple(){
		return numero*3;
	}
	int cuadruple(){
		return numero*4;
	}
	
	public static void main(String args[]){
		
		Ejercicio5 num=new Ejercicio5(2);
		
		System.out.println(num.doble());
		
		System.out.println(num.triple());
		
		System.out.println(num.cuadruple());
	}
}

