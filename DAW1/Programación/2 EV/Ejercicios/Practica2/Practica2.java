public class Practica2 {
	
	public static void main (String[] args) {
		Tarjeta miTarjeta=new Tarjeta();
		Tarjeta miTarjeta2=new Tarjeta(250.55);
		
		System.out.println("Tarjeta 1");
		System.out.println(miTarjeta.obtenerSaldo());
		miTarjeta.ingresar(20.0);
		System.out.println(miTarjeta.obtenerSaldo());
		if(miTarjeta.pagar(25.5)==true)
			System.out.println(miTarjeta.obtenerSaldo());
		else
			System.out.println("Le falta saldo a su tajeta.");
		
		System.out.println();
		
		System.out.println("Tarjeta 2");
		System.out.println(miTarjeta2.obtenerSaldo());
		miTarjeta2.ingresar(50.0);
		System.out.println(miTarjeta2.obtenerSaldo());
		if(miTarjeta2.pagar(25.5)==true)
			System.out.println(miTarjeta2.obtenerSaldo());
		else
			System.out.println("Le falta saldo a su tajeta.");
	}
}

