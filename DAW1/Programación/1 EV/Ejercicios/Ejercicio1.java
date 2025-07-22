public class Ejercicio1 {
	
	public static void main (String[] args) {
		int dinero=85;	//Insertar el dinero a dividir en el lugar del 0.
		
		int billete50=50;
		int billete20=20;
		int billete10=10;
		int billete5=5;
		
		int numeroBillete50=0;
		int restoBillete50=0;
		
		int numeroBillete20=0;
		int restoBillete20=0;
		
		int numeroBillete10=0;
		int restoBillete10=0;
		
		int numeroBillete5=0;
		int restoBillete5=0;
		
		int numeroEuro=0;
		
		numeroBillete50=dinero/billete50;
		restoBillete50=dinero%billete50;
		
		numeroBillete20=restoBillete50/billete20;
		restoBillete20=restoBillete50%billete20;
		
		numeroBillete10=restoBillete20/billete10;
		restoBillete10=restoBillete20%billete10;
		
		numeroBillete5=restoBillete10/billete5;
		restoBillete5=restoBillete10%billete5;
		
		numeroEuro=restoBillete5;
		
		System.out.println("Te quedaran: "+numeroBillete50+" billetes de 50E, "
		+numeroBillete20+" billetes de 20E, "+numeroBillete10+" billetes de 10E, "
		+numeroBillete5+" billetes de 5E y "+numeroEuro+" monedas de un euro.");

		
	}
}

