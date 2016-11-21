<?php

	/**
	 * 获取IP
	 * @return [type] [description]
	 */
	function getIP(){
	    static $realip;
	    if (isset($_SERVER)){
	        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
	            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
	            $realip = $_SERVER["HTTP_CLIENT_IP"];
	        } else {
	            $realip = $_SERVER["REMOTE_ADDR"];
	        }
	    } else {
	        if (getenv("HTTP_X_FORWARDED_FOR")){
	            $realip = getenv("HTTP_X_FORWARDED_FOR");
	        } else if (getenv("HTTP_CLIENT_IP")) {
	            $realip = getenv("HTTP_CLIENT_IP");
	        } else {
	            $realip = getenv("REMOTE_ADDR");
	        }
	    }
	    return $realip;
	}


	function checkPms($id,$num){		//通过id判断权限
		$User = M('user');
		$limit = 'id=' . "\"" . $id . "\"" ;
		$permissions = $User->where($limit)->getField('permissions');
		if(strstr($permissions,$num))
			return 1 ;
	}

	function handlePms($list,$num){		//简单判断权限
		if(strstr($list,$num))
			return 1 ;
	}

	function map($name,$starttime,$endtime,$type){			//按照日期统计各项留言
		$map[$name] = array(array('gt',$starttime),array('lt',$endtime));
		if($type != null){
			$map['type'] = $type ;
		}

		return $map;
	}





    function createExcel($data,$filename='simple.xls',$count){
    	ini_set('max_execution_time', '0');
	    Vendor('PHPExcel.PHPExcel');
	    $filename=str_replace('.xls', '', $filename).'.xls';
	    $phpexcel = new PHPExcel();
	    $phpexcel->getProperties()
		         ->setCreator("Maarten Balliauw")
		         ->setLastModifiedBy("Maarten Balliauw")
		         ->setTitle("Office 2007 XLSX Test Document")
		         ->setSubject("Office 2007 XLSX Test Document")
		         ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
		         ->setKeywords("office 2007 openxml php")
		         ->setCategory("Test result file");

		$phpexcel->setActiveSheetIndex(0)
				 ->setCellValue('A1', '编号')
            	 ->setCellValue('B1', '姓名')
            	 ->setCellValue('C1', '性别')
				 ->setCellValue('D1', '昵称')
            	 ->setCellValue('E1', '类型')
            	 ->setCellValue('F1', '班级')
				 ->setCellValue('G1', '电话')
            	 ->setCellValue('H1', '留言内容')
            	 ->setCellValue('I1', '时间')
            	 ->setCellValue('J1', '审核情况');
        $num = 1;
        for($i=0;$i<$count;$i++){
        	if($data[$i]['sex'] == '1')
        		$data[$i]['sex'] = '男' ;
        	else if($data[$i]['sex'] == '0')
        		$data[$i]['sex'] = '女' ;


        	if($data[$i]['type'] == '0')
        		$data[$i]['type'] = '学生';
        	else if($data[$i]['type'] == '1')
        		$data[$i]['type'] = '教师';
        	else if($data[$i]['type'] == '2')
        		$data[$i]['type'] = '校友' ;

        	if($data[$i]['locked'] == '0')
        		$data[$i]['locked'] = '已审核' ;
        	else if($data[$i]['locked'] == '1')
        		$data[$i]['locked'] = '未审核' ;


        	$data[$i]['time'] = date('Y-m-d H:i:s',$data[$i]['time']);
       		$num+=1;
            $phpexcel->setActiveSheetIndex(0)
				 	 ->setCellValue('A'.$num,$data[$i]['id'])
				 	 ->setCellValue('B'.$num,$data[$i]['name'])
				 	 ->setCellValue('C'.$num,$data[$i]['sex'])
				 	 ->setCellValue('D'.$num,$data[$i]['nickname'])
				 	 ->setCellValue('E'.$num,$data[$i]['type'])
				 	 ->setCellValue('F'.$num,$data[$i]['class'])
				 	 ->setCellValue('G'.$num,$data[$i]['tel'])
				 	 ->setCellValue('H'.$num,$data[$i]['msg'])
				 	 ->setCellValue('I'.$num,$data[$i]['time'])
				 	 ->setCellValue('J'.$num,$data[$i]['locked']);
        }
	    // $phpexcel->getActiveSheet()->fromArray($data);
	    $phpexcel->getActiveSheet()->setTitle('Sheet1');
	    $phpexcel->setActiveSheetIndex(0);
	    header('Content-Type: application/vnd.ms-excel');
	    header("Content-Disposition: attachment;filename=$filename");
	    header('Cache-Control: max-age=0');
	    header('Cache-Control: max-age=1');
	    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	    header ('Pragma: public'); // HTTP/1.0
	    $objwriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel5');
	    $objwriter->save('php://output');
	    exit;
    }



    /**
     * 创建标签替换文件
     * @return [type] [description]
     */
    function creatList(){
    	for($i=1;$i<76;$i++){
    		$phiz['em_'.$i] = $i ;
    	}
    	F('phiz', $phiz, './Data/');
    }


    
?>