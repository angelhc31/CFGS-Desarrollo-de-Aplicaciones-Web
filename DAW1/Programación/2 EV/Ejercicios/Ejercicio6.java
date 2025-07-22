public class Ejercicio6 {
	
	double pesoKg;
	String pesoInicial;
	
	Ejercicio6(double x, String unidadMedida){
		
		pesoInicial=String.valueOf(x)+" "+unidadMedida;
		
		switch(unidadMedida){
			case "Lb": pesoKg=x*0.453;
					   break;
			case "Li": pesoKg=x*14.59;
					   break;
			case "Oz": pesoKg=x*0.02835;
					   break;
			case "P": pesoKg=x*0.00155;
					  break;
			case "K": pesoKg=x;
					  break;
			case "G": pesoKg=x/1000;
					  break;
			case "Q": pesoKg=x*43.3;
					  break;
		}
		
	}
	
	double libras(){
		return pesoKg/0.453;
	}
	double lingotes(){
		return pesoKg/14.59;
	}
	String pesoPedido(){
		return pesoInicial;
	}
	
	public static void main (String[] args) {
		
		Ejercicio6 peso=new Ejercicio6(453,"G");
		
		System.out.println(peso.libras()+" Lb");
		System.out.println(peso.lingotes()+" Li");
		System.out.println(peso.pesoPedido());
		
	}
}
