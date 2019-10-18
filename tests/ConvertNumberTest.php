<?php

use PHPUnit\Framework\TestCase;

use App\Utils\ConvertNumber;

class ConvertNumberTest extends TestCase{

    /*
    * Test initialisation du constructeur avec paramètre entier
    */
	public function test_fonction_constructeur_ConvertNumber_avec_parametre_entier_saisi(){
		$number = new ConvertNumber(5);
        $this->assertTrue(true);
    }

    /*
    *  Test qui retourne le nombre saisi si il est positif
    */
    public function test_fonction_getInput_retourne_nombre_saisi_si_param_saisi_est_positif(){
        $number = new ConvertNumber(10);
        $res = $number->getInput();
        $this->assertEquals($res, 10);
    }

    /*
    *  Test qui retourne une erreur si le nombre est négatif
    */
    public function test_fonction_getInput_retourne_erreur_si_param_saisi_est_negatif(){
        $this->expectException(\Error::class);
        $number = new ConvertNumber(-10);
        $res = $number->getInput();
    }

    /*
    *  Test méthode retournant 0 si le nombre saisi est 0
    */
    public function test_fonction_convertFromBase10ToBase2_avec_0_saisi_retourne_0(){
        $number = new ConvertNumber(0);
        $res = $number->convertFromBase10ToBase2();
        $this->assertEquals($res, 0);
    }

    /*
    *
    */
    public function test_fonction_convertFromBase2ToBase10_avec0_retourne_0(){
        $number = new ConvertNumber(0);
        $res = $number->convertFromBase2ToBase10();
        $this->assertEquals($res, 0);
    }

    /*
    *  Test méthode retournant un nombre décimal converti en binaire
    */
    public function test_fonction_convertFromBase10ToBase2_avec_nombre_décimal_saisi_retourne_converti_en_binaire(){
        $number = new ConvertNumber(18);
        $res = $number->convertFromBase10ToBase2();
        $this->assertEquals($res, 10010);
    }

    /*
    * Test function qui retourne un nombre binaire en décimal
    */
    public function test_fonction_convertFromBase2ToBase10_avec_nombre_binaire_saisi_retourne_converti_en_décimal(){
        $number = new ConvertNumber("1001");
        $res = $number->convertFromBase2ToBase10();
        $this->assertEquals($res, 9);
    }

    /*
    * Test function qui retourne un nombre binaire en décimal
    */
    public function test_fonction_convertFromBase2ToAny_avec_nombre_binaire_saisi_retourne_converti_en_base_saisi(){
        $number = new ConvertNumber("1111");
        $res = $number->convertFromBase2ToAny(16);
        $this->assertEquals($res, "F");
    }

    /*
    * Test function qui retourne un nombre binaire en décimal
    */
    public function test_fonction_convertFromAnyToBase2_avec_nombre_saisi_et_base_départ_retourne_base_2(){
        $number = new ConvertNumber(10);
        $res = $number->convertFromAnyToBase2(10, 2);
        $this->assertEquals($res, "1010");
    }


    /*
    * Test function qui retourne un nombre romain en décimal
    */
    /*
    public function test_fonction_romanToBase2_avec_nombre_romain_saisi_retourne_nombre_converti_en_décimal(){
        $number = new ConvertNumber(10);
        $res = $number->romanToBase2("MMCX");
        $this->assertEquals($res, 2110);
    }*/
}
