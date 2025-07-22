import java.util.Scanner;
public class Ejercicio10Forma2 {
	
	public static void main (String args[]) {
		char supi='A';
		char supd='B';
		char infi='D';
		char infd='C';
		char giro='d';
		char temp;
		Scanner in=new Scanner(System.in);
		while(giro!='q')
		{
		  System.out.println("");	
		  System.out.println(supi+ "         " +supd);
		  System.out.println(infi+ "         " +infd);
		  System.out.println("");
		  System.out.print( "(i=izquierda,d=derecha,q=salir): ");
		  giro=in.nextLine().charAt(0);
		  if( giro=='i')
		  {
			temp=supi;
			supi=supd;
			supd=infd;
			infd=infi;
			infi=temp;
		  }
		  else
		  {
			if (giro=='d')
			{
			  temp=supi;
			  supi=infi;
			  infi=infd;
			  infd=supd;
			  supd=temp;
			}
		  }	
		}
	}
}
