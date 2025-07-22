public class microbus extends vehiculo_pasajeros {
	private static final double PRECIO_PLAZA=2;
	microbus(String matricula, int plazas)
	{
		super(matricula,plazas);
	}
	
	public double precio_alquiler(int dias)
	{
		double temp=PRECIO_PLAZA*getPlazas();
		double temp2=super.precio_alquiler(dias);
		return temp+temp2;
	}
	
}

