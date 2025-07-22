public class ProdCongeladoNitrogeno extends ProdConservado{
	private int tiempExpuesto;
	private String metodo;
	
	ProdCongeladoNitrogeno(String fCad, String nLot, String fechaEnvasado, String paisOrigen, double temperatura, int segundos, String metodo){
		super(fCad,nLot,fechaEnvasado,paisOrigen,temperatura);
		tiempExpuesto=segundos;
		this.metodo=metodo;
	}
	
	public int getTiempExpuesto(){
		return tiempExpuesto;
	}
	public String getMetodo(){
		return metodo;
	}
	public void setTiempExpuesto(int segundos){
		tiempExpuesto=segundos;
	}
	public void setMetodo(String metodo){
		this.metodo=metodo;
	}
	public String toString(){
		return super.toString()+",  metodo de congelacion empleado: "+metodo+", tiempo de exposicion al nitrogeno en segundos: "+tiempExpuesto;
	}
}

