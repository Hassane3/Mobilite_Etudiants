<?php
class Diplome {
    public $codeDiplome;
    public $nomDiplome;
    public $codeU;

    public function __construct($codeDiplome, $nomDiplome, $codeU){
        $this->codeDiplome = $codeDiplome;
        $this->nomDiplome = $nomDiplome;
        $this->codeU = $codeU;
        
    }


    public static function addDiplome($codeDiplome,$nomDiplome,  $codeU ) {
	
        include_once("utils.php");
		$db = Utils::connect();
        $sql = "insert INTO diplome (codeDiplome, nomDiplome, codeU) VALUES (:".$codeDiplome.", :".$nomDiplome.", :".$codeU.")";
		$stmt = Utils::query($db,$sql);
    }
}
?>