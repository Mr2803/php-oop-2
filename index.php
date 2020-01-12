<!-- GOAL: 
- Definire la classe Persona caratterizzata da nome e cognome
- Definire la classe Ospite (che eredita da Persona) caratterizzata da nome, cognome e anno di nascita
- Definire la classe Pagante (che eredita da Persona) caratterizzata da nome, cognome e indirizzo (di residenza)
- Per ogni classe definire costruttore e toString in maniera appropriata, eventualmente richiamando i metodi della classe padre
- Eseguire dei test, istanziando ogni classe definita e testando la correttezza dei risultati attesi -->

<?php

class Persona {
    private $nome;
    private $cognome;

    function __construct($nome, $cognome){

        // valorizzazione variabili tramite parametri
        $this-> setName($nome);
        $this-> setLastname($cognome);
    }

    //funzioni get&set
    function getName() {return $this -> nome;} 
    function setName($nome){return $this -> nome = $nome;}
    function getLastname() {return $this -> cognome;} 
    function setLastname($cognome){return $this -> cognome = $cognome;}

    function __toString(){

        /* rappresentazione testuale dell'oggetto */
        return "Nome :".$this-> getName() . "<br>" ."Cognome :". $this-> getLastname() ;
    } 
}

class Ospite extends Persona{
    private $annoDiNascita;

    function __construct($nome, $cognome, $annoDiNascita){

        parent::__construct($nome, $cognome);
       
        $this-> setDateOfBirth($annoDiNascita);
    }

    //funzioni get&set
    function getDateofBirth(){return $this-> annoDiNascita;}
    function setDateOfBirth($annoDiNascita){return $this-> annoDiNascita = $annoDiNascita;}

    function __toString(){
        
       return parent::__toString()."<br> Anno di Nascita :".$this->getDateofBirth();
    }

}
class Pagante extends Persona{
    private $indirizzoFatturazione;
    private $indirizzoResidenza;

    function __construct($nome, $cognome, $indirizzoFatturazione , $indirizzoResidenza ){

        parent::__construct($nome, $cognome);
        $this-> indirizzoFatturazione = $indirizzoFatturazione;
        $this-> indirizzoResidenza = $indirizzoResidenza;
    }

    //funzioni get&set
    function getIndFatt(){ return $this-> indirizzoFatturazione;}
    function setIndFatt($indirizzoFatturazione){return $this->indirizzoFatturazione = $indirizzoFatturazione;}
    function getIndResidenza(){ return $this-> indirizzoResidenza;}
    function setIndResidenza($indirizzoResidenza){return $this-> indirizzoResidenza = $indirizzoResidenza;}

    //useful function
    function comparisonAddress(){
        if ($this->getIndResidenza() ===  $this->getIndFatt()) {
            return "<br> Indirizzo di fatturazione e di residenza coincidono :" . $this->getIndResidenza();
        } else {
            return "<br> Indirizzo di residenza : " . $this->getIndResidenza() . " <br>" . "Indirizzo di fatturazione : " . $this->getIndFatt();
        } 
    }

    function __toString(){
        return parent::__toString() . $this -> comparisonAddress();
    }

}

echo "<br>---------------<br>";

$persona = new Persona("Marco","Rispoli");
echo "<b>Persona</b>"."<br>";
echo $persona;

echo "<br>---------------<br>";

$ospite = new Ospite("Elena","Fierro","04/12/1991");
echo "<b>Ospite</b>"."<br>";
echo $ospite;

echo "<br>---------------<br>";

$pagante = new Pagante("Elena","Fierro", "Via fuori i soldi 19", "Via fuori i soldi 18");
echo "<b>Pagante</b> <br>";
echo $pagante;

if($ospite -> getName() === $pagante -> getName() && $ospite -> getLastname() === $pagante-> getLastname()){
    echo "<br> <b>Ospite e pagante sono la stessa persona</b>";
};
