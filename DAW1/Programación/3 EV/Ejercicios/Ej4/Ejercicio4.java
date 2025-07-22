public class Ejercicio4 {
	
	public static void ordenar(Manzana [] vec){
		Manzana temp;
		boolean ordenado=false;
		
		while(!ordenado){
			ordenado=true;
			for(int i=0; i<vec.length-1; i++){
				if(vec[i].compareTo(vec[i+1])<0){
					temp=vec[i];
					vec[i]=vec[i+1];
					vec[i+1]=temp;
					ordenado=false;
				}
			}
		}
	}
	public static void mostrar(Manzana[] manzanas){
		for(int i=0; i<manzanas.length; i++){
			System.out.print("Manzana "+(i+1)+": "+ manzanas[i].toString());
			System.out.println();
			System.out.println();
		}
	}
	
	public static void main (String[] args) {
		Manzana m1=new Manzana("amarillo","fuji",175.5);
		Manzana m2=new Manzana("rojo","golden",200.4);
		Manzana m3=new Manzana("verde","reineta",193.7);
		Manzana m4=new Manzana("rojo","fuji",230.6);
		Manzana m5=new Manzana("verde","fuji",173.3);
		Manzana m6=new Manzana("amarillo","golden",210.2);
		Manzana m7=new Manzana("verde","golden",246.8);
		Manzana m8=new Manzana("rojo","reineta",230.9);
		Manzana m9=new Manzana("amarillo","fuji",184.1);
		Manzana m10=new Manzana("rojo","reineta",187.4);
		
		Manzana[] manzanas=new Manzana[10];
		manzanas[0]=m1;
		manzanas[1]=m2;
		manzanas[2]=m3;
		manzanas[3]=m4;
		manzanas[4]=m5;
		manzanas[5]=m6;
		manzanas[6]=m7;
		manzanas[7]=m8;
		manzanas[8]=m9;
		manzanas[9]=m10;
		
		mostrar(manzanas);
		
		ordenar(manzanas);
		System.out.println();
		System.out.println("******************************************");
		System.out.println();
		
		mostrar(manzanas);
	}
}

