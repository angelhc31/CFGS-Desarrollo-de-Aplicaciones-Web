public class Objetos implements methods{
	private Object[] objetos;
	
	Objetos(int tamano){
		objetos=new Object[tamano];
	}
	
	public boolean guardar(Object x, int indice){
		if(objetos[indice]==null){
			objetos[indice]=x;
			return true;
		}
		else
			return false;
	}
	public Object obtener(int indice){
		return objetos[indice];
	}
	public void delete(int indice){
		objetos[indice]=null;
	}
	public void deleteAll(){
		for(int i=0; i<objetos.length; i++)
			objetos[i]=null;
	}
}
