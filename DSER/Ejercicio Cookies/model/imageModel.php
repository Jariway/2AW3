<?php

class imageModel {
   private $link;
   private $list;  
    
    public function OpenConnect()
    {
        $konDat=new connect_data();
        try
        {
         $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
         // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
         // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
        }
        catch(Exception $e)
        {
        echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }                   
 
    public function CloseConnect()
     {
     //mysqli_close ($this->link);
        $this->link->close();
     }

    public function getImageUrl($keyWord)
     {
        /*
         * find a image according to the key word and return the url
         */
   
        $this->OpenConnect();
        $TrimmedkeyWord=trim($keyWord); //delete whitespaces (or other characters) from the beginning and end of a string
        $sql="call spGetImageUrl('$TrimmedkeyWord')";
        $result=$this->link->query($sql);
        //echo $sql;
        $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row['url'];
     }
     

}
