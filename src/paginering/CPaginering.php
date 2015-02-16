<?php

namespace phpe\paginering;
/**
* Class to log what happens.
*
* @package LydiaCore
*/
class CPaginering extends CQueryString {

        private $hits, $page, $maxx, $minn;

    function __construct() {

    }

    public function setTotalRows($hits, $page, $max){
    // How many rows to display per page.
    $this->hits = $hits;
    // Which is the current page to display, use this to calculate the offset value
    $this->page = $page;
    // Max pages in the table: SELECT COUNT(id) AS rows FROM VMovie
    $this->maxx = ceil($max/$hits);
    // Startpage, usually 0 or 1, what you feel is convienient
    $this->minn = 1;

    }
/**
 * Create links for hits per page.
 *
 * @param array $hits a list of hits-options to display.
 * @return string as a link to this page.
 */
    private function getHitsPerPage($hits) {
      $nav = "<p>Träffar per sida: ";
      foreach($hits AS $val) {
          if($val == $this->hits){
        $nav .= "<a class='pageNavActive' href='" . $this->getQueryString(array('hits' => $val)) . "'>$val</a>";
          }
          else{
          $nav .= "<a class='pageNav' href='" . $this->getQueryString(array('hits' => $val)) . "'>$val</a>";
          }
      }
        //$nav .= "</p>";
      return $nav;
    }
    //$getHitsPerPage = getHitsPerPage(array(2, 4, 8));
/**
 * Create navigation among pages.
 *
 * @param integer $hits per page.
 * @param integer $page current page.
 * @param integer $max number of pages.
 * @param integer $min is the first page number, usually 0 or 1.
 * @return string as a link to this page.
 */
    private function getPageNavigation($hits, $page, $max, $min=1) {
      $nav  = "<p><a href='" . $this->getQueryString(array('page' => $min)) . "' class='pageNav'>&#8676;</a> ";
      $nav .= "<a href='" . $this->getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "' class='pageNav' >&#10096;</a> ";

      for($i=$min; $i<=$max; $i++) {
        if($i == $page){
            $nav .= "<span class='pageNavActive'>".$i."</span>";
        }
        else{
            $nav .= "<a href='" . $this->getQueryString(array('page' => $i)) . "' class='pageNav' >$i</a> ";
        }
      }

      $nav .= "<a href='" . $this->getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "' class='pageNav'>&#10097;</a> ";
      $nav .= "<a href='" . $this->getQueryString(array('page' => $max)) . "' class='pageNav' >&#x21e5;</a></p>";
      return $nav;
    }



    public function GetPageNav(){

        return $getPageNavigation = $this->getPageNavigation($this->hits, $this->page, $this->maxx, $this->minn);

    }



    public function GetNbrOfHitsPerPage(){
        return $getHitsPerPage = $this->getHitsPerPage(array(2, 4, 8));
    }
}
