/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rocco
 */
import java.net.*;
import java.io.*;
 
/**
 * This program is a socket client application that connects to a time server
 * to get the current date time.
 *
 * @author www.codejava.net
 */
public class SocketClient {
 
    public static void main(String[] args) {
        String hostname = "localhost";
        int port = 7777;
 
        try (Socket socket = new Socket(hostname, port)) {
 
            PrintWriter out = new PrintWriter(socket.getOutputStream(), true);
            BufferedReader in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
            
            //ciclo per prendere all'infinito i parametri da console
            while(true){
                BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
                System.out.println("Enter something");
                String input = br.readLine();
                out.println(input);
            }
            
        } catch (UnknownHostException ex) {
 
            System.out.println("Server not found: " + ex.getMessage());
 
        } catch (IOException ex) {
 
            System.out.println("I/O error: " + ex.getMessage());
        }
    }
}