public class Producto{
	private String fechCaducidad;
	private String numLote;
	private String fechaEnvasado;
	private String paisOrigen;
	
	Producto(String fCad, String nLot, String fechaEnvasado, String paisOrigen){
		numLote=nLot;
		fechCaducidad=fCad;
		this.fechaEnvasado=fechaEnvasado;
		this.paisOrigen=paisOrigen;
	}
	
	public String getFechCaducidad(){
		return fechCaducidad;
	}
	public String getNumLote(){
		return numLote;
	}
	public void setFechCaducidad(String fechCad){
		fechCaducidad=fechCad;
	}
	public void setNumLote(String numLote){
		this.numLote=numLote;
	}
	public String getFechaEnvasado(){
		return fechaEnvasado;
	}
	public String getPaisOrigen(){
		return paisOrigen;
	}
	public void setFechaEnvasado(String fechaEnvasado){
		this.fechaEnvasado=fechaEnvasado;
	}
	public void setPaisOrigen(String paisOrigen){
		this.paisOrigen=paisOrigen;
	}
	public String toString(){
		return "Fecha de caducidad: "+fechCaducidad+", numero de lote: "+numLote+", fecha de envasado: "+fechaEnvasado+", pais de origen: "+paisOrigen;
	}
}
