<?php
include("classes/DataBase.class.php");

?>
<!--<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">-->
<script src="js/vendor/jquery.min.js"></script>
<!--<script type="text/javascript" src="js/raphael-min.js"></script>
<script type="text/javascript" src="js/morris-0.5.1.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.5.1.min.js"></script>
-->
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
        CanvasJS.addColorSet("Shades",
                [//colorSet Array

                "#C0C0C0",
                "#0000FF",//BIRU
                "#800080",//PURPLE
                "#FF0000",//MERAH
                "#008000"//HIJAU                
                ]);	
				
        CanvasJS.addColorSet("Shades2",
                [//colorSet Array

                "#0000FF",//BIRU
                "#800080",//PURPLE
                "#FF0000",//MERAH
                "#008000"//HIJAU                
                ]);	
}
				
	$(document).ready(function(e) {
		
		$.ajax({type :'POST',url : 'gateway.php?action=getStatBanci',dataType : 'json',
						data: { }
						,success : function(data){
						
						console.log(data);
						
						var chart = new CanvasJS.Chart("chartContainer", 
						{
							colorSet: "Shades2",
							//theme: "theme2",//theme1
							axisX: {
								labelMaxWidth: 200,
								labelWrap: true,   // change it to false
								//interval: 1
								},
							title:{text: "JUMLAH KESELURUHAN BANCIAN" },
							data: [
								{ 	type: "column",
									//showInLegend: true,
									//indexLabelMaxWidth: 5,
									//indexLabelWrap: true,  // change to true
									//indexLabel: "{label}",
									//labelAutoFit: true,
									indexLabel: "{y}",
        							indexLabelPlacement: "outside",  
       								indexLabelOrientation: "horizontal",									
									dataPoints:data
								}
							]
						});
						chart.render();
				}
						,error : function(XMLHttpRequest, textStatus, errorThrown) {
							console.log(XMLHttpRequest+" "+textStatus+" "+errorThrown);
						}
    	});
		
		
		
		
    });
	
	
</script>
<div class="container-fluid" style="padding-bottom:80px;padding-top:80px;">
<!--	<div class="row">
    	<div class="col-md-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;&nbsp;UNTUK PERHATIAN DAN TINDAKAN</h3>
              </div>
              <div class="panel-body">
               	<div class="container-fluid">
                	<div class="row">
                    	<div class="col-md-12">
                            <?php
								
/*								$db = DataBase::getInstance();
								if(is_object($db)){
									$urlstckout = $_SERVER['PHP_SELF']."?pg=stokout&sid=".$_SESSION['SESSID']; 
									$selRec = "SELECT approvestatus FROM ".TBL_ORDER." WHERE approvestatus='0'";
									$row = $db->executeGrab($selRec);
									if(is_array($row)){
										if($db->getNumRow()>0){
											$urlinvt = $_SERVER['PHP_SELF']."?pg=stokin&sid=".$_SESSION['SESSID']; 
											echo "Terdapat <span class='badge'>".$db->getNumRow()."</span> tempahan pesanan zon yang belum di luluskan.<a href='".$urlstckout."'>&nbsp;Sila klik di sini.</a>";
										}
									}
								}
*/							
							?>
                        	
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                        	<?php
								
/*								$db = DataBase::getInstance();
								if(is_object($db)){
									$selRec = "SELECT endorsestatus FROM ".TBL_INVENTORY." WHERE endorsestatus='0'";
									$row = $db->executeGrab($selRec);
									if(is_array($row)){
										if($db->getNumRow()>0){
											$urlinvt = $_SERVER['PHP_SELF']."?pg=stokin&sid=".$_SESSION['SESSID']; 
											//echo "<br/><br/><br/><br/>".$_SERVER['PHP_SELF'];
											echo "Terdapat <span class='badge'>".$db->getNumRow()."</span> pesanan stok bekalan pejabat yang masih belum disahkan.<a href='".$urlinvt."'>&nbsp;Sila klik di sini.</a>";
										}else if(count($row)==0){
											echo "<span class='label label-danger'>------ Tiada tempahan pesanan yang dibuat!! ------- </span>";
										}
									}
								}
*/							
							?>
                        	
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>-->
	<div id="graphdiv" class="row">
    	<div class="col-md-12">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;JUMLAH KESELURUHAN  SETAKAT HARI INI &nbsp;<span class="label label-danger"><?php echo date("d/m/Y"); ?></span></h3>
              </div>
              <div class="panel-body">
                 	<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainer" style="height: 400px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenKepong" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenBatu" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenSegambut" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenTT" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenBB" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenLP" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenSeputeh" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenC" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenBTR" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenSetia" style="height: 350px;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            	<div id="chartContainerParlimenWM" style="height: 350px;"></div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
    
   
</div>