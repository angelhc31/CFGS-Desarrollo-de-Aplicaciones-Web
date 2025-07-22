public class Tarjeta {
	
	private double saldo;
	
	
	Tarjeta(){
		saldo=0;
	}
	Tarjeta(double dinero){
		saldo=dinero;
	}
	
	
	public boolean pagar(double precio){
		boolean sePuede;
		
		if(precio<=saldo){
			saldo=saldo-precio;
			sePuede=true;
		}
		else
			sePuede=false;
			
		return sePuede;
	}
	
	public void ingresar(double dinero){
		saldo=saldo+dinero;
	}
	
	public double obtenerSaldo(){
		return saldo;
	}
}

