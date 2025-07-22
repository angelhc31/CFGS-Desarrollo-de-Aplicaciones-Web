public class Vehiculo{
	private String color;
	private String bastidor;
	private int peso;
	private char cambio;
	
	Vehiculo(String color, String bastidor, int peso, char cambio){
			this.color=color;
			this.bastidor=bastidor;
			this.peso=peso;
			this.cambio=cambio;
	}
	
	public void setColor(String c){
		color=c;
	}
	public void setBastidor(String b){
		bastidor=b;
	}
	public void setPeso(int p){
		peso=p;
	}
	public void setCambio(char c){
		cambio=c;
	}
	
	public String getColor(){
		return color;
	}
	public String getBastidor(){
		return bastidor;
	}
	public int getPeso(){
		return peso;
	}
	public char getCambio(){
		return cambio;
	}
	
	public String toString(){
		return "Color: "+color+", Bastidor: "+bastidor+", Peso"+peso+", Cambio:"+cambio;
	}
}
