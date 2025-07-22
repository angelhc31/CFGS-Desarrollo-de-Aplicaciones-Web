public class Tecnico extends Operario{
	private int grado;
	
	Tecnico(String nombre, String apellidos, int edad, boolean autonomo, int anyosTrabajados, int grado){
		super(nombre,apellidos,edad,autonomo,anyosTrabajados);
		this.grado=grado;
	}
	
	public String toString(){
		return super.toString()+", Grado: "+grado;
	}
}
