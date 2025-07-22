public abstract class vehiculo_carga extends vehiculo {
	
	private static final double PRECIO_TONELADA=20;//precio por PMA
	private double pma;
	
	vehiculo_carga(String matricula,double pma)
	{
		super(matricula);
		this.pma=pma;
	}
	
	public void setPma(double p)
	{
		pma=p;
	}
	public double getPma()
	{
		return pma;
	}
	
	public double precio_alquiler(int dias)
	{
			double temp=PRECIO_TONELADA*pma;
			
			return super.precio_alquiler(dias)+temp;
	}

    @Override
    public String toString() {
        return super.toString()+" vehiculo_carga{" + "pma=" + pma + '}';
    }
	
	
}
