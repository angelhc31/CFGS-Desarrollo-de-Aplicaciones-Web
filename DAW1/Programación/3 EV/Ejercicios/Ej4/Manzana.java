import java.lang.Comparable;
public class Manzana{
	private String color;
	private String variedad;
	private double peso;
	
	Manzana(String color, String variedad, double peso){
		this.color=color;
		this.variedad=variedad;
		this.peso=peso;
	}
	
	
	public String getColor(){
		return color;
	}
	public String getVariedad(){
		return variedad;
	}
	public double getPeso(){
		return peso;
	}
	
	
	public String toString(){
		return "Color: "+color+", Variedad: "+variedad+", Peso: "+peso;
	}
	
	public int compareTo(Manzana m){
		int resultado;
		
		int color1;
		int color2;
		
		if(color.equals("verde"))
			color1=1;
		else if(color.equals("rojo"))
				color1=2;
			 else 
				color1=3;
				
		if(m.getColor().equals("verde"))
			color2=1;
		else if(m.getColor().equals("rojo"))
				color2=2;
			 else 
				color2=3;
				
		if(color1<color2)
			resultado=1;
		else if(color1==color2)
				resultado=0;
			 else
				resultado=-1;
				
		if(resultado==0){
			if(peso<m.getPeso())
				resultado=1;
			else if(peso==m.getPeso())
					resultado=0;
				 else
					resultado=-1;
		}
			
		return resultado;
	}
}
