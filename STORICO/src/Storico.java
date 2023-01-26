/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * @author rocco
 */
import java.util.*;  

public class Storico {
	
	public ArrayList<Guest> g = new ArrayList<Guest>();
	
	
	public Storico(){
		
	}
	
	public void aggiungi(Guest g1){
		this.g.add(g1);
	}
	
	
	public void getAll(){
		String tmp = "";
		
		for(Guest appoggio : this.g){
			System.out.println("Codice -> " + appoggio.hash + "\n IP -> " + appoggio.ip + "\n Nome -> " + appoggio.nome );
		}
			 
	}
	
	
}


