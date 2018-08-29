<?php
/*Стандартные параметры*/
$dir='/';
$recursive=true;
$file='';
$filelist='';
$file_permission=0644;
$folder_permission=0755;
$requestpost=false;
$outputmode=1;
$work=0;
$absolutepath=true;

if(isset($_GET['requestpost'])){
	$requestpost=boolval($_GET['requestpost']);
}elseif(isset($_POST['requestpost'])){
	$requestpost=boolval($_POST['requestpost'];
}

if(!$requestpost){
	$request=$_GET;
}else{
	$request=$_POST;
}
if(isset($request['dir'])){$dir=$request['dir'];}
if(isset($request['recursive'])){$recursive=boolval($request['recursive']);}
if(isset($request['file'])){$file=$request['file'];}
if(isset($request['filelist'])){$filelist=$request['filelist'];}
if(isset($request['file_permission'])){$file_permission=intval($request['file_permission'],8);}
if(isset($request['folder_permission'])){$folder_permission=intval($request['folder_permission'],8);}
if(isset($request['output'])){$output=intval($request['output']);}
if(isset($request['work'])){$work=intval($request['work']);}
if(isset($request['absolutepath'])){$absolutepath=boolval($request['absolutepath']);}
$output=array();
$output['files']=array();
function make_error($param1,$param2,$error_type){
	global $output;
	switch($error_type){
		case 0:
			$st= 'Данный файл является папкой';
			break;
		case 1:
			$st='Не удалось поменять права для файла';
			break;
		default:
			break;
	}
}
$doc_root=dirname(__FILE__);

switch($work){
	case 1:
		if(!$absolutepath){
			$full=$doc_root.'/'.$file;
			if(!is_dir($full)){
				if(chmod($full,$file_permission)){
					$res_file=array();
					$res_file['path']=$full;
					$res_file['perm']=$file_permission;
					$output['files'][]=$res_file;
				}else{
					make_error($file,$file_permission,
			}else{
				make_error(
		break;
	case 2:
		break;
	default:
		break;

}
