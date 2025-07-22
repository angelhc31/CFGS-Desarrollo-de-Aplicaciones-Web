public abstract class vehiculo {
	
	private String matricula;
	private static final double PRECIO_BASE=50;
	
	vehiculo(String matricula)
	{
		this.matricula=matricula;
	}
	
	public String getMatricula()
	{
		return matricula;
	}
	public void setMatricula(String matricula)
	{
		this.matricula=matricula;
	}
	
	public double precio_alquiler(int dias)
	{
		return PRECIO_BASE*dias;
	}

    @Override
    public String toString() {
        return "vehiculo{" + "matricula=" + matricula + '}';
    }
	
	
	
}

