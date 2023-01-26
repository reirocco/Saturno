package com.mycompany.polyline;

public class TestMain {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
        //creo la polilinea
        PolyLine pl= new PolyLine();
        
        //creo i punti da aggiungere alla polilinea
        Punto2D p1= new Punto2D(5,7);
        Punto2D p2= new Punto2D(2,5);
        Punto2D p3= new Punto2D(9,6);
        Punto2D p4= new Punto2D(1,0);

        //aggiungo i punti alla polilinea
        pl.aggiungiPunto(p1);
        pl.aggiungiPunto(p2);
        pl.aggiungiPunto(p3);
        pl.aggiungiPunto(p4);
        
        //stampo la polilinea
        System.out.println("Punti della Polilinea: " + pl.toString());
        
        //test del metodo passaPer
        System.out.println("\nTest Passa Per:");
        Punto2D pt1 = new Punto2D(3,2);
        Punto2D pt2 = new Punto2D(2,5);
        pl.passaPer(pt1);
        pl.passaPer(pt2);
        
        //aggiungo un elemento alla polilinea
        System.out.println("\nAggiungo un nuovo punto:");
        Punto2D nuovoPunto = new Punto2D(4,8);
        pl.aggiungiPunto(nuovoPunto);
        System.out.println("Punti della Polilinea: " + pl.toString());
        
        //modifico un punto dalla polilinea
        System.out.println("\nModifico il punto (9,6) in (8,3):");
        Punto2D puntoDaModificare = new Punto2D(9,6);
        pl.modificaPunto(puntoDaModificare, 8, 3);
        System.out.println("Punti della Polilinea: " + pl.toString());
        
        //rimuovo un punto dalla polilinea
        System.out.println("\nRimuovo il punto (2,5):");
        Punto2D puntoDaRimuovere = new Punto2D(2,5);
        pl.rimuoviPunto(puntoDaRimuovere);
        System.out.println("Punti della Polilinea: " + pl.toString());
    }
    
}
