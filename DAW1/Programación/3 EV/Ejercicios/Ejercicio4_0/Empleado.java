public class Empleado{
	private String  nombre;
	private String apellidos;
	private int edad;
	
	Empleado(String nombre, String apellidos, int edad){
		this.nombre=nombre;
		this.apellidos=apellidos;
		this.edad=edad;
	}
	
	public void setNombre(String n){
		nombre=n;
	}
	public String getNombre(){
		return nombre;
	}
	public String toString(){
		return "Nombre: "+nombre+", Apellidos: "+apellidos+", Edad: "+edad;
	}
}
