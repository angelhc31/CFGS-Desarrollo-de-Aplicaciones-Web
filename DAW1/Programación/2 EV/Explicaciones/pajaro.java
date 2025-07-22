public class pajaro
{
	String color;
	String nombre;
	double peso;
	double altura;

	String sobrepeso()
	{
		if(peso*altura>10)
			return "Sobrepeso";
		else
			return "normal";
	}
}

