/*
Nome utente:	Nori Rocco
Nome sorgente: cpuinfo.c
Classe:	3BIN
Data:
Funzione:
Commenti:
Versione n°1
*/


#include<stdio.h>


void main(){
	
	system("echo Gruppo numero 4 >> scheda\\ tecnica.txt");

	system("cat /proc/cpuinfo > info.txt");

	system("grep -i -e processor -e model\\ name /proc/cpuinfo > scheda\\ tecnica.txt");

	system("grep -i -e MemTotal /proc/meminfo >> scheda\\ tecnica.txt");
	
	
}
