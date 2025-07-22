public class Operario extends Empleado{
	private boolean autonomo;
	private int anyosTrabajados;
	
	Operario(String nombre, String apellidos, int edad, boolean autonomo, int anyosTrabajados){
		super(nombre, apellidos, edad);
		this.autonomo=autonomo;
		this.anyosTrabajados=anyosTrabajados;
	}
	public void setAnyosTrabajados(int a){
		anyosTrabajados=a;
	}
	public String toString(){
		return super.toString()+", Autonomo: "+autonomo+", Anyos Trabajados: "+anyosTrabajados;
	}
}
