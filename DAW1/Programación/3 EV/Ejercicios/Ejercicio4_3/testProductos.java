public class testProductos {
	
	public static void main (String[] args) {
		ProdFresco naranjas=new ProdFresco("31/12/2020","24US8812W","25/12/2020","Espana");
		ProdFresco azafran=new ProdFresco("21/01/2021","30F8W4J0","17/01/2021","Japon");
		
		ProdRefrigerado dorada=new ProdRefrigerado("31/12/2020","JG392D2N0","25/12/2020","Espana",7.5,"FEH29DFOQINE120SDNOQ23");
		ProdRefrigerado corzo=new ProdRefrigerado("04/02/2021","EH239QJ10W","01/02/2021","Espana",8,"HF394H23D09HUF240D");
		ProdRefrigerado salmon=new ProdRefrigerado("21/01/2021","F3NR923INAF","17/01/2021","Japon",6,"QDVQJRQHW084H3OF3");
		
		ProdCongeladoAire patatasFritas=new ProdCongeladoAire("11/10/2023","NEYWE823AD9","15/07/2020","Espana",-5.2,25,25,25,25);
		ProdCongeladoAire pechugasPollo=new ProdCongeladoAire("4/06/2024","FRJ498H2HOCQ","12/02/2021","Espana",-5,10,10,10,70);
		
		ProdCongeladoAgua lubina=new ProdCongeladoAgua("21/01/2021","DGJ340DIEJF2","05/01/2021","Portugal",-10,34.67);
		ProdCongeladoAgua atun=new ProdCongeladoAgua("22/02/2022","IJWFIJ420EJ","22/02/2021","Italia",-10,127.36);
		
		ProdCongeladoNitrogeno nuggetsPollo=new ProdCongeladoNitrogeno("4/06/2027","EWIFJ40HCQD","12/02/2021","China",-7.4,15,"Sumergido");
		
		
		System.out.println(naranjas.toString());
		System.out.println(azafran.toString());
		
		System.out.println();
		System.out.println();
		
		System.out.println(dorada.toString());
		System.out.println(corzo.toString());
		System.out.println(salmon.toString());
		
		System.out.println();
		System.out.println();
		
		System.out.println(patatasFritas.toString());
		System.out.println(pechugasPollo.toString());
		
		System.out.println();
		System.out.println();
		
		System.out.println(lubina.toString());
		System.out.println(atun.toString());
		
		System.out.println();
		System.out.println();
		
		System.out.println(nuggetsPollo.toString());
	}
}

