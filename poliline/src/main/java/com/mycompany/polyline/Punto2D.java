package com.mycompany.polyline;

public class Punto2D {
    
    private float x;
    private float y;


    public Punto2D(float x, float y){
        this.x=x;
        this.y=y;
    }
    public void setX(float x){
        this.x=x;
    }

    public void setY(float y){
        this.y=y;
    }

    public float getX(){
        return this.x;
    }

    public float getY(){
        return this.y;
    }

    public  float distPunti(Punto2D p){
        return(float)Math.sqrt((this.x-p.x)*(this.x-p.x)+(this.y-p.y)*(this.y-p.y));
    }

    public void copia(Punto2D p){
        p.x=this.x;
        p.y=this.y;
    }


    //se non è un'istanza di Punto2D return false, altrimenti verifico se le cordinate sono le stesse
    @Override
    public boolean equals(Object o) {
        if (!(o instanceof Punto2D)) {
            return false;
        }       
        Punto2D p = (Punto2D) o;         
        if(p.x == this.x && p.y == this.y) return true;         
        else return false;                
    }
    
}
