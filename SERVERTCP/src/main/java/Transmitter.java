
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
public class Transmitter extends Thread {
    Vector data;
    
    public Transmitter(Vector v) {
        data = v;
    }
    
    public void transmit(Object obj) {
        synchronized (data) {
            data.add(obj);
        }
    }
    
    public void run() {
        int sleepTime = 50;
        transmit("Ora trasmetto 10 numeri");
        try {
            if (!isInterrupted()) {
                sleep(1000);
                for (int i = 1; i <= 10; i++) {
                transmit(new Integer(i * 3));
                if (isInterrupted())
                break;
                sleep(sleepTime * i);
                }
            }
        }catch (InterruptedException e) {
         
        }
        transmit("Fine della trasmissione");
    }
}
