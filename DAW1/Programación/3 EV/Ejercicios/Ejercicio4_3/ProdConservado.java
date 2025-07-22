public class ProdConservado extends Producto{
	private double tempMant;
	
	ProdConservado(String fCad, String nLot, String fechaEnvasado, String paisOrigen, double temperatura){
		super(fCad,nLot,fechaEnvasado,paisOrigen);
		tempMant=temperatura;
	}
	
	public double getTempMant(){
		return tempMant;
	}
	public void setTempMant(double temperatura){
		tempMant=temperatura;
	}
	public String toString(){
		return super.toString()+", temperatura de mantenimiento: "+tempMant;
	}
}
