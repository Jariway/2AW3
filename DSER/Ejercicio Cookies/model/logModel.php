<?php

class logModel extends logClass{
    
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
    
    public function addLog()
    {
        $this->OpenConnect();
        $sql="call spAddLog($this->idCookie,'$this->log')";
        $this->link->query($sql);
        $this->CloseConnect();
    }
    
    public function setListLogsForCookie()  // loads in "list" all the logs in the database for a single cookie
    {
        $this->OpenConnect();
        $sql="SELECT * FROM log WHERE log.id_cookie=$this->idCookie"; // in a stored procedure generates an error phpmyadmin BUG
       
        $result=$this->link->query($sql);
        $this->CloseConnect();
        $this->list=array();
        while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
            $new=new self();
            $new->setIdLog($row['idLog']);
            $new->setIdCookie($this->idCookie);
            $new->setLog($row['log']);
            array_push($this->list, $new);
            // var_dump($row);
        }
         
     }     
     function getList() {
         return $this->list;
     }
    
    public function getSearchTerm()
    {
        
    }


}
