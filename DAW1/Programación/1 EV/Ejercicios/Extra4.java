public class Extra4 {
	
	public static void main (String[] args) {
		
		int trevol=0;
		int rombo=0;
		int pica=0;
		int corazon=0;
		String union1;
		String union2;
		String union3;
		int num1;
		int num2;
		int num3;
		
		System.out.println("    $ * #");
		System.out.println("      $ +");
		System.out.println("  _________");
		System.out.println("    * # $");
		
		System.out.println();
		System.out.println();
		
		for(int i=0; i<=9; i++){ //trevol
			for(int j=0; j<=9; j++){ //rombo
				for(int k=0; k<=9; k++){ //pica
					union1=String.valueOf(i)+String.valueOf(j)+String.valueOf(k);
					union3=String.valueOf(j)+String.valueOf(k)+String.valueOf(i);
					for(int l=0; l<=9; l++){ //corazon
						union2=String.valueOf(i)+String.valueOf(l);
						
						num1=Integer.parseInt(union1);
						num2=Integer.parseInt(union2);
						num3=Integer.parseInt(union3);
						
						if(num1+num2==num3 && i!=j && i!=k && i!=l && j!=k && j!=l && k!=l){
							System.out.println();
							System.out.println("$="+i);
							System.out.println("*="+j);
							System.out.println("#="+k);
							System.out.println("+="+l);
						}
					}
				}
			}
		}
	}
}

