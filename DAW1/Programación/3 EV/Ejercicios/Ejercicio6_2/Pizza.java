public class Pizza{
	private String nombre;
	private String ingredientes;
	private int numPersonas;
	
	Pizza(String n, String i, int nP){
		nombre=n;
		ingredientes=i;
		numPersonas=nP;
	}
	
	public String toString(){
		return "Nombre: "+nombre+", Ingredientes: "+ingredientes+", Para "+numPersonas+", personas.";
	}
}
