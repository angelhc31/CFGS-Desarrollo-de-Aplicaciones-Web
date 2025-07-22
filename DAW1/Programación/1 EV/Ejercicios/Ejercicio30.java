import java.util.Scanner;
public class Ejercicio30 {
	
	public static void main (String[] args) {
		
		Scanner sc=new Scanner(System.in);
		String [] participantes=new String[10];
		double [][] marcas=new double[10][3];
		int [] IDTopMarcas=new int[10];
		boolean [] posicionado=new boolean[10];
		int top=0;
		boolean ordenado;
		double puntMax;
		int opcion;
		int IDParticipante=0;
		
		System.out.println("-------------------------COMPETICION DE SALTO DE LONGITUD-------------------------");
		
		do{
			do{
				System.out.println();
				System.out.println("1-Inscribir un participante.");
				System.out.println("2-Mostrar listado de datos.");
				System.out.println("3-Mostrar listado por marcas.");
				System.out.println("4-Finalizar el programa.");
				
				System.out.println();
				
				System.out.print("Que quieres hacer?: ");
				opcion=sc.nextInt();
			
				System.out.println();
				
				if(opcion<1 || opcion>4)
					System.out.println("Opcion no valida.");
					
				System.out.println();
			}
			while(opcion<1 || opcion>4);
			
			
			
			switch(opcion){
				case 1: if(IDParticipante<10){
					
							sc.nextLine();
							System.out.print("Nombre del participante: ");
							participantes[IDParticipante]=sc.nextLine();
							
							for(int i=0; i<3; i++){
								System.out.println();
								System.out.print("Mejor marca del 200"+i+": ");
								marcas[IDParticipante][i]=sc.nextDouble();
							}
							IDParticipante++;
						}
						else{
							System.out.println("-----------------------------------------------------------------");
							System.out.println("                     No quedan plazas.");
							System.out.println("-----------------------------------------------------------------");
						}
						break;
						
				case 2: System.out.println();
						System.out.println();
						System.out.println();
						
						for(int i=0; i<10; i++){
							System.out.println("-------------------------DORSAL NUMERO "+(i+1)+"-------------------------");
							System.out.println();
							if(participantes[i]!=null){
								System.out.println("Nombre: "+participantes[i]);
								System.out.println();
								for(int j=0; j<3; j++){
									System.out.println("Mejor marca del 200"+j+": "+marcas[i][j]+"m");
									System.out.println();
								}
							}
							else{
								System.out.println("Plaza libre.");
								System.out.println();
							}
							System.out.println("-----------------------------------------------------------------");
							System.out.println();
							System.out.println();
						}
						break;
						
				case 3: do{
							ordenado=true;
							puntMax=0;
							for(int i=0; i<10; i++){
								if(marcas[i][2]>puntMax && posicionado[i]==false)
									puntMax=marcas[i][2];
							}
							if(marcas[0][2]==puntMax && posicionado[0]==false){
								posicionado[0]=true;
								IDTopMarcas[top]=0;
								top++;
							}
							else{
								for(int i=0; top<10 && i<10; i++){
									if(marcas[i][2]==puntMax && posicionado[i]==false){
										posicionado[i]=true;
										IDTopMarcas[top]=i;
										top++;
									}
								}
							}
							for(int i=0; i<10; i++){
								if(posicionado[i]==false)
									ordenado=false;
							}
						}
						while(ordenado==false);
						
						for(int i=0; i<10; i++){
							System.out.println("-------------------------DORSAL NUMERO "+(IDTopMarcas[i]+1)+"-------------------------");
							System.out.println();
							if(participantes[i]!=null){
								System.out.println("Nombre: "+participantes[IDTopMarcas[i]]);
								System.out.println();
								for(int j=0; j<3; j++){
									System.out.println("Mejor marca del 200"+j+": "+marcas[IDTopMarcas[i]][j]+"m");
									System.out.println();
								}
							}
							else{
								System.out.println("Plaza libre.");
								System.out.println();
							}
							System.out.println("-----------------------------------------------------------------");
							System.out.println();
							System.out.println();
						}
						break;
				case 4: System.out.println();
						System.out.println("Programa carrado.");
			}
		}
		while(opcion!=4);
	}
}

