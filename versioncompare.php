<?php 
    class versioncompare{
        private $mainversion = '1.0.17+60';

        public function __construct(){
        }

        public function versioncompare($version,$datetime){
            if(version_compare($version, $this->mainversion)==-1){
                $given = new DateTime($datetime, new DateTimeZone("Europe/Berlin"));
                $given->setTimezone(new DateTimeZone("UTC"));
                $output = $given->format("Y-m-d H:i:s"); 
                return $output;
            } else {
                return $datetime;
            }
        }
    }
    $vc = new versioncompare();
?>