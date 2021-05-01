<?php

namespace App\Data;
 
use App\Entity\CarteGraphique;
use App\Entity\DisqueDur;
use App\Entity\Marques;
use App\Entity\Memoires;
use App\Entity\Processeur;
use App\Entity\SousCategories;
use App\Entity\SystemeExploitation;

class SearchData{



    /**
     * Undocumented variable
     *
     * @var null|integer
     */
    public $q;

    /**
     * Undocumented variable
     *
     * @var SousCategories[]
     */
    public $sousCategories=[];

    /**
     * Undocumented variable
     *
     * @var Marques[]
     */
    public $marques=[];

    /**
     * Undocumented variable
     *
     * @var Processeur[]
     */
    public $processeur=[];

    /**
     * Undocumented variable
     *
     * @var Memoires[]
     */
    public $memoires=[];

    /**
     * Undocumented variable
     *
     * @var DisqueDur[]
     */
    public $disqueDur=[];

    /**
     * Undocumented variable
     *
     * @var CarteGraphique[]
     */
    public $carteGraphique=[];

    /**
     * Undocumented variable
     *
     * @var SystemeExploitation[]
     */
    public $systemeExploitation=[];
}