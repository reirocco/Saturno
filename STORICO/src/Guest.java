/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author rocco
 */
import static java.lang.System.out;
import java.security.MessageDigest;


public class Guest {
    public byte[] hash;
    public String ip;
    public String nome;


    public Guest(String ip, String nome, int numero_progressivo) throws Exception{
        MessageDigest digest = MessageDigest.getInstance("SHA-256");
        byte[] hash = digest.digest(String.valueOf(numero_progressivo).getBytes());
        this.hash = hash;
        this.ip = ip;
        this.nome = nome;
    }

}

