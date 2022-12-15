
import java.util.Vector;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rocco
 */
public class Receiver extends Thread {
    Vector data;
    
    public Receiver(Vector v) {
        data = v;
    }
    
    public Object receive() {
        Object obj;
        synchronized (data) {
            if (data.size() == 0){
                obj = null;
            } else {
                obj = data.elementAt(0);
                data.removeElementAt(0);
            }
        }
        return obj;
    }
    
    public void run() {
        Object obj;
        while (!isInterrupted()) {
            while ((obj = receive()) == null) {
                try {
                    sleep(1000);
                }catch (InterruptedException e) {
                    return;
                }
            System.out.println(obj.toString());
            }
        }
    }
}
