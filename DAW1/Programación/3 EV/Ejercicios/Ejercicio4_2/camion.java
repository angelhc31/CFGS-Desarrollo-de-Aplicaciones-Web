public class camion extends vehiculo_carga {
	private static final double PRECIO_FIJO=40;
	camion(String matricula, double pma)
	{
		super(matricula,pma);
	}
	
	public double precio_alquiler(int dias)
	{
		
		return super.precio_alquiler(dias)+PRECIO_FIJO;
	}
        
	
}
