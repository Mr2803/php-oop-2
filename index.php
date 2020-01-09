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
    public $indirizzoResidenza;

    function __construct($nome, $cognome, $indirizzoFatturazione , $indirizzoResidenza )
    {

        parent::__construct($nome, $cognome);
        $this-> indirizzoFatturazione = $indirizzoFatturazione;
        $this-> indirizzoResidenza = $indirizzoResidenza;
    }

    public function __toString()
    {
        if($this->indirizzoFatturazione ===  $this->indirizzoResidenza || $this->indirizzoFatturazione === "" || $this->indirizzoResidenza === ""){
            if($this->indirizzoFatturazione === ""){
                return parent::__toString() . "<br> Indirizzo di fatturazione e di residenza coincidono :" . $this->indirizzoResidenza;
            } else if ($this->indirizzoResidenza === "") {
                return parent::__toString()."<br> Indirizzo di fatturazione e di residenza coincidono :".$this->indirizzoFatturazione;
            }
        } else{
            return parent::__toString(). "<br> Indirizzo di residenza : ".$this->indirizzoResidenza ." <br>" . "Indirizzo di fatturazione : " . $this->indirizzoFatturazione;
        }
    }

}

echo "<br>---------------<br>";
$persona = new Persona("Marco","Rispoli");
$test = $persona -> nome;
echo $test;
echo "Persona"."<br>";
echo $persona;
echo "<br>---------------<br>";
$ospite = new Ospite("Elena","Fierro","04/12/1991");
echo "Ospite"."<br>";
echo $ospite;
echo "<br>---------------<br>";
$pagante = new Pagante("Paperon","De Paperoni", "", "Via fuori i soldi 18");
echo "Pagante"."<br>";
echo $pagante;
if($ospite -> nome == $pagante -> nome && $ospite-> cognome == $pagante-> cognome){
echo "<br> Ospite e pagante sono la stessa persona";
};
