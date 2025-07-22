public class ProdCongeladoAgua extends ProdConservado{
	private double gramosSalPorLitroAgua;
	
	ProdCongeladoAgua(String fCad, String nLot, String fechaEnvasado, String paisOrigen, double temperatura, double salinidad){
		super(fCad,nLot,fechaEnvasado,paisOrigen,temperatura);
		gramosSalPorLitroAgua=salinidad;
	}
	
	public double getGramosSalPorLitroAgua(){
		return gramosSalPorLitroAgua;
	}
	public void setGramosSalPorLitroAgua(double salinidad){
		gramosSalPorLitroAgua=salinidad;
	}
	public String toString(){
		return super.toString()+", salinidad del agua con que se realizo la congelacion en gramos de sal por litro de agua: "+gramosSalPorLitroAgua;
	}
}
