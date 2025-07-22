public class Oficial extends Operario{
	private String cargo;
	
	Oficial(String nombre, String apellidos, int edad, boolean autonomo, int anyosTrabajados, String cargo){
		super(nombre,apellidos,edad,autonomo,anyosTrabajados);
		this.cargo=cargo;
	}
	
	public String toString(){
		return super.toString()+", Cargo: "+cargo;
	}
}
