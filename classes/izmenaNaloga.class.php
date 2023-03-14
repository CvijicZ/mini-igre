<?php 
session_start();


    if($_POST['action']=='promeniIme'){
        include "dbh.php";
        try{
            $dbh->beginTransaction();
            $ime=$_POST['ime'];
        
            $sql="SELECT ime FROM igrac WHERE ime=:ime";
            $stmt=$dbh->prepare($sql);
            $stmt->bindParam(":ime",$ime);
            $stmt->execute();
        
            if($stmt->rowCount()>0){
                header("location: /mini-igre/izmenaNaloga.php?error=ZauzetoIme");     
                exit();
            }
            else if(!ctype_alnum($ime)){
                header("location: /mini-igre/izmenaNaloga.php?error=FormatImena");
                exit();    
            }
            else {
                $stmt->closeCursor();
                $sql="UPDATE igrac set ime=:ime WHERE id=:id";
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(":ime",$ime);
                $stmt->bindParam(":id",$id);
                $id=$_SESSION['id'];
                if($stmt->execute()){
                    
                    
                    $_SESSION['ime']=$ime;
                    
                    $dbh->commit();
                    header("location: /mini-igre/izmenaNaloga.php?error=imeUspesno");
                    exit();
                }
            }

        }
        catch(PDOException $e){
            $dbh->rollBack();
            echo $e->getMessage();
        }
      
    }
    else if ($_POST['action'] == 'promeniSifru'){
        include "dbh.php";
        try{
            $dbh->beginTransaction();

            $sifra=$_POST['staraSifra'];
            $novaSifra=$_POST['sifra'];

            
            $sql="SELECT sifra FROM igrac WHERE ime=:ime";
            
            $stmt=$dbh->prepare($sql);
            $stmt->bindparam(":ime",$ime);
            $ime=$_SESSION['ime'];
            $stmt->execute();
            $sif=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if($sifra!==$sif[0]['sifra']){
                header("location: /mini-igre/izmenaNaloga.php?error=PogresnaSifra");
                $stmt=null;
                exit();
            }
            else {
                $stmt->closeCursor();
                $sql="UPDATE igrac SET sifra=:sifra WHERE ime=:ime";
                $stmt=$dbh->prepare($sql);
                $stmt->bindParam(":sifra",$novaSifra);
                $stmt->bindParam(":ime",$ime);
                $stmt->execute();
                $dbh->commit();
                header("location: /mini-igre/izmenaNaloga.php?error=UspesnoPromenjenaSifra");
                exit();
            }

        }
        catch(PDOException $e){
            $dbh->rollBack();
            echo $e->getMessage();
            $dbh=null;
            
        }   
    }
    
    
    


