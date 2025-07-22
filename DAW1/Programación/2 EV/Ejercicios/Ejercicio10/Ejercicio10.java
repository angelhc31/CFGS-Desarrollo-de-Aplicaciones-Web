public class Ejercicio10 {
	
	public static void main (String[] args) {
		hotel hotel1=new hotel("HotelPrueba",250,124);
		
		System.out.println(hotel1.getNumHabitacionesLibres());
		
		if(hotel1.reservar(50)==true)
			System.out.println("Habitaciones reservadas.");
		else
			System.out.println("No hay habiaciones suficientes.");
		
		System.out.println(hotel1.getNumHabitacionesLibres());
		
		if(hotel1.reservar(1000)==true)
			System.out.println("Habitaciones reservadas.");
		else
			System.out.println("No hay habiaciones suficientes.");

		System.out.println(hotel1.getNumHabitacionesLibres());
		
		if(hotel1.anularReserva(50)==true)
			System.out.println("Reservas anuladas.");
		else
			System.out.println("No se pueden anular tantas reservas.");
		
		System.out.println(hotel1.getNumHabitacionesLibres());
			
		if(hotel1.anularReserva(1000)==true)
			System.out.println("Reservas anuladas.");
		else
			System.out.println("No se pueden anular tantas reservas.");
			
		System.out.println(hotel1.getNumHabitacionesLibres());
		
		System.out.println();
		System.out.println();
		System.out.println();
		
		System.out.println(hotel1.getNumHabitaciones());
		
		hotel1.setNumHabitaciones(1111);
		
		System.out.println(hotel1.getNumHabitaciones());
		
		System.out.println();
		System.out.println();
		System.out.println();
		
		System.out.println(hotel1.toString());
	}
}

