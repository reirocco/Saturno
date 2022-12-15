package com.mycompany.polyline;

import java.util.ArrayList;
import java.util.Iterator;

public class PolyLine {
    
    private ArrayList<Punto2D> sequenza;
	
    public PolyLine(){
        sequenza=new ArrayList<Punto2D> (); 
    }

    public void passaPer(Punto2D p){
        if(verificaPassaPer(p)) System.out.println("La polilinea passa per il punto (" + p.getX() + " , " + p.getY() + ")");
        else System.out.println("La polilinea non passa per il punto (" + p.getX() + " , " + p.getY() + ")");
    }
    
    private boolean verificaPassaPer(Punto2D p){
        for(Punto2D q : sequenza)
            if(q.equals(p))return true;

        return false;
    }


    public void aggiungiPunto(Punto2D p){
        sequenza.add(p);
    }

    public void rimuoviPunto(Punto2D p){
        try{
            for (Iterator<Punto2D> iterator = sequenza.iterator(); iterator.hasNext(); ) {
                Punto2D q = iterator.next();
                if(q.equals(p)) iterator.remove();
            }
        }
        catch(Exception ex){
            System.out.println(ex);
            System.out.println("Punto non trovato");
        }
    }
    
    public void modificaPunto(Punto2D p, int x, int y){
        try{
            for(Punto2D q : sequenza)
            if(q.equals(p)){
                q.setX(x);
                q.setY(y);
            };
        }
        catch(Exception ex){
            System.out.println("Punto non trovato");
        }
    }
    
    //override metodo to string per stampare la lista dei punti della polilinea
    @Override
    public String toString() {
        String s = "";
        for(Punto2D q : sequenza)s = s + "(" + q.getX() + " , " + q.getY() + ") ";
        return s;
    } 
    
}
