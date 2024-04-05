<?php
    session_start();
    require 'config.php';

    //Input field validation
    function validate($inputData){
        global $conn;
        $validatedData =mysqli_real_escape_string($conn,$inputData);
        return trim($inputData);
    }

    //redirect form 1 page to another page with message
    function redirct($url,$status){
        $_SESSION['status']=$status;
        header('Location: '.$url);
        exit(0);
    }

    //Display Message or status after any process

    function alertMessage(){
        if(isset($_SESSION['status'])){
             
             echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$_SESSION['status'].'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['ststus']);
        }
    }

    // Insert Data

    function insert($tableName,$data){
        global $conn;
        $table=validate($tableName);

        $columns=array_keys($data);
        $values=array_values($data);

        $finalColumn=implode(',',$columns);
        $finalValues="'".implode("', '",$values)."'";

        $query="INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
        $result=mysqli_query($conn,$query);
        return $result;
    }

    //Update Data

    function update($tableName,$id,$data){
        global $conn;
        $table=validate($tableName);
        $id=validate($id);

        $updateDataString="";

        foreach($data as $column =>$value){
            $updateDataString .= $column.'='."'$value',";

        }
        $finalUpdateData = substr(trim($updateDataString),0,-1);

        $query="UPDATE $table SET $finalUpdateData WHERE id='$id'";
        $result=mysqli_query($conn,$query);
        return $result;

    }

    function getAll($tableName,$status=NULL){

        global $conn;

        $table = validate($tableName);
        $status =validate($status);

        if($status=='status')
        {
            $query="SELECT * FROM $table WHERE status='0'";

        }
        else
        {
            $query="SELECT * FROM $table ";
        }
        return mysqli_query($conn,$query);
    }

    function getById($tableName,$id){

        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query="SELECT * FROM $table WHERE id='$id' LIMIT 1";
        $result=mysqli_query($conn,$query);

        if($result){

            if(mysqli_num_rows($result)==1){

                $row=mysqli_fetch_assoc($result);
                $response =[
                    'status'=>200,
                    'data' => $row,
                    'message' => 'Record Found !'
                ];
                return $response;
            }

        }else{
            $response =[
                'status'=>404,
                'message' => 'No Data Found !'
            ];
            return $response;
        }
    }

    //Delete Data

    function delete($tableName,$id){

        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query="DELETE FROM $table WHERE id='$id' LIMIT 1";
        $result=mysqli_query($conn,$query);
        return $result;
    }

    function checkParamId($type)
    {
        if(isset($_GET[$type])){
            if($_GET[$type] != ''){
                return $_GET[$type];
            }
            else{
                return '<h5> no id found <h5>';
            }
        }
        else{
            return '<h5> no id given <h5>';
        }
        

    }

?>