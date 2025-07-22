import java.util.Random;
public class buscaMinas{
	
	private char [][] tablero;
	private char [][] tableroOculto;
	
	buscaMinas(int filas, int columnas, int minas){
		Random rnd=new Random();
		int cont=0;
		tablero=new char[filas][columnas];
		tableroOculto=new char[filas][columnas];
		
		for(int i=0; i<tablero.length; i++){
			for(int j=0; j<tablero[0].length; j++){
				tablero[i][j]='0';
				tableroOculto[i][j]='*';
			}
		}
		
		while(cont<minas){
			cont=0;
			
			tablero[rnd.nextInt(tablero.length)][rnd.nextInt(tablero.length)]='9';
			
			for(int i=0; i<tablero.length; i++){
				for(int j=0; j<tablero[0].length; j++){
					if(tablero[i][j]=='9')
						cont++;
				}
			}
		}
		
	}
	
	public void destaparCasilla(String casilla){
		int num1;
		int num2;
		
		num1=Integer.parseInt(sacarNumero1(casilla))-1;
		num2=Integer.parseInt(sacarNumero2(casilla))-1;
		
		if(tablero[num1][num2]=='0')
			tableroOculto[num1][num2]=cuantasMinasCerca(num1,num2);
		else 
			if(tablero[num1][num2]=='9')
				tableroOculto[num1][num2]='9';
	}
	
	private static String sacarNumero1(String coordenada){
		String num="";
		
		for(int i=1; coordenada.charAt(i-1)!=','; i++){
			num=num+coordenada.substring(i-1,i);
		}
		return num;
	}
	
	private static String sacarNumero2(String coordenada){
		String num="";
		int temp=0;
		
		for(int i=1; temp==0; i++)
			if(coordenada.charAt(i-1)==',')
				temp=i;
		
		for(int i=temp+1; i<coordenada.length(); i++)
			num=num+coordenada.substring(i-1,i);
		
		num=num+coordenada.substring(coordenada.length()-1,coordenada.length());
		
		return num;
	}
	
	private char cuantasMinasCerca(int a, int b){
		int cont=0;
		char num;
		
		if(b-1>=0)
			if(tablero[a][b-1]=='9')
				cont++;

		if(b+1<tablero[0].length)
			if(tablero[a][b+1]=='9')
				cont++;

		if(a-1>=0){
			if(tablero[a-1][b]=='9')
				cont++;
				
			if(b-1>=0)
				if(tablero[a-1][b-1]=='9')
					cont++;
			
			if(b+1<tablero[0].length)
				if(tablero[a-1][b+1]=='9')
					cont++;
		}
		
		if(a+1<tablero.length){
			if(tablero[a+1][b]=='9')
				cont++;
			
			if(b+1<tablero[0].length)
				if(tablero[a+1][b+1]=='9')
					cont++;
			
			if(b-1>=0)
				if(tablero[a+1][b-1]=='9')
					cont++;
		}
		
		num=String.valueOf(cont).charAt(0);
			
		return num;
	}
	
	public boolean terminado(){
		boolean terminado=false;
		int contadorMinas=0;
		int contadorCasillasTapadas=0;
		
		for(int i=0; i<tableroOculto.length; i++){
			for(int j=0; j<tableroOculto[0].length; j++){
				if(tableroOculto[i][j]=='9')
					terminado=true;
				
				if(tablero[i][j]=='9')
					contadorMinas++;
					
				if(tableroOculto[i][j]=='*')
					contadorCasillasTapadas++;
			}
		}
		
		if(contadorMinas==contadorCasillasTapadas)
			terminado=true;
			
		return terminado;
	}
	
	public boolean victoria(){
		boolean ganado=true;
		
		for(int i=0; i<tableroOculto.length; i++){
			for(int j=0; j<tableroOculto[0].length; j++){
				if(tableroOculto[i][j]=='9')
					ganado=false;
			}
		}
		
		return ganado;
	}
	
	public char[][] getTableroOculto(){
		return tableroOculto;
	}
	public char[][] getTablero(){
		return tablero;
	}
}
