public class Coche{
	private String marca;
	private String modelo;
	private int puertas;
	private int cil;
	
	Coche(String marca, String modelo, int puertas, int cil){
		this.marca=marca;
		this.modelo=modelo;
		this.puertas=puertas;
		this.cil=cil;
	}

	public String toString(){
		return "Marca: "+marca+", Modelo: "+modelo+", Puertas: "+puertas+", Cilindrada: "+cil;
	}
}
