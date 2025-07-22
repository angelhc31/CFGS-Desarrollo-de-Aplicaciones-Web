
public class ExplicacionMetodos3 {
	
	public static void ordenarVector(int [] vec){
		
		vec[2]=22; //por lo que nums[2]=2 (se sobreescribe)
		
	}
	
	public static void main (String[] args) {
		
		int [] nums={7,3,1,5};
		
		for(int i=0; i<nums.length; i++)
			System.out.print(nums[i]+" ");
			
		ordenarVector(nums);
		
		System.out.println();
		System.out.println("---------------------------------------");
		
		for(int i=0; i<nums.length; i++)
			System.out.print(nums[i]+" ");
	}
}
