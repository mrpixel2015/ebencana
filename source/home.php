<?php
include("classes/DataBase.class.php");
$page = empty($_GET['pg'])?'':$_GET['pg'];
?>
<script src="js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript" src="/assets/script/canvasjs.min.js"></script>
<style type="text/css">
	
	 #map-container { 
	 	height: 500px 
	}

</style>
<!--<script type="text/javascript" src="js/pager.js"></script>-->

<script type="text/javascript">

	var arrayloc = Array();
	var objarr;
	var map;
    var marker;
	var markers = Array();
	var CircleRad = Array();
	var cityCircle ;

	$(document).ready(function(e) {

	kesnegeri('Wilayah Persekutuan Kuala Lumpur');
	$("#selectnegeri").change(function(e) {
		var negeri=$("#selectnegeri #negeri").val();
		kesnegeri(negeri);
    });

	kesbyTahun('2015');
	$("#selecttahun").click(function(e) {
		var tahun=$("#selecttahun #tahun").val();
		kesbyTahun(tahun);
    });
	kesBil();
	
    function init() {
        var myLatlng = new google.maps.LatLng(3.129026,101.712810);
        var myOptions = {
            zoom: 10,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        map = new google.maps.Map(document.getElementById('map-container'), myOptions);
    }
	
	// Sets the map on all markers in the array.
	function setMapOnAll(map) {
	  for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	  }
	  for (var t = 0; t < CircleRad.length; t++) {
		CircleRad[t].setMap(map);
	  }
	}
	
	// Removes the markers from the map, but keeps them in the array.
	function clearMarkers() {
	  setMapOnAll(null);
	}
	
	// Shows any markers currently in the array.
	function showMarkers() {
	  setMapOnAll(map);
	}
	
	// Deletes all markers in the array by removing references to them.
	function deleteMarkers() {
	  clearMarkers();
	  markers = new Array();
	  CircleRad = new Array();
	}	

	$("#submitval").change(function(e) {
		
		deleteMarkers();
		
		arrayloc = new Array();
		
		var negeri=$("#submitval #negeri").val();
		
		aduandengue(negeri);
		//alert(negeri);
		//var lat = parseFloat(document.getElementById('markerLat').value);
		//var lng = parseFloat(document.getElementById('markerLng').value);

		});
	
    // Onload handler to fire off the app.
    google.maps.event.addDomListener(window, 'load', init);
	
	//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ 
	 

	});
	
	function aduandengue(lokasi){
		var dataString = "lokasi="+lokasi; 
		$.ajax({type :'POST',url : 'gateway.php?action=carilokasi',dataType : 'json',data:dataString
			,success : function(data){
				$("#myTable tr").remove();
				$("#myPager li").remove();

				$.each( data, function(i,val){
					var no = i+1;
								
					if(val['KAT_BANCIAN'] != null){
						$("<tr><td>"+no+"</td><td>"+val['FFNAME']+"</td><td>"+val['TARIKH']+"</td></tr>").appendTo("table #myTable");
					}else{
						$("<tr><td>"+no+"</td><td>"+val['FFNAME']+"</td><td>"+val['TARIKH']+"</td></tr>").appendTo("table #myTable");
					}
						objarr = {location:val['LOKASI'],latitude:parseFloat(val['LAT']),longitude:parseFloat(val['LONG']),jenisAduan:val['JENIS'],jenisPremis:val['JENISPREMIS'],tarikhAduan:val['TARIKH'],catatan:val['CATATAN'],imej:val['IMEJ']};
						var arrayloc2 = $.map(objarr,function(value,index){
							return[value];
						});								
					arrayloc.push(arrayloc2);
					});
					console.log(arrayloc);
					
					callmarker();
					
					
					
			},error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest+" "+textStatus+" "+errorThrown);
			}
		});	
	}
	function callmarker(){
		var lat = 3.129026;
		var lng = 101.712810;
		//var lat = arrayloc[0][1];
		//var lng = arrayloc[0][2];
		var newLatLng = new google.maps.LatLng(lat, lng);
	
			 var infowindow = new google.maps.InfoWindow();
		
			 var i, image;
			 
			 var contentString;
			 
			//@@@@@@@   Tukar Marker dan Set Radius Bagi Kat Hotspot  @@@@@@@
			 for (i = 0; i < arrayloc.length; i++) { 
			 
			 if(arrayloc[i][3]=="Baru"){
				image = 'img/marker7.png';
			 }else if(arrayloc[i][3]=="Kes"){
				image = 'img/marker8.png';
			 }else if(arrayloc[i][3]=="Fogging"){
				image = 'img/marker2.png';
			 }else if(arrayloc[i][3]=="Wabak"){
				image = 'img/marker3.png';
			 }else if(arrayloc[i][3]=="Hotspot"){
				image = 'img/marker4s.png';
			 	cityCircle = new google.maps.Circle({
			  	strokeColor: '#FF0000',
			  	strokeOpacity: 0.8,
			  	strokeWeight: 2,
			  	fillColor: '#FF0000',
			  	fillOpacity: 0.35,
			  	map: map,
			  	center: {lat: arrayloc[i][1], lng: arrayloc[i][2]},
			  	radius: 200
				});
				CircleRad.push(cityCircle);
			 }
			//@@@@@@@   Tukar Marker dan Set Radius Bagi Kat Hotspot  @@@@@@@
	 
			  marker = new google.maps.Marker({
				animation: google.maps.Animation.DROP,  
				position: new google.maps.LatLng(arrayloc[i][1], arrayloc[i][2]),
				map: map,
				icon : image
			  });
			  markers.push(marker);
					
			  google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					contentString = "<div><div style='float:left;'>" +
                    				"<span style='font-size:18px;font-weight:bold;'>"+ arrayloc[i][3] +"</span><hr>" + arrayloc[i][4]+ "<br />" +
									"<br />"+arrayloc[i][5] + 
									"<br />"+arrayloc[i][6] + 
                    				"</div><div style='float:right; padding:5px;'><img src='imgupload/"+arrayloc[i][7]+"'/>" +
                    				"</img></div></div>";
				  	infowindow.setContent(contentString);
				  	infowindow.open(map, marker);
				}
			  })(marker, i));
			}	
	}
			//@@@@@@@   Pie Chart Aduan Denggi mengikut Negeri  @@@@@@@
	function kesnegeri(negeri)	{
		$.ajax({type :'POST',url : 'gateway.php?action=getAduanNegeri',dataType : 'json',
		data: { negeri:negeri }
		,success : function(data){
			console.log(data);
			var chart = new CanvasJS.Chart("chartContainer2", 
			{
				animationEnabled: true,
				//theme: "theme2",//theme1
				dataPointMaxWidth: 100,
				animationEnabled: true,
				axisY: {
					labelAutoFit: true,
					maximum: 20000,
					minimum:0,
					interval:2000
				},
				axisX: {
					labelMaxWidth: 200,
					labelWrap: true,   // change it to false
				},
				title:{text: "JUMLAH ADUAN DENGGI MENGIKUT KATEGORI",fontSize: 12 },
				data: [
				{ 	type: "pie",
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
	}
	
	function kesbyTahun(pilihtahun){		
		$.ajax({type :'POST',url : 'gateway.php?action=getStatBanci',dataType : 'json',
		data: {idtahun:pilihtahun }
		,success : function(data){
		console.log(data);
		var chart = new CanvasJS.Chart("chartContainer", 
		{
		colorSet: "Shades2",
		animationEnabled: true,
		animationDuration: 20000,
		height:300,
		dataPointMaxWidth: 40,
		//theme: "theme2",//theme1
		axisX: {
		labelFontSize: 13,
		labelAutoFit: true,
		labelMaxWidth: 70,
		labelWrap: true, },  // change it to false
		
		axisY:{labelFontSize: 13,
		labelAutoFit: true,
		maximum: 10000,
		minimum:0,
		interval:1000
		},
		title:{text: "JUMLAH KES DENGGI DI NEGERI-NEGERI MENGIKUT TAHUN",fontSize: 12 },
		data: [
		{ 	type: "column",
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
	}
	
	function kesBil(){		
		$.ajax({type :'POST',url : 'gateway.php?action=getStatKes',dataType : 'json',
		data: {}
		,success : function(data){
		console.log(data);
		var chart = new CanvasJS.Chart("chartContainer1", 
		{
		colorSet: "Shades2",
		animationEnabled: true,
		animationDuration: 20000,
		height:350,
		dataPointMaxWidth: 40,
		//theme: "theme2",//theme1
		axisX: {
		labelFontSize: 13,
		labelAutoFit: true,
		labelMaxWidth: 70,
		labelWrap: true, },  // change it to false
		
		axisY:{labelFontSize: 13,
		labelAutoFit: true,
		//maximum: 10000,
		minimum:0,
		//interval:1000
		},
		title:{text: "JUMLAH KES YANG DILAPORKAN",fontSize: 12 },
		data: [
		{ 	type: "column",
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
	}
</script>

<div class="row" style="padding-top:5px;">

<div class="panel panel-success">
<div class="panel-heading">
	<h3 class="panel-title">Hotspot Aduan</h3>
</div>
<div class="panel-body">
<div class="row"  >
<img src="img/marker7.png"/><a>Baru </a> <img src="img/marker8.png"/><a>Kes </a><img src="img/marker3.png"/><a>Wabak</a><img src="img/marker4.png" height="50px" width="50px"/><a>Hotspot </a><img src="img/marker2.png"/><a>Fogging </a>

</div>	
<!--ruang paparan maps -->
	<div id="map-container" class="col-md-8">	

    </div>
<!--ruang paparan maps -->

    <div class="col-md-4">
    		
          <div class="table-responsive">

          <div id="submitval">
          	<?php
            $db = DataBase::getInstance();
            
            $sql = "SELECT DISTINCT Negeri FROM ".TBL_ADUAN;
            
            $row = $db->executeGrab($sql);
            if(is_array($row)){
                $len = count($row);
                echo "<select name='negeri' id='negeri' class='form-control input-sm'>\n";
                echo "<option value='Tiada Pilihan Negeri' selected='selected'>-- Sila pilih --</option>\n";
                for($i=0;$i<$len;$i++){
                    echo "<option value='".$row[$i][0]."'>".$row[$i][0]."</option>\n";	
                }
            }
            echo "</select>\n"; 
			
			?>
          </div>
            <div style="height:470px;text-align: center; overflow:scroll">
			<table class="table table-striped" style="background-color:#fff;" id="tblstok">
            	<thead>
            		<tr>
            			<th>BIL</th>
            			<th>NAMA</th>
            			<th>TARIKH & MASA ADUAN</th>
            		</tr>
            	</thead>
            	<tbody id="myTable">
           		</tbody>
           </table>
           </div>
           <!--<div id="loading" style="display:none" >
           	<span style="text-align:center;"><img src="images/loding.gif"/>&nbsp;&nbsp;&nbsp;Loading content.....</span>
           </div>-->
		   </div>
    </div>
    	
	<div class="row">
    	<div  align="center" class="col-md-4">
        <div id="selectnegeri">
            <div style="width:auto">		
            <?php
            $db = DataBase::getInstance();
            $sql = "SELECT DISTINCT Negeri FROM ".TBL_JENISADUAN;
                                            
            $row = $db->executeGrab($sql);
            if(is_array($row)){
 	           $len = count($row);
 	           echo "<select name='negeri' id='negeri' class='form-control input-sm'>\n";
	            echo "<option value='Tiada Pilihan Negeri' selected='selected'>-- Sila pilih --</option>\n";
            for($i=0;$i<$len;$i++){
 	           echo "<option value='".$row[$i][0]."'>".$row[$i][0]."</option>\n";	
            }
            }
            echo "</select>\n"; 
            ?>
            </div>		
        </div>
        <div   align="center" class="col-md-12">
        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
        </div>
    	</div>
        
    <div align="center" class="col-md-4">
        <div id="selecttahun">
        <div style="width:auto">
			<?php
            $db = DataBase::getInstance();
            $sql = "SELECT DISTINCT Tahun FROM ".TBL_TAHUN;
            
            $row = $db->executeGrab($sql);
            if(is_array($row)){
				$len = count($row);
	           echo "<select name='tahun' id='tahun' class='form-control input-sm'>\n";
 	           for($i=0;$i<$len;$i++){
 	           echo "<option value='".$row[$i][0]."'>".$row[$i][0]."</option>\n";	
 	           }
            }
            echo "</select>\n"; 
            ?>
        </div>	
        </div>
        <div   align="center" class="col-md-12">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
        </div>        
 
 
 	<div align="center" class="col-md-4">
        <div   align="center" class="col-md-12">
        <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
        </div>
        </div>               
            </div>
        </div>
        </div>
    </div>
<!--<script type="text/javascript" src="js/pager.js"></script>-->
