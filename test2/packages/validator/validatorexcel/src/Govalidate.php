<?php

namespace Validator\Validatorexcel;
class Govalidate
{
    public function greet(String $name)
    {
        return 'Hello ' . $name . '! Welcome to Mynotepaper.com';
    }

    public function ValidatorFile($params){
        $cond="";
        $result=array();
        $result["row"]=$params["row"];
        if(substr($params["column"], 0, 1)=="#" ){
            $cond="1";
        } elseif(substr($params["column"],  -1)=="*"){
            $cond="2";
        }
        switch ($cond) {
            case '1':

                if(strpos($params['value'], ' ') !== false) {
                    $result["error"]=1;
                    $result["msg"]=$params['column']." should not contain any space";
                    // $result=$params['column']." should not contain any space";
                } else {
                    $result["error"]=0;
                    $result["msg"]="";
                }
                break;
            case '2' :
                if(empty($params['value'])) {
                    $result["error"]=1;
                    $result["msg"]="Missing Value in Field ".$params['column'];
                    // $result="Missing Value in Field ".$params['column'];
                } else {
                    $result["error"]=0;
                    $result["msg"]="";
                }
                break;
            default:
                    $result["error"]=0;
                    $result["msg"]="";

                break;
        }
        return $result;
        // if(substr($params["column"], -1)=="*")
    }
}
