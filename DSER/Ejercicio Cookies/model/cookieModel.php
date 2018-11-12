<?php

class cookieModel extends cookieClass{
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
        $this->link->close();
     }
     
    public function getNewCookie()
    {
        /*
         * get from the database the next available idCookie
         */
        $this->OpenConnect();
        $sql="call spGetNewCookie()";
        $result=$this->link->query($sql);
        $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row['id'];
        
    }
}
