public class Ejercicio6_2 {
	
	public static void main (String[] args) {
		Objetos obj=new Objetos(3);
		String palabra="hola";
		Coche coche=new Coche("Seat", "Ibiza", 4, 1);
		Pizza pizza=new Pizza("Margarita","Tomate, Queso, Oregano", 3);
		
		System.out.println(obj.obtener(0));
		System.out.println(obj.obtener(1));
		System.out.println(obj.obtener(2));
		
		System.out.println();
		
		obj.guardar(palabra,0);
		obj.guardar(coche,1);
		obj.guardar(pizza,2);
		
		System.out.println(obj.obtener(0));
		System.out.println(obj.obtener(1));
		System.out.println(obj.obtener(2));
		
		System.out.println();
		
		obj.delete(1);
		
		System.out.println(obj.obtener(0));
		System.out.println(obj.obtener(1));
		System.out.println(obj.obtener(2));
		
		System.out.println();
		
		obj.deleteAll();
		
		System.out.println(obj.obtener(0));
		System.out.println(obj.obtener(1));
		System.out.println(obj.obtener(2));
	}
}

