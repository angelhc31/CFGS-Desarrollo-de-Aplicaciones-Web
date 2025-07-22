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
	
	public String toString(){
		return "x="+(int)super.getX()+",y="+(int)super.getY()+",z="+z;
	}
	
	public static void main(String[] args){
		punto3d punto=new punto3d(3,5,2);
		System.out.println(punto.toString());
		System.out.println("MOVE");
		punto.move(5,3,8);
		System.out.println(punto.toString());
		System.out.println("TRANSLATE");
		punto.translate(1,1,1);
		System.out.println(punto.toString());
	}
}

