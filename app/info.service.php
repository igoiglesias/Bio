<?php

class InfoService{
    private $connection;
    private $info;

    public function __construct(Connection $connection, Info $info){
        $this->connection = $connection->connect();
        $this->info = $info;
    }

    public function save($data){
        $ip = $data['ip'];
        $browser = $data['browser'];
        $browser_version = $data['browser_version'];
        $plataform = $data['plataform'];
        $mobile = $data['mobile'];
        $robot = $data['robot'];
        $tablet = $data['tablet'];
        $facebook = $data['facebook'];
        $base_url = $data['base_url'];
        $site_prev = $data['site_prev'];
        $site_name = $data['site_name'];

        $sql = "INSERT INTO history (ip,browser,browser_version,plataform,mobile,robot,tablet,facebook,base_url,site_prev,site_name) values (:ip,:browser,:browser_version,:plataform,:mobile,:robot,:tablet,:facebook,:base_url,:site_prev,:site_name)";
        
        $insert = $this->connection->prepare($sql);
        $insert->bindParam(':ip', $ip);
        $insert->bindParam(':browser', $browser);
        $insert->bindParam(':browser_version', $browser_version);
        $insert->bindParam(':plataform', $plataform);
        $insert->bindParam(':mobile', $mobile);
        $insert->bindParam(':robot', $robot);
        $insert->bindParam(':tablet', $tablet);
        $insert->bindParam(':facebook', $facebook);
        $insert->bindParam(':base_url', $base_url);
        $insert->bindParam(':site_prev', $site_prev);
        $insert->bindParam(':site_name', $site_name);
        $insert->execute();
        // $this->connection->commit();

        return $data;

    }

    // public function getFiveNews(){
    //     $query = "select * from empresas order by data_cadastro limit 6;";

    //     $query = $this->connection->prepare($query);
    //     $query->execute();

    //     return $query->fetchall(PDO::FETCH_ASSOC);

    // }
}