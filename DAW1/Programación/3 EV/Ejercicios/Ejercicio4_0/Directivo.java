public class Directivo extends Empleado{
	private String zona;
	private String departamento;
	
	Directivo(String nombre, String apellidos, int edad, String zona, String departamento){
		super(nombre, apellidos,edad);
		this.zona=zona;
		this.departamento=departamento;
	}
	
	public String toString(){
		return super.toString()+", Zona: "+zona+", Departamento: "+departamento;
	}
}
