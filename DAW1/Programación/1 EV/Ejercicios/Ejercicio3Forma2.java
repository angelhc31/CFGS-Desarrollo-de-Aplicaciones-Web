public class Ejercicio3Forma2 {
	public static void main(String [] args) {
		int x,y,z,t,k,mayor,menor;
		x=2;
		y=20;
		z=15;
		t=34;
		k=1;
		mayor=x;
		menor=x;
		
		if (y>mayor)
			mayor=y;
		if(z>mayor)
			mayor=z;
		if(t>mayor)
			mayor=t;
		if(k>mayor)
			mayor=k;
			
		if (y<menor)
			menor=y;
		if(z<menor)
			menor=z;
		if(t<menor)
			menor=t;
		if(k<menor)
			menor=k;	
			
		System.out.println("El valor mayor: "+mayor);
		System.out.println("El valor menor: "+menor);
		
	}
}
