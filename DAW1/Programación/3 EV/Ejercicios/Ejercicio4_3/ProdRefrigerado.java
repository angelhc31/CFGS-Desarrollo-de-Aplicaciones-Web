public class ProdRefrigerado extends ProdConservado{
	private String codOrgSupAl;
	
	ProdRefrigerado(String fCad, String nLot, String fechaEnvasado, String paisOrigen, double temperatura, String codigo){
		super(fCad,nLot,fechaEnvasado,paisOrigen,temperatura);
		codOrgSupAl=codigo;
	}
	
	public String getCodOrgSupAl(){
		return codOrgSupAl;
	}
	public void setCodOrgSupAl(String codigo){
		codOrgSupAl=codigo;
	}
	public String toString(){
		return super.toString()+", codigo del organismo de supervision alimentaria: "+codOrgSupAl;
	}
}
