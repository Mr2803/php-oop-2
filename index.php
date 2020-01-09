<!-- GOAL: 
- Definire la classe Persona caratterizzata da nome e cognome
- Definire la classe Ospite (che eredita da Persona) caratterizzata da nome, cognome e anno di nascita
- Definire la classe Pagante (che eredita da Persona) caratterizzata da nome, cognome e indirizzo (di residenza)
- Per ogni classe definire costruttore e toString in maniera appropriata, eventualmente richiamando i metodi della classe padre
- Eseguire dei test, istanziando ogni classe definita e testando la correttezza dei risultati attesi -->

<?php

class Persona {
    public $nome;
    public $cognome;

    function __construct($nome, $cognome)
    {

        // valorizzazione variabili tramite parametri
        $this-> nome = $nome;
        $this-> cognome = $cognome;
    }

    public function __toString()
    {

        /* rappresentazione testuale dell'oggetto */
        return "Nome :". $this->nome . "<br>" ."Cognome :". $this->cognome ;
    } 
}

class Ospite extends Persona{
    public $annoDiNascita;

    function __construct($nome, $cognome, $annoDiNascita)
    {

        parent::__construct($nome, $cognome);
        $this-> annoDiNascita = $annoDiNascita;
    }

    public function __toString()
    {

       return parent::__toString()."<br> Anno di Nascita :".$this->annoDiNascita;
    }

}
class Pagante extends Persona{
    public $indirizzoFatturazione;

    function __construct($nome, $cognome, $indirizzoFatturazione)
    {

        parent::__construct($nome, $cognome);
        $this-> indirizzoFatturazione = $indirizzoFatturazione;
    }

    public function __toString()
    {

       return parent::__toString()."<br> IndirizzoFatturazione :".$this->indirizzoFatturazione;
    }

}

echo "<br>---------------<br>";
$persona = new Persona("Marco","Rispoli");
echo "Persona prossimamente famosa"."<br>";
echo $persona;
echo "<br>---------------<br>";
$ospite = new Ospite("Elena","Fierro","04/12/1991");
echo "Ospite"."<br>";
echo $ospite;
echo "<br>---------------<br>";
$pagante = new Pagante("Paperon","De Paperoni","Via fuori i soldi");
echo "Pagante"."<br>";
echo $pagante;
