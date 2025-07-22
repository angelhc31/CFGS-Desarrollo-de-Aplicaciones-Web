public class probarPractica3 {
	
	public static void main (String[] args) {
		
		Practica3 cuantosClientes=new Practica3(8.6,20.8);
		
		System.out.println("Chocos");
		System.out.println("Get: "+cuantosClientes.getKgChocos());
		cuantosClientes.setKgChocos(17.8);
		System.out.println("Set: "+cuantosClientes.getKgChocos());
		cuantosClientes.addChocos(2);
		System.out.println("Add: "+cuantosClientes.getKgChocos());
		
		System.out.println();
		
		System.out.println("Papas");
		System.out.println("Get: "+cuantosClientes.getKgPapas());
		cuantosClientes.addPapas(5);
		System.out.println("Add: "+cuantosClientes.getKgPapas());
		
		System.out.println();
		
		System.out.println("Comensales");
		System.out.println("Get: "+cuantosClientes.getComensales());
	}
}

