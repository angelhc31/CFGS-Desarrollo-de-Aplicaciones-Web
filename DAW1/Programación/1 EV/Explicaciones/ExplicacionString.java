public class ExplicacionString {
	
	public static void main (String[] args) {
		
		String txt="Hola Mundo";
		String txt2="Adios Mundo";
		
		System.out.println(txt.charAt(txt.length()-1));
		
		if(txt.compareTo(txt2)>0){
			System.out.println("dentro");
		}
		if(txt.equals(txt2)){
			System.out.println("dentro2");
		}
		System.out.println(txt2.replace('a','o'));
	}
}