$table=".nova-pagging";
$colum="nova-search";


$pag_top="";
$pag_top +='<div class="form-group">';
$pag_top +='<div class="input-group">';
$pag_top +='<div class="input-group-addon" style="padding: 0px;">';
$pag_top +='<select onchange="paging(1)" class="nova-perpage" style="background: none;border: none;outline: none;width: 60px;">';
$pag_top +='<option value="10">10</option>';
$pag_top +='<option value="25">25</option>';
$pag_top +='<option value="50">50</option>';
$pag_top +='<option value="all">All</option>';
$pag_top +='</select>';
$pag_top +='</div>';
$pag_top +='<input type="text" onkeyup="nsearch(this.value)" id="nova-gsearch" class="form-control" style="margin:0;height: 40px !important;" placeholder="Search Here ,"/>';
$pag_top +='</div>';
$pag_top +='</div>';


$totrow=0;
$perpage="";
$base="";
$pstart=0;
$pend=0;
$ptab=0;
function paging(base)
{
    
    if($("table").hasClass("nova-pagging"))
    {
            
        if(!$("select").hasClass("nova-perpage"))
        {
            $($table).before($pag_top);
            $($table).after("<div class='nova-tab'></div>");
        }
        if($totrow==0)
        {
            $totrow=$($table+" tbody tr").length;
        }
        //alert($totrow);
        $base=base;
        $perpage=$(".nova-perpage").val();
        if($perpage=="all")
        {
            $perpage=$totrow;
        }
        $pstart=($base*$perpage)-$perpage;
        
        $pend=($base*$perpage);
        
        if($pend>$totrow)
        {
            $pend=$totrow;
        }
        $ptab=Math.ceil($totrow/$perpage);
        
        //alert($totrow+" "+$base+" "+$perpage+" "+$pstart+" "+$pend);
        $hh="";
        
        $sc=0;
        $sy=0;
        $($table+" tbody tr").each(function(){
            $display=$(this).css("display");
         
            if($(this).hasClass("syes"))
            {
              
                if($sy<$pend && $sy>=$pstart)
                {
                    $(this).show();
                }
                else
                {
                    $(this).hide();
                }
                $sy++;
            }
            else
            {
               
                //if($(this).index()<$pend && $(this).index()>=$pstart)
                
                if($sc<$pend && $sc>=$pstart)
                {
                    
                    if($(this).hasClass("sno"))
                    {
                        $(this).hide();
                    }
                    else if($(this).hasClass("syes") ||  $display=="none")
                    {
                        $(this).show();
                    //   $hh=$display+$(this).index();
                    }
                   
                }
                else
                {
//                    alert($sc+" "+$pend+" "+$sc+" "+$pstart);
                    $(this).hide();
                }

            }
            
            $sc++;
          
        });
        //alert($hh);
        $pbottom="";
        $pbottom+="<ul >";
       
        $loops=$base-2;
        $loope=$base+2;
       
        if($ptab>5)
        {
       
            if($loops<=0)
            {
                $loops=1;
                $loope=5;
            }
            if($loope>$ptab)
            {
                $loope=$ptab;
                $loops=$loope-4;
            }
        }
        else
        {
            $loops=1;
            $loope=$ptab;
        }
       
       
       
        if($base==1)
        {
            $pbottom+="<li><<</li>";
        }
        else
        {
            $pbottom+="<li onclick='paging("+($base-1)+")'><<</li>";
        }
        
        for($i=$loops;$i<=$loope;$i++)
        {
            if($base==$i)
            {
                $pbottom+="<li class='active'>"+$i+"</li>";
            }
            else
            {
                $pbottom+="<li onclick='paging("+$i+")'>"+$i+"</li>";
            }
        }
           
        if($base==$ptab)
        {
            $pbottom+="<li>>></li>";
        }
        else
        {
            $pbottom+="<li onclick='paging("+($base+1)+")' >>></li>";
        }
        $pbottom+="</ul>";
        $pbottom+="<center style='text-align:right;font-size:11px;margin:15px;'>"+($pstart+1)+" to "+$pend+" from "+$totrow+" Records.</center>"; 
        $(".nova-tab").html($pbottom);
        
        
        
            
    }  
}
$vals="";
function nsearch(vals)
{
    $vals=vals.toLowerCase();
    //alert($vals);
   
    $col=new Array();
  
    $($table+" thead tr:first-child th").each(function()
    {
        //    alert();
        $col[$(this).index()]=$(this).attr("nova-search");
    //alert($col[$(this).index()]);
    });
    $totrow=0;
    $new=0;
    
    $mytable=$($table+" tbody");
    
    $mytable.find("tr").each(function(index,row){
        var allcell=$(row).find("td");
      
      
      if(allcell.length>0)
        {
            var found=false;
            allcell.each(function(index,td){
             if($col[index]=="yes")
                 {
                var regexp=new RegExp(vals,'i');
                
                if(regexp.test($(td).text()))
                {
                    $orival=$(td).text();
                     $orival=$orival.replace($vals,"<font color='#FF6200'>"+$vals+"</font>");
                    $(td).html($orival);
                    
                    found=true;
                    return false;
                }
                else
                    {
                        //$(td).remove("font");
                    }
                 }
                 
            });
            if(found==true)
            {
                
                
                $(row).show();
                if($(row).hasClass("sno"))
                {
                    $(row).addClass("syes");
                    $(row).removeClass("sno");
                }
                else
                {
                      
                    $(row).addClass("syes");
                        
                }
                $totrow++;
            }
            else
            {
                if($(row).hasClass("syes"))
                {
                    $(row).removeClass("syes");
                    $(row).addClass("sno");
                }
                else
                {
                    $(row).addClass("sno");
                }
                     
                $(row).hide();
            }
                
        }
    });
    
    paging(1);    
}