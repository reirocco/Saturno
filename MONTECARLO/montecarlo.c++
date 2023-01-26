#include <iostream>
#include <cstdlib>
#include <ctime>
#include <math.h>
using namespace std;
/* Stampa a schermo la stringa “domanda”, e riceve un carattere in input
dall'utente. Se il carattere è 's' o 'S' ritorna true, se è 'n' o 'N'
ritorna false, mentre con qualsiasi altro carattere fa ripetere l'input */
bool chiedi_conferma(const char domanda[])
{
    char c;
    bool res;
    cout<<domanda<<endl;
    cin>>c;

    if((int) c >= 90){
        c = (char) c - 32;
    }

    switch (c)
    {
    case 'S':
        return true;
        break;
    case 'N':
        return false;
        break;
    default:
        cout<<"Usa solo i caratteri consentiti"<<endl;
        break;
    }
}
/* Ritorna true se il punto di coordinate (x,y) è all'interno di un cerchio
di raggio 1, cioè se x^2 + y^2 ≤ 1, false in ogni altro caso */
bool punto_nel_cerchio(float x, float y)
{
    return pow(x,2) + pow(y,2) <= 1;
}

/* Ritorna un valore float randomico compreso tra 0.0 e 1.0 */

float genera_valore_random()
{
    float number;
	
	number = rand()%101; //numeri casuali tra 0 e 100
    if(number != 0){ 
        number /= 100;
    }
    return number;
}

int main()
{
    srand(time(0)); 
    int punti;
    float x,y;
    int k = 0;
    bool res;
    do{
        cout<<"Quanti punti vuoi generare?"<<endl;
        cin>> punti;

        for(int i = 0; i < punti; i++){
            x = genera_valore_random();
            y = genera_valore_random();
            cout<< x<<endl;
            cout<< y<<endl;
            res = punto_nel_cerchio(x,y);
            if(res){
                k++;
            }
        }
        cout<< "Dopo "<< punti <<" punti generati "<< k <<" punti sono dentro il settore circolare"<<endl;
        cout<< "Dunque il valore approssimato del pi greco e': "<<(float) 4 * k/punti<<endl;
        

    }while(chiedi_conferma("Vuoi continuare?"));
    
}