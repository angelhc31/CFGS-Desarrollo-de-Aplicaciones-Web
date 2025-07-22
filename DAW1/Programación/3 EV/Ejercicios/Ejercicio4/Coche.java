public class Coche extends Vehiculo{
	private String marca;
	private String modelo;
	private int puertas;
	private int cil;
	
	Coche(String color, String bastidor, int peso, char cambio, String marca, String modelo, int puertas, int cil){
		super(color,bastidor,peso,cambio);
		this.marca=marca;
		this.modelo=modelo;
		this.puertas=puertas;
		this.cil=cil;
	}
	
	public void setMarca(String m){
		marca=m;
	}
	public void setModelo(String m){
		modelo=m;
	}
	public void setPuertas(int p){
		puertas=p;
	}
	public void setCil(int c){
		cil=c;
	}
	
	public String getMarca(){
		return marca;
	}
	public String getModelo(){
		return modelo;
	}
	public int getPuertas(){
		return puertas;
	}
	public int getCil(){
		return cil;
	}
	
	public String toString(){
		return super.toString()+", Marca: "+marca+", Modelo: "+modelo+", Puertas: "+puertas+", Cilindrada: "+cil;
	}
}
