public class Ejercicio7 {
	
	private static final double PIE=0.3048;
	private double anchura;
	private double longitud;
	
	Ejercicio7(double anchura, double longitud){
		this.anchura=anchura;
		this.longitud=longitud;
	}
	
	public double perimetro(){
		return ((anchura*2)+(longitud*2))*PIE;
	}
	
	public double area(){
		return (anchura*longitud)*PIE;
	}
	
	public double diagonal(){
		return Math.sqrt((Math.pow(anchura,2)+Math.pow(longitud,2)))*PIE;
	}
}

