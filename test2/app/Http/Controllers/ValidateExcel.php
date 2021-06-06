<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Importer;
use Cyberduck\LaravelExcel\Contract\ParserInterface;
use App\Http\Controllers\ParseExcel;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Validator\Validatorexcel;
use Validator\Validatorexcel\Govalidate;

class ValidateExcel extends Controller
{
    public function index($request){
       $validator=new Govalidate();
       $path=$request->file;
       $collection = Excel::toArray(new DataImport, $request->file);
       $num=0;
       $column=array();
       $tr=array();
       $result=array();

       foreach($collection[0] as $k=>$row){
           $temp=array();
           $temp["row"]=$num+1;
           $temp["msg"]=array();
           foreach($row as $index=>$data){
               if($num==0 && $data != "") {
                    // echo $data."<br>";
                    array_push($column,$data);
                } else {
                    if($index < count($column)) {
                    $params=array("column"=>$column[$index],"value"=>$data,"row"=>$num+1);
                    $validate=$validator->ValidatorFile($params);
                    // print_r($validate);
                    if($validate["error"]==1){
                       // echo $validate["error"];
                        // echo "Row ".$validate["row"]." - ".$validate["msg"]."<br>";
                        array_push($temp["msg"],$validate["msg"]);
                    }
                    //echo "Column Name :".$column[$index]." Value :".$data." - ".$validate."<br>";
                    }

                }
           }

           if(count($temp["msg"]) > 0) {
               array_push($result,array("row"=>$temp["row"],"msg"=>implode(",",$temp["msg"])));
            //echo "Row ".$temp["row"]." - ".implode(",",$temp["msg"])."<br>";
           }
           $num++;
       }
       return $result;
    }

    public function validateForm(Request $request){
        $data="";
        if($request->hasFile('file')) {
            $data=$this->index($request);
        }
        return view("validate",["result"=>$data]);
    }




}
