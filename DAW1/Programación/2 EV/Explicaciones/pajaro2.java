// EJEMPLO CONSTRUCTOR
//VER USO THIS
//modificadores de acceso en m�todos
public class pajaro2
{
	private String color;
	private String nombre;
	private double peso;
	private double altura;
	private boolean admin;
	
	pajaro2(String c,String n, double p,double a, boolean admin)
	{
		color=c;
		nombre=n;
		peso=p;
		altura=a;
		this.admin = admin;
	}
	//THIS
	
	String sobrepeso()
	{
		if(peso*altura>10)
			return "Sobrepeso";
		else
			return "normal";
	}

	setColor(String colorNuevo) {
		this.color = colorNuevo;
	}
	getColor() {
		return color;
	}

	

	setPeso(double pesoNuevo) {

	}
	getPeso() {
		
	}

	setAltura(double alturaNueva) {

	}
	getAltura() {
		
	}
}

