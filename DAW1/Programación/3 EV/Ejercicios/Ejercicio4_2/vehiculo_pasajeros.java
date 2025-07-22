public abstract class vehiculo_pasajeros extends vehiculo {
	
	private static final double PRECIO_PLAZA_DIA=1.5;
	private int plazas;
	
	vehiculo_pasajeros(String matricula,int plazas)
	{
		super(matricula);
		this.plazas=plazas;
	}
	
	public void setPlazas(int p)
	{
		plazas=p;
	}
	public int getPlazas()
	{
		return plazas;
	}
	
	public double precio_alquiler(int dias)
	{
			double temp=dias*plazas*PRECIO_PLAZA_DIA;
			
			return super.precio_alquiler(dias)+temp;
	}

    @Override
    public String toString() {
        return super.toString()+ "vehiculo_pasajeros{" + "plazas=" + plazas + '}';
    }
	
	
}

