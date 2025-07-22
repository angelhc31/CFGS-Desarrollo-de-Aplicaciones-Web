import java.util.Scanner;
public class Ejercicio10{
	
	public static void main (String[] args) {
		
		String op;
		String estado="abcd";
		int estadoSoporte=0;
		int cerrar=0;
		
		Scanner sc=new Scanner(System.in);
		
		System.out.println("A       B");
			
		System.out.println();
		System.out.println();
			
		System.out.println("C       D");
			
		System.out.println();
			
		do{
			System.out.println("d-Girar a la derecha.");
			System.out.println("i-Girar a la Izquierda.");
			System.out.println("s-Salir.");
				
			System.out.println();
			
			System.out.print("Que quieres hacer?: ");
			op=sc.nextLine();
			
			System.out.println();
			
			if(estado=="abcd" && estadoSoporte==0){
				switch(op){
					case "d": System.out.println("C       A");
							  System.out.println();
							  System.out.println();
							  System.out.println("D       B");
							  
							  estado="cadb";
							  estadoSoporte=1;
							  
							  break;
					
					case "i": System.out.println("B       D");
							  System.out.println();
							  System.out.println();
							  System.out.println("A       C");
							  
							  estado="bdac";
							  estadoSoporte=1;
							  
							  break;
							  
					case "s": System.out.println("Programa cerrado.");
							  cerrar=1;
							  
							  break;
					
					default: System.out.println("Opcion no disponible");
				}
			}
			
			if(estado=="cadb" && estadoSoporte==0){
				switch(op){
					case "d": System.out.println("D       C");
							  System.out.println();
							  System.out.println();
							  System.out.println("B       A");
							  
							  estado="dcba";
							  estadoSoporte=1;
							  
							  break;
					
					case "i": System.out.println("A       B");
							  System.out.println();
							  System.out.println();
							  System.out.println("C       D");
							  
							  estado="abcd";
							  estadoSoporte=1;
							  
							  break;
							  
					case "s": System.out.println("Programa cerrado.");
							  cerrar=1;
							  break;
					
					default: System.out.println("Opcion no disponible");
				}
			}
			
			if(estado=="dcba" && estadoSoporte==0){
				switch(op){
					case "d": System.out.println("B       D");
							  System.out.println();
							  System.out.println();
							  System.out.println("A       C");
							  
							  estado="bdac";
							  estadoSoporte=1;
							  
							  break;
					
					case "i": System.out.println("C       A");
							  System.out.println();
							  System.out.println();
							  System.out.println("D       B");
							  
							  estado="cadb";
							  estadoSoporte=1;
							  
							  break;
							  
					case "s": System.out.println("Programa cerrado.");
							  cerrar=1;
							  break;
					
					default: System.out.println("Opcion no disponible");
				}
			}
			
			if(estado=="bdac" && estadoSoporte==0){
				switch(op){
					case "d": System.out.println("A       B");
							  System.out.println();
							  System.out.println();
							  System.out.println("C       D");
							  
							  estado="abcd";
							  estadoSoporte=1;
							  
							  break;
					
					case "i": System.out.println("D       C");
							  System.out.println();
							  System.out.println();
							  System.out.println("B       A");
							  
							  estado="dcba";
							  estadoSoporte=1;
							  
							  break;
							  
					case "s": System.out.println("Programa cerrado.");
							  cerrar=1;
							  break;
					
					default: System.out.println("Opcion no disponible");
				}
			}
			
			System.out.println();
			estadoSoporte=0;
			
		}
		while(cerrar==0);
	}
}
