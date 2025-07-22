public class partidas {
	
	private char[][] tablero=new char[3][3];
	
	partidas(){
		
		for(int i=0; i<tablero.length; i++){
			for(int j=0; j<tablero[0].length; j++){
				tablero[i][j]=' ';
			}
		}
	}
	
	public void verTablero(){
		for(int i=0; i<tablero.length; i++){
			for(int j=0; j<tablero[0].length; j++){
				
					System.out.print(" "+tablero[i][j]+" ");
			}
			System.out.println();
			System.out.println();
		}
	}
	
	public boolean ponerFicha(char ficha, int y, int x){	
		if(tablero[x][y]==' '){
			tablero[x][y]=ficha;
			return true;
		}
		else{
			return false;	
		}
	}
	
	public boolean terminado(){
		boolean fin=true;
		
		for(int i=0; i<tablero.length && fin==true; i++){
			for(int j=0; j<tablero[0].length; j++){
				if(tablero[i][j]==' ')
					fin=false;
			}
		}
		
		for(int i=0; i<tablero.length && fin==false; i++){
			if(tablero[i][0]!=' ' && tablero[i][0]==tablero[i][1] && tablero[i][0]==tablero[i][2])
				fin=true;
			if(tablero[0][i]!=' ' && tablero[0][i]==tablero[1][i] && tablero[0][i]==tablero[2][i])
				fin=true;
		}
		
		if(tablero[1][1]!=' '){
			if(tablero[0][2]==tablero[1][1] && tablero[0][2]==tablero[2][0])
				fin=true;
			if(tablero[1][1]==tablero[0][0] && tablero[1][1]==tablero[2][2])
				fin=true;
		}
		return fin;		
	}
	
	public char ganador(){
		char fichaGanadora=' ';
		
		for(int i=0; i<tablero.length; i++){
			if(tablero[i][0]==tablero[i][1] && tablero[i][0]==tablero[i][2]){
				if(tablero[i][0]=='x')
					fichaGanadora='x';
				else
					fichaGanadora='o';
			}
			
			if(tablero[0][i]==tablero[1][i] && tablero[0][i]==tablero[2][i]){
				if(tablero[0][i]=='x')
					fichaGanadora='x';
				else
					fichaGanadora='o';
			}
		}
		
		if((tablero[0][2]==tablero[1][1] && tablero[0][2]==tablero[2][0]) || (tablero[1][1]==tablero[0][0] && tablero[1][1]==tablero[2][2])){
			if(tablero[1][1]=='x')
				fichaGanadora='x';
			else
				fichaGanadora='o';
		}
		
		return fichaGanadora;
	}
}

