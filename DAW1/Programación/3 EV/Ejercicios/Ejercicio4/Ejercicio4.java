public class Ejercicio4{
	
	public static void main(String args[]){
		Coche miCoche=new Coche("rojo","432431",12500,'M',"Ford","Focus",5,8);
		
		System.out.println(miCoche);
		miCoche.setPuertas(3);
		miCoche.setCambio('A');
		System.out.println(miCoche);
	}
}
