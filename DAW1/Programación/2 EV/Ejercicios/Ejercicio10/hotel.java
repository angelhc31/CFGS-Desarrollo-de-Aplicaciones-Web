public class hotel {
	
	private String nombre;
	private int numHabitaciones;
	private int numHabitacionesLibres;
	
	hotel(String nombre, int numHabitaciones, int numHabitacionesLibres){
		this.nombre=nombre;
		this.numHabitaciones=numHabitaciones;
		this.numHabitacionesLibres=numHabitacionesLibres;	
	}
	
	public boolean reservar(int cuantasHabitaciones){
		if(numHabitacionesLibres>=cuantasHabitaciones){
			numHabitacionesLibres=numHabitacionesLibres-cuantasHabitaciones;
			return true;
		}
		else
			return false;
	}
	public boolean anularReserva(int cuantasHabitaciones){
		if(numHabitaciones-numHabitacionesLibres>=cuantasHabitaciones){
			numHabitacionesLibres=numHabitacionesLibres+cuantasHabitaciones;
			return true;
		}
		else
			return false;
	}
	
	public void setNombre(String nuevoNombre){
		nombre=nuevoNombre;
	}
	public void setNumHabitaciones(int numHabitaciones){
		this.numHabitaciones=numHabitaciones;
	}
	public void setNumHabitacionesLibres(int numHabitacionesLibres){
		this.numHabitacionesLibres=numHabitacionesLibres;
	}
	
	public String getNombre(){
		return nombre;
	}
	public int getNumHabitaciones(){
		return numHabitaciones;
	}
	public int getNumHabitacionesLibres(){
		return numHabitacionesLibres;
	}
	
	public String toString(){
		return "El hotel "+nombre+" tiene "+String.valueOf(numHabitaciones)+" habitaciones de las cuales "+
				String.valueOf(numHabitaciones-numHabitacionesLibres)+" estan ocupadas.";
	}
}
	

