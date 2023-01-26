
/**
 *
 * @author rocco
 */
/* Un server echo è un'applicazione che consente a un client di connettersi ad un server,
 * in modo tale che il client possa inviare pacchetti al server, e il server li possa ricevere, e così al contrario,
 * cioè che il server possa rimandare (echo) i pacchetti al client
 */

import java.net.*;
import java.io.*;

public class UDPserver extends Thread {
    private DatagramSocket socket;
    private Storico s1;
    
    public UDPserver(int port, Storico s1) throws SocketException {
		this.s1 = s1;
        socket = new DatagramSocket(port);
        socket.setSoTimeout(1000); // 1000ms = 1s
    }
    
    public void run() {
        DatagramPacket answer;
        // creazione di un array di byte della dimensione specificata
        byte[] buffer = new byte[8192];
        // creazione di un datagram UDP a partire dall’array di byte
        DatagramPacket request = new DatagramPacket(buffer, buffer.length);
        Guest g1; 
        int numero_progressivo = 1;
        while (!Thread.interrupted()) {
            try {
				
                // attesa ricezione datagram di richiesta (tempo massimo di attesa: 1s)
                socket.receive(request);
                System.out.println("Sta interagendo l'IP: " + request.getAddress());
                System.out.println(new String(request.getAddress().getHostName()) + " e dice: " +  new String(request.getData()));
                g1 = new Guest(new String(request.getAddress().getHostName()),new String(request.getData()), numero_progressivo);
                this.s1.aggiungi(g1);
                // costruzione datagram di risposta (identico al datagram di richiesta)
                answer = new DatagramPacket( request.getData(), request.getLength(), request.getAddress(), request.getPort());
                // trasmissione datagram di risposta
                socket.send(answer);
                numero_progressivo++;
            }
            catch (Exception exception) {
            }
        }
        socket.close(); // chiusura del socket
    }
    
    public static void main(String[] args) {
        int c;
        Storico s1 = new Storico();
        
        try {
            UDPserver echoserver = new UDPserver(7777,s1);
            echoserver.start();
            c = System.in.read();
            echoserver.interrupt();	//premi qualunque tasto per interrompere la connessione
            echoserver.join();
            s1.getAll();
        }
        catch (IOException exception) {
            System.err.println("Errore!");
        }
        catch (InterruptedException exception) {
            System.err.println("Errore!");
        }
    }
}

