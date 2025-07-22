import java.util.Scanner;
public class test_vehiculos2 {
	
	public static void main (String args[]) {
		
		Scanner in=new Scanner(System.in);
		vehiculo [] vehiculos=new vehiculo[10];
		String entrada="";
		String matricula="";
		int plazas;
		double pma;
		boolean salir=false;
		char opcion;
		int i=0;
		do{
			do{
				System.out.print("Introduce un tipo de vehiculo (max 10)(c=coche,m=microbus,f=furgoneta,a=camion, s=salir: ");
				entrada=in.nextLine();
			}
			while(entrada.charAt(0)!='c' && entrada.charAt(0)!='m' && entrada.charAt(0)!='f' && entrada.charAt(0)!='a'  && entrada.charAt(0)!='s');
		
			opcion=entrada.charAt(0);
		
			switch(opcion){
				case 'c':System.out.print("Introduce la matricula: ");
						 matricula=in.nextLine();
						 System.out.print("Introduce las plazas: ");
						 plazas=in.nextInt();
						 in.nextLine();
						 vehiculos[i]=new coche(matricula,plazas);
						 i++;
						 break;
						 
				case 'm':System.out.print("Introduce la matricula: ");
						 matricula=in.nextLine();
						 System.out.print("Introduce las plazas: ");
						 plazas=in.nextInt();
						 in.nextLine();
						 vehiculos[i]=new microbus(matricula,plazas);
						 i++;
						 break;
				case 'f':System.out.print("Introduce la matricula: ");
						 matricula=in.nextLine();
						 System.out.print("Introduce el PMA: ");
						 pma=in.nextDouble();
						 in.nextLine();
						 vehiculos[i]=new furgoneta(matricula,pma);
						 i++;
						 break;
				case 'a':System.out.print("Introduce la matricula: ");
						 matricula=in.nextLine();
						 System.out.print("Introduce el PMA: ");
						 pma=in.nextDouble();
						 in.nextLine();
						 vehiculos[i]=new camion(matricula,pma);
						 i++;
						 break;
				case 's':salir=true;
						 break;
			}	
		}
		while(!salir && i<10);
		
		for(int j=0;j<vehiculos.length;j++){
			if(vehiculos[j] instanceof coche)
				System.out.println("Precio de alquiler del coche: "+vehiculos[j].precio_alquiler(10));
			else if(vehiculos[j] instanceof microbus)
					System.out.println("Precio de alquiler del microbus: "+vehiculos[j].precio_alquiler(10));
			else if(vehiculos[j] instanceof furgoneta)
					System.out.println("Precio de alquiler de la furgoneta: "+vehiculos[j].precio_alquiler(10));
			else if(vehiculos[j] instanceof camion)
				    System.out.println("Precio de alquiler del camion: "+vehiculos[j].precio_alquiler(10));
		}
	}
}

