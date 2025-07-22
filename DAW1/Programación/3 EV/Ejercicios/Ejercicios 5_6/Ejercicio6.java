import java.awt.Point;
public class punto3d extends Point{
	
	private int z;
	
	punto3d(int x, int y, int z){
		super(x,y);
		this.z=z;
	}
	
	public void move(int x, int y, int z){
		super.move(x,y);
		this.z=z;
	}
	
	public void translate(int dx, int dy, int dz){
		super.translate(dx,dy);
		z=z+dz;
	}
	
	public boolean equals(punto3d p1){
		if(super.getX()==p1.getX() && super.getY()==p1.getY() && z==p1.getZ())
			return true;
		else
			return false;
	}
	
	public int getZ(){
		return z;
	}
	
	public String toString(){
		return "x="+(int)super.getX()+",y="+(int)super.getY()+",z="+z;
	}
	
	public static void main(String[] args){
		punto3d punto=new punto3d(3,5,2);
		punto3d punto2=new punto3d(6,4,9);
		System.out.println(punto.toString());
		System.out.println("MOVE");
		punto.move(5,3,8);
		System.out.println(punto.toString());
		System.out.println("TRANSLATE");
		punto.translate(1,1,1);
		System.out.println(punto.toString());
		
		System.out.println();
		System.out.println();
		
		System.out.print("Punto1: ");
		System.out.println(punto.toString());
		System.out.print("Punto2: ");
		System.out.println(punto2.toString());
		
		if(punto.equals(punto2))
			System.out.println("Son iguales");
		else
			System.out.println("No son iguales");
		
		
		System.out.println();
		System.out.println();
		
		System.out.println("TRANSLATE");
		punto.translate(1,1,1);
		
		System.out.print("Punto1: ");
		System.out.println(punto.toString());
		System.out.print("Punto2: ");
		System.out.println(punto2.toString());
		
		if(punto.equals(punto2))
			System.out.println("Son iguales");
		else
			System.out.println("No son iguales");
			
	}
}

