<?php 
require("Evento.php");

$accion = isset($_POST['accion'])? $_POST['accion']:null;
//Cargar Eventos 
    $events=array();
    $data=Evento::__find();
    foreach($data as $row){
            $id= $row['id'];
            $title= $row['evento'];
            $start= $row['fecha_inicio'];
            $end= $row['fecha_fin'];
            $color=$row['color_evento'];

                    $events[]=array('id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'color'=>$color,'allDaySlot'=> false);
                    };

                if ($events=json_encode($events,JSON_UNESCAPED_UNICODE)){
                             echo $events; 
                        }else{
                            echo "msg:error"; 
                           
                        }  






 ?>



	
