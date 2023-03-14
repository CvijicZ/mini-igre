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
        echo "Stisnuo si promeni sifru";
    }
    
    
    


