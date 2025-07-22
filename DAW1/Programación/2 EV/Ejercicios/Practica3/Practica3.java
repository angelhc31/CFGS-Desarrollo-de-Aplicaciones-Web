public class Practica3 {
	
	private double kgPapas;
	private double kgChocos;
	
	Practica3(double papas, double chocos){
		kgPapas=papas;
		kgChocos=chocos;
	}
	
	public void addChocos(double xChocos){
		kgChocos=kgChocos+xChocos;
	}
	public void addPapas(double xPapas){
		kgPapas=kgPapas+xPapas;
	}
	
	public void setKgPapas(double kgPapas){
		this.kgPapas=kgPapas;
	}
	public void setKgChocos(double kgChocos){
		this.kgChocos=kgChocos;
	}
	
	public double getKgChocos(){
		return kgChocos;
	}
	public double getKgPapas(){
		return kgPapas;
	}
	
	public int getComensales(){
		int contComensales=0;
		double contKgPapas=kgPapas;
		double contKgChocos=kgChocos;
		
		while(contKgPapas>=1 && contKgChocos>=0.5){
			contComensales=contComensales+3;
			
			contKgPapas--;
			contKgChocos=contKgChocos-0.5;
		}
		return contComensales;
	}
}
