import java.util.Scanner;
public class Ejercicio26 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		int numAlumn;
		int consulta;
		String casilla;
		boolean salir=false;
		
		System.out.print("Numero de alumnos: ");
		numAlumn=sc.nextInt();
		
		int [] IDAlumn=new int[numAlumn];
		String [] nombrAlumn=new String[numAlumn];
		double [] notaAlumn=new double[numAlumn];
		
		for(int i=0; salir==false && i<IDAlumn.length; i++){
			
			System.out.println();
			System.out.println();
			
			sc.nextLine();
			
			System.out.print("Nombre del alumno numero "+i+": ");
			casilla=sc.nextLine();
			
			if(casilla.equals("s")){
				salir=true;
			}
			else{
				
				nombrAlumn[i]=casilla;
				
				System.out.println();
				
				System.out.print("Nota del alumno numero "+i+": ");
				notaAlumn[i]=sc.nextDouble();
			}
			
			if(i==IDAlumn.length-1){
				System.out.println();
				System.out.println();
				System.out.println("Cupo lleno:");
			}
		}
		System.out.println();
		System.out.println();
		
		System.out.println("---"+"IDAlumno----------NombreAlumno----------NotaAlumno"+"---");
		
		for(int i=0; i<nombrAlumn.length; i++){
			System.out.println("------"+i+"-----------------"+nombrAlumn[i]+"------------------"+notaAlumn[i]+"---");
		}
		do{
			System.out.println();
			System.out.println();		
			
			do{
				System.out.println("(Si quieres salir introduce -1.)");

				System.out.println();
				
				System.out.print("Introduce el ID del alumno que quieras consultar: ");
				consulta=sc.nextInt();
				
				System.out.println();
				System.out.println();
				
				if(consulta<-1 || consulta>=IDAlumn.length)
					System.out.println("----------------Indice no valido----------------");
					System.out.println();
			}
			while(consulta<-1 || consulta>=IDAlumn.length);
			
			if(consulta==-1){
				System.out.println("Programa cerrado.");
			}
			else{
				System.out.println("---"+"IDAlumno----------NombreAlumno----------NotaAlumno"+"---");
				System.out.println("------"+consulta+"-----------------"+nombrAlumn[consulta]+"------------------"+notaAlumn[consulta]+"---");
				
				System.out.println();
				System.out.println();
				System.out.println();
			}
		}
		while(consulta>-1);
	}
}

