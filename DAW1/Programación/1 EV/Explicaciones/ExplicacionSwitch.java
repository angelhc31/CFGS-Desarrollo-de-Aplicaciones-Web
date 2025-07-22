public class ExplicacionSwitch{
	
	public static void main (String[] args) {
		int x=2;
		int z=7;
		
		switch (x){
			case 1: System.out.println("uno");
				break;
			case 2: if(z==7){
						System.out.println("dos");
						z++;
						System.out.println(z);
					}
				break;
			case 3: System.out.println("tres");
				break;
			default: System.out.println("no contemplado");
		}
	}
}
