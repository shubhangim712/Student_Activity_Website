<?php
class Activity
{
    public string $date = "";
    public string $name = "";
    public string $location = "";

    public function __construct($d, $n, $l) {
        $this->date = $d;
        $this->name = $n;
        $this->location = $l; 
    }
}
?>