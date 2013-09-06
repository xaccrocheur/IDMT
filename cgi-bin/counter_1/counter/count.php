<?php 
$maincounter="counter.val";
$counters=array("counter.val");
$total=0;
$countval=0;
function readcounter($fname)
{
   $count="";
   $storeday="";
   $line=array();
   if(file_exists($fname))
   {
      $line=file($fname);
   }
   $storeday=trim($line[0]);
   $count=trim($line[1]);

   return array($storeday,intval($count));
}

function makestats()
{
   $days=array();
   $counts=array();
   $i=0;
   global $counters;
   for($i=0;$i<count($counters);$i++)
   {
      $_I1=readcounter($counters[$i]);
      $days[$i]=reset($_I1);
      $counts[$i]=next($_I1);
   }
   $st=0;
   $error=($st=@fopen("stats.dat","a"));
   flock($st,6);
   fwrite($st,$days[0]);
   global $counters;
   for($i=0;$i<count($counters);$i++)
   {
      fwrite($st,",".$counts[$i]);
   }
   fwrite($st,"\n");
   flock($st,7);
   fclose($st);
   return;
}

function update($fname,$statflag=false)
{
   $changed=false;
   $precount=1;
   global $countval;
   $countval=1;
   global $total;
   $total=1;

   $bestval=0;
   $bestday=date("d-m-Y");
   $today=date("d-M-Y");
   $storeday="";
   $filein=0;
   if(file_exists($fname))
   {
      $line=array();
      $line=file($fname);
      $storeday=trim($line[0]);
      $countval=intVal(intval(trim($line[1])));
      $total=intVal(intval(trim($line[2])));
      $bestday=trim($line[3]);
      $bestval=intVal(intval(trim($line[4])));
      $countval+=1;
      $total+=1;

      if($countval>=$bestval)
      {
         $bestday=$today;
         $bestval=$countval;
      }
      if($today!=$storeday)
      {
         global $maincounter;
         if(($fname===$maincounter)||$statflag)
         {
            makeStats();
            $countval=1;
            $storeday=$today;
         }
         else
         {
            $mainday="";
            $maindata=array();
            $maindata=file($maincounter);
            $mainday=trim($maindata[0]);

            if($today===$mainday)
            {
               $countval=1;
               $storeday=$today;
            }
         }
      }
   }
   $fp=0;
   $error=($fp=@fopen($fname,"w"));
   flock($fp,6);
   fwrite($fp,"$storeday\n");
   fwrite($fp,"$countval\n");
   fwrite($fp,"$total\n");
   fwrite($fp,"$bestday\n");
   fwrite($fp,"$bestval\n");
   flock($fp,7);
   fclose($fp);
   return;
}

function digit($num)
{
   global $total;
   return substr("0000000000".strval($total),-$num,1);
}

function dday($num)
{
   global $countval;
   return substr("0000".strval($countval),-$num,1);
}

 ?>

