<?php
/**
 * Jednoduchá třída která nám generuje HTML formulář pomocí PHP.
 *
 * @author Vojtěch Zeman <zemanjrk@seznam.cz>
 * @version 1.0
 * @package SI práce
 * 
 */
class formular {

    /**
     * Služí k uchování jednlotlivých vstupů do formuláře
     * @var array 
     */
    private $data = array();
    /**
     * Uchováva číslo vloženého zstupu.
     * @var int 
     */
    private $cislo;

    /**
     * Konstruktor třídy.
     * @param string $action Zadejte odkaz na souor na kteý bude formulář odkazovat.
     * @param string $method Zadejte druh metody POST nebo GET.
     * @param string $name Nadpis fprmuláře.
     * @todo Zapíše udaje do třídy.
     */
    function __construct($action, $method, $name) {
        $this->cislo = 0;
        $this->data["action"] = $action;
        $this->data["method"] = $method;
        $this->data["name"] = $name;
    }

    /**
     * Třída pro uložení jednoutlivých vstupů formuláře.
     * @param string $type Zadejte druh vstupního pole.
     * @param string $value Zdejte hodnotau pole (původní hodnotau pole nebo text zobrazovaný na tlačítku).
     * @param string $name Zadejte jméno pole, které se odesílá s daty.
     * @param string $placeholder Zadává předvyplněnou hodnotu, která při focusu může zmizet.
     * @param string $text Zadejte Názv před políčkem. 
     * @todo Zapíše udaje do třídy.
     */
    function input($type, $value, $name, $placeholder, $text) {
        $this->data["input"][$this->cislo]["type"] = $type;
        $this->data["input"][$this->cislo]["value"] = $value;
        $this->data["input"][$this->cislo]["name"] = $name;
        $this->data["input"][$this->cislo]["placeholder"] = $placeholder;
        $this->data["input"][$this->cislo]["text"] = $text;
        $this->cislo++;
    }

    /**
     * Magická metoda pro vypsání třídy.
     * @return string Vrátí vygenerovaný formulář.
     * @todo Vygeneruje celý formulář ze vstupních hodnot
     */
    function __toString() {
        $return = "<form "
                . "method='"
                . $this->data["method"]
                . "' "
                . "action='"
                . $this->data["action"]
                . "' >";
        $return .= "<fieldset>";
        $return .= "<legend>";
        $return .= $this->data["name"];
        $return .= "</legend>";
        for ($i = 0; $i < count($this->data["input"]); $i++) {
            $return .= $this->data["input"][$i]["text"] . ": ";
            $return .= "<input ";
            if ($this->data["input"][$i]["type"] != "") {
                $return .= "type='".$this->data["input"][$i]["type"]."' ";
            } if ($this->data["input"][$i]["value"] != "") {
                $return .= "name='".$this->data["input"][$i]["value"]."' ";
            } if ($this->data["input"][$i]["name"] != "") {
                $return .= "value='".$this->data["input"][$i]["name"]."' ";
            } if ($this->data["input"][$i]["placeholder"] != "") {
                $return .= "placeholder='".$this->data["input"][$i]["placeholder"]."' ";
            }
            $return .= "><br><br>";
        }
        $return .= "<form>";
        $return .= "</fieldset>";
        return $return;
    }

}
