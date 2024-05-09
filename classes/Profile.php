<?php
    private profile_ID;

    public function editProfile($Name, $langc_id){
        

            $this->db = new Database();
            $c_num = $this->getc_num();
            echo intval($c_id);
            $query = "UPDATE contacts SET Name = '$Name' WHERE c_id ='$c_id'";
            $this->db->update($query);
            echo "Error in Database Connection";
            return false;
    }

    public function changeLanguage($lang){
        
    }

    public function getProfileViews(){

    }

    public function viewCallLog(){

    }

    public function deleteAcc(){

    }
?>