public class MetodoAlgoritmoBurbuja {



	public static void ordenarVecInt(int [] vec){
		int temp;
		boolean ordenado=false;
		
		while(!ordenado){
			ordenado=true;
			for(int i=0; i<vec.length-1; i++){
				if(vec[i]>vec[i+1]){
					temp=vec[i];
					vec[i]=vec[i+1];
					vec[i+1]=temp;
					ordenado=false;
				}
			}
		}
	}
	
	
	
	public static void main (String[] args) {
		
	}
}

