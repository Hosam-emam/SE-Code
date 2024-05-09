<?php
    class TrueCaller{
        private static truecaller;
        private function __construct(){
            
        }
        
        public function identifyCaller(){
            if($this->truecaller == null){
                $this->truecaller = new TrueCaller();
            }else{
                return truecaller;
            }
        }
        
        public function remindCall(){
            
        }
        
        public function flashMessage(){
            
        }
        
        public function saveReg(){
            
        }
    }
?>