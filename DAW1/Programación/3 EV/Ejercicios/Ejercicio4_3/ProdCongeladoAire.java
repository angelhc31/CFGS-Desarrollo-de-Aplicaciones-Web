public class ProdCongeladoAire extends ProdConservado{
	private double N;
	private double O;
	private double CO2;
	private double H2O;
	
	ProdCongeladoAire(String fCad, String nLot, String fechaEnvasado, String paisOrigen, double temperatura, double n, double o, double co2, double h2o){
		super(fCad,nLot,fechaEnvasado,paisOrigen,temperatura);
		N=n;
		O=o;
		CO2=co2;
		H2O=h2o;
	}
	
	public double getN(){
		return N;
	}
	public double getO(){
		return O;
	}
	public double getCO2(){
		return CO2;
	}
	public double getH2O(){
		return H2O;
	}
	public void setN(double n){
		N=n;
	}
	public void setO(double o){
		O=o;
	}
	public void setCO2(double co2){
		CO2=co2;
	}
	public void setH2O(double h2o){
		H2O=h2o;
	}
	public String toString(){
		return super.toString()+", "+N+"% de nitrogeno, "+O+"% de oxigeno, "+CO2+"% de dioxido de carbono, "+H2O+"% de vapor de agua.";
	}
}
