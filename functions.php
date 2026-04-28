<?php 
function kendo()
{?>
<link rel="stylesheet" href="kendo/styles/kendo.common.min.css" />
<link rel="stylesheet" href="kendo/styles/kendo.default.min.css" />
<link rel="stylesheet" href="kendo/styles/kendo.silver.min.css" />
<link rel="stylesheet" href="kendostyles/kendo.metro.min.css" />
<link rel="stylesheet" href="kendostyles/kendo.black.min.css" />
<link rel="stylesheet" href="kendostyles/kendo.blueopal.min.css" />
<script type="text/javascript" src="kendo/js/jquery.min.js"></script>
<script type="text/javascript" src="kendo/js/kendo.all.min.js"></script>
<script src="kendo/js/cultures/kendo.culture.en-IN.min.js"></script>
<script type="text/javascript">
   kendo.culture("en-IN");
</script>
<?php }
function autocomplete()
{?>
	<script>
		'use strict';
		
		(function($, kendo) {
		
		   // select the input and create an AutoComplete
		   $("#autocomplete_name").kendoAutoComplete({
			   dataSource: new kendo.data.DataSource({
				   transport: {
					   read: "autofetch/name_fetch.php"
				   },
				   schema: {
					   data: "data"
				   },
			   }),
			   dataTextField: "name"
		   });
		   
		   })(jQuery, kendo);
		   </script>
  <?php
		}
function datepicker()
{?>
   <script>
        $(function(){
            window.prettyPrint && prettyPrint();
            $('#dp1').datepicker({
                format: 'dd-mm-yyyy'
            });
			$('#dp2').datepicker({
                format: 'dd-mm-yyyy'
            });
			$('#dp3').datepicker({
                format: 'dd-mm-yyyy'
            });
			  
           $('#dp6').datepicker
            ({startView : 'month', format : 'mm-yyyy', enableYearToMonth: true, enableMonthToDay : false});
           
            $('#dp7').datepicker();
            $('#dpYears').datepicker();
            $('#dpMonths').datepicker();
           
           
            var startDate = new Date(2012,1,20);
            var endDate = new Date(2012,1,25);
            $('#dp4').datepicker()
                .on('changeDate', function(ev){				
                    if (ev.date.valueOf() > endDate.valueOf()){
                        $('#alert').show().find('strong').text('The start date can not be greater then the end date');
                    } else {
                        $('#alert').hide();
                        startDate = new Date(ev.date);
                        $('#startDate').text($('#dp4').data('date'));
                    }
                    $('#dp4').datepicker('hide');
                });
				
           
           
          
				$('#dp5').datepicker()
                .on('changeDate', function(ev){
                    if (ev.date.valueOf() < startDate.valueOf()){
                        $('#alert').show().find('strong').text('The end date can not be less then the start date');
                    } else {
                        $('#alert').hide();
                        endDate = new Date(ev.date);
                        $('#endDate').text($('#dp5').data('date'));
                    }
                    $('#dp5').datepicker('hide');
                });
        });
    </script>

<?php
}
function css()//function to call all the css files
{?>
    <link href="css/c1.css" rel="stylesheet">
    <link href="css/c2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/datepicker.css" />
    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      color: #5a5a5a;
    }
    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }

    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

    
    </style>
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
function js()//function to include js file
{?>
   <script src="js/q2.js"></script>
	<script src="js/q1.js"></script>
	<script src="js/shortcut.js"></script>
     <script src="datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
    shortcut.add("F4",function()
    {    
        document.getElementById("frm1").submit();
       
    },{
        'type':'keydown',
        'propagate':true,
        'target':document
    });
    </script>
    <script type="text/javascript">
	  function s_all()
		  {		
			 if(document.getElementById("selectall").checked==true)
				{
					document.getElementById("c1").checked=true;
					document.getElementById("c2").checked=true;
					document.getElementById("c3").checked=true;
					document.getElementById("c4").checked=true;
								
				}
				else if(document.getElementById("selectall").checked==false)
				{
					document.getElementById("c1").checked=false;
					document.getElementById("c2").checked=false;
					document.getElementById("c3").checked=false;
					document.getElementById("c4").checked=false;		
				}				
		  }	   
	  function summary()
	  {
		  if(document.getElementById("summ").checked==false)
		  {
			  document.getElementById("det").checked=true;
		  }
	  }
	  function detail()
	  {
		  if(document.getElementById("det").checked==false)
		  {
			  document.getElementById("summ").checked=true;
		  }
	  }
	  </script>
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////
function title()//function to show title
{	
	echo "Fee Management System";
}

/////////////////////////////////////////////////////////////////////////////////////////////
function logo()//function to show title
{
echo "<link rel='shortcut icon' href='img/alok-logo.png'/>";

}
/////////////////////////////////////////////////////////////////////////////////////////////
function header_image()//function to show header logo
{	
	echo "<img src='img/alok-logo.png' style='padding-left:10px; padding-bottom:10px;' />";
}
/////////////////////////////////////////////////////////////////////////////////////////////
function menu()//function to show menu bar
{
?>
<div class="navbar navbar-inverse" style="color:#FFF">
          <div class="navbar-inner">
            
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div  class="nav-collapse collapse">
              <ul class="nav">
			  <li><a href="index.php"><i class="icon-search icon-white"></i></a></li>
			  <li class="dropdown">
			  <a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Registration<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="ffc.php">Form Fee Collection</a></li>
                    <li><a href="reg.php">Form Issue</a></li>
                    <li><a href="srch1.php">Form Return</a></li>
					 <li><a href="admsn_clist.php">Admission List (Class-Wise)</a></li>
					  <li><a href="admsn_dlist.php">Admission List (Date-Wise)</a></li>
					</li>
					</ul>
                
				
				<li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Fee Deposition<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="admsn_fee.php">New Admission Fee</a></li>
                      <li><a href="srch_ann_fee.php" data-toggle="modal">Annual Fee</a></li>
                 <!--   <li><a href="srch_ann_fee.php">Annual Fee</a></li>-->
					<li><a href="srch_mnth_fee.php">Monthly Fee</a></li>
					<li><a href="srch_hstl_fee.php">Hostel Fee</a></li>
                    <li><a href="srch_ctn.php">Caution Deposit</a></li>
					 <li><a href="srch_adhc.php">Adhoc Payment</a></li>
                  </ul>
				  
				  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Record Maintenance<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="stdnt_reg.php">Student Management</a></li>
                    <li><a href="stdnt_invoice_prepared.php">Student Invoice</a></li>
					<li><a href="srch_hstl.php">Vivekanand Hostel</a></li>
					</ul>
				  
				  
				  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Reports<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Collection</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="daily_coll.php">Daily Collections</a></li>
                    		<li><a href="">Reciept Details</a></li>
							 <li><a href="">Cashier Wise Collection</a></li>
                             <li><a href="cheque_details.php">Cheque Details</a></li>
                             <li><a href="">Classwise/Computer Fee Collections</a></li>
                        </ul>
                   </li>
                   <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Due List</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="dl_mf.php">Due List - Monthly Fee</a></li>
                    		<li><a href="dl_gf.php">Due List - General Fee</a></li>
							 <li><a href="dl_cf.php">Due List - Caution Fee</a></li>
                             <li><a href="dl_hf.php">Due List - Hostel Fee</a></li>
                        </ul>
                   </li>
                    <li><a href="f_c_l.php">Fee Component Ledger</a></li>
					 <li><a href="s_l.php">Student Ledger</a></li>
					<!-- <li><a href="h_l.php">Hostel Ledger</a></li>
					 <li><a href="ad.php">Adhoc Fee Ledger</a></li>
					 <li><a href="sfcl.php">Student Fee Component Ledger</a></li>
					 <li><a href="cfr.php">Caution Fee Register</a></li>
					 <li><a href="nsr.php">Non Scholar Register</a></li>
                     <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Concession</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">On Invoice(Amount)</a></li>
                    		<li><a href="">Lumpsum Fee Deposition</a></li>
							 <li><a href="">During Fee Deposition</a></li>
                             <li><a href="">On Invoice Rate</a></li>
                             <li><a href="">Concession(Hosteler)</a></li>
                             <li><a href="">Concession(General)</a></li>
							 <li><a href="">Old Due Concession</a></li>
                             <li><a href="">Hosteler Concession</a></li>
                             <li><a href=""></a></li>
                        </ul>
                   </li>
					 <li><a href="dr.php">Deleted Receipts</a></li>
					 <li><a href="sfd.php">Supplementary Deposits</a></li> -->
					 <li><a href="swp.php">Student Wise Payment</a></li>
                    <!-- <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Invoice Printing</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">Scholar</a></li>
                        </ul>
                   </li>
                     <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Student's List</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">List Of Student PK</a></li>
                    		<li><a href="">New</a></li>
							 <li><a href="">Student List Date Of Birth</a></li>
                             <li><a href="">Student List With Address</a></li>
                             <li><a href="">Student's List</a></li>
                             <li><a href="">Temp</a></li>
                        </ul>
                   </li>
                     <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Hosteler's List</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">Address List</a></li>
                    		<li><a href="">Hostel List 2006</a></li>
							 <li><a href="">Hosteler's List</a></li>
                             <li><a href="">New 2005 Hosteler</a></li>
                             <li><a href="">Student Of X XII</a></li>
							 <li><a href="">Student List</a></li>
                             <li><a href="">Temp</a></li>
                             <li><a href="">Total Up To 13/7/2005</a></li>
                        </ul>
                   </li>
                     <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Student's List</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">All Student(Excluding Left Out)</a></li>
                    		<li><a href="">Bus List</a></li>
							 <li><a href="">Admission List</a></li>
                             <li><a href="">Left Out Student's</a></li>
                        </ul>
                   </li>
					 <li><a href="sr.php">Result</a></li>
					 <li><a href="fs.php">Fee Structure</a></li>
					 <li><a href="fc.php">Fee Card</a></li>
                     <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Labels</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">Student Labels</a></li>
                    		<li><a href="">Hosteler Labels</a></li>
							 <li><a href="">Student Labels 1</a></li>
                             <li><a href="">Hosteler Labels 1</a></li>
                        </ul>
                   </li>
					 <li><a href="f_ce.php">Fee Certificate</a></li>
					 <li><a href="pd.php">Pending Document</a></li>
					 <li><a href="s_seg.php">Scholar Register</a></li>-->
				  </ul>
				  
				  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Yearly Activity<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Student Promotion</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="">Current Students</a></li>
                        </ul>
                   </li>
                    <li><a href="">Year Run</a></li>
                    <li><a href="">Finish Student Promotion</a></li>
				  </ul>
				  
				  
				
				  
				  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">System<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="summary.php">Summary</a></li>
                    <li><a href="">Report</a></li>
                    <li><a href="">School Information</a></li>
					<li><a href="">Hostel Information</a></li>
					<li><a href="">User Permission</a></li>
                    <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Database</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="backup.php">Back Up</a></li>
                    		<li><a href="">Compact And Exit</a></li>
							 <li><a href="">Set Back Up Directory</a></li>
                        </ul>
                   </li>
                   <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Barcode</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="single_barcode.php">Single Barcode</a></li>
                    		<li><a href="multiple_barcode.php">Multiple Barcode</a></li>
                        </ul>
                   </li>
					<li><a href="">TC Recovery</a></li>
					<li><a href="">Change Password</a></li>
				    <li><a href="logout.php">Logout</a></li>
				  </ul>
				  
				  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Setup<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="city_setup.php">City/State </a></li>
                    <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Class</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="cls_setup.php">Class Setup</a></li>
                    		<li><a href="strm_setup.php">Stream Setup</a></li>
							 <li><a href="sec_cls_setup.php">Class Section Mapping</a></li>
                        </ul>
                   </li>
                   <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Hostel</a>
                        <ul class="dropdown-menu"> 
					  <li><a href="hstl_schl_setup.php">Hosteller's School</a></li>
					   <li><a href="hstl_fee_setup.php">Fee Setup</a></li>
                       </ul>
                       </li>
                       
                    <li class="dropdown-submenu">
						<a tabindex="-1" href="#">Fees</a>
                        <ul class="dropdown-menu">                 		
                    		<li><a href="gen_fee_comp.php">General Fee Component</a></li>
                    		<li><a href="cls_fee_comp_setup.php">Class Fee Component</a></li>
							 <li><a href="b_s_f.php">Bus Station Fee Setup</a></li>
                        </ul>
                   </li>
                   
                    		<li><a href="mnth_mapping.php">Month Mapping</a></li>
                    		<li><a href="conduct.php">Conduct</a></li>
							 <li><a href="remarks.php">Remarks</a></li>
                             <li><a href="caution_fee.php">Caution Money Setup</a></li>
                    		<li><a href="admsn_doc.php">Admission /document Setup</a></li>
							 <li><a href="cls_admsn_doc.php">Admission /document Setup</a></li>                     
				  </ul>
                  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Occasional<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="">Admission Document Entry</a></li>
                    <li><a href="">Transfer Certificate</a></li>
                    <li><a href="">Fee Refund</a></li>
				  </ul>
                    
				  <li class="dropdown">
				<a href="index.php"class="dropdown-toggle" data-toggle="dropdown">Tools<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="">Search Receipts</a></li>
                    <li><a href="">Arrears</a></li>
                    <li><a href="">Customize</a></li>
				  </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
<?php
}
/////////////////////////////////////////////////////////////////////////////////////////////
function footer()//function to show footer
{?>
			<div id="footer">
              <div class="container">
                  <div class="span3">
                  </div>
                  <div class="span4">
                  </div>
                  <div class="span5" style="padding-top:10px; padding-bottom:10px;">
	                <a href="http://php.net/"><img src="img/logo_php.png"></a> 
                    <a href="http://nmcorp.co.in/"><img src="img/nmcorp_power.png"></a>
                  </div>
              </div>
            </div>
<?php
}

/////////////////////////////////////////////////////////////////////////////////////////////

function ajax()
{
	?>
<script type="text/javascript">
   var xobj;
   //modern browers
   if(window.XMLHttpRequest)
    {
	  xobj=new XMLHttpRequest();
	  }
	  //for ie
	  else if(window.ActiveXObject)
	   {
	    xobj=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else
		{
		  alert("Your broweser doesnot support ajax");
		  }
		 
		 function instlt_1()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_1").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_2").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				   if( b==undefined){b=0;}
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_2()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_2").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				   if( b==undefined){b=0;}
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  function instlt_3()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_3").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_2").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				   if( b==undefined){b=0;}	   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_4()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_4").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_2").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				   if( b==undefined){b=0;}	   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_5()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_2").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_2").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }		  
				   if( b==undefined){b=0;}
	   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  </script>
          <script>
		   function instlt_6()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_2").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_2").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 } 
				   if( b==undefined){b=0;} 
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 
			 xobj.send(null);
		  }	 
		   function instlt_7()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_2").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_2").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				 // var to=eval(document.getElementById("tot").value);
				  
				   if( b==undefined){b=0;}
				  
				//var c=t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12+b;		   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_8()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_8").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_2").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				 // var to=eval(document.getElementById("tot").value);
				  
				   if( b==undefined){b=0;}
				  
				//var c=t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12+b;		   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_9()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_9").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_2").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				 // var to=eval(document.getElementById("tot").value);
				  
				   if( b==undefined){b=0;}
				  
				//var c=t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12+b;		   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_10()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_10").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_2").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				 // var to=eval(document.getElementById("tot").value);
				  
				   if( b==undefined){b=0;}
				  
				//var c=t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12+b;		   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  </script>
          <script>
		   function instlt_11()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_11").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_2").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_12").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				 // var to=eval(document.getElementById("tot").value);
				  
				   if( b==undefined){b=0;}
				  
				//var c=t2+t3+t4+t5+t6+t7+t8+t9+t10+t11+t12+b;		   
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function instlt_12()
		  {
		    if(xobj)
			 {				 
			 var query="?con="+document.getElementById("instl_12").value;
			 xobj.open("GET","uc.php"+query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				 var t=eval(document.getElementById("inst").value);
				  if( b==undefined){b=0;}
				 var c=b;
				 for(var i=2;i<=t;i++)
				 {
					 if(i==2)
					 {
				   		var t2=eval(document.getElementById("instl_1").value);
						 if( t2==undefined){t2=0;}
						 
						 c+=t2;
					 }
					  else if(i==3)
					 {
					  var t3=eval(document.getElementById("instl_3").value);
					 if(t3==undefined){t3=0;}
					  c+=t3;
					  }
					  else if(i==4)
					 {
				   var t4=eval(document.getElementById("instl_4").value);
				   if(t4==undefined){t4=0;}
				    c+=t4;
				   }
					  else if(i==5)
					 {
				   var t5=eval(document.getElementById("instl_5").value);
				    if(t5==undefined){t5=0;}
					 c+=t5;
				   }
					    else if(i==6)
					 {
				   var t6=eval(document.getElementById("instl_6").value);
				    if(t6==undefined){t6=0;}
					 c+=t6;
				   }
					   else if(i==7)
					 {
				   var t7=eval(document.getElementById("instl_7").value);
				     if(t7==undefined){t7=0;}
					  c+=t7;
				   }
					   else if(i==8)
					 {
				   var t8=eval(document.getElementById("instl_8").value);
				     if(t8==undefined){t8=0;}
					  c+=t8;
				   }
					   else if(i==9)
					 {
				   var t9=eval(document.getElementById("instl_9").value);
				   if(t9==undefined){t9=0;}
				    c+=t9;
				   }
					  else  if(i==10)
					 {
				   var t10=eval(document.getElementById("instl_10").value);
				    if(t10==undefined){t10=0;}
					 c+=t10;
				   }
					  else  if(i==11)
					 {
				   var t11=eval(document.getElementById("instl_11").value);
				   if(t11==undefined){t11=0;}
				    c+=t11;
				   }
					   else if(i==12)
					 {
				   var t12=eval(document.getElementById("instl_2").value);
				   if(t12==undefined){t12=0;}
				    c+=t12;
					 }
				 }
				
				  
				   if( b==undefined){b=0;}
				  
				 
			   document.getElementById("tot").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  </script>
          <script>
		   
		   function getstdnt_ldgr()
		  {
			  
			  
		    if(xobj)
			 {				
				if(document.getElementById("ac").checked==true)
				{
					 var c1=document.getElementById("ac").value;
				}
				else
				{
					 var c1=document.getElementById("content").value;
				}
				if(document.getElementById("as").checked==true)
				{
					 var c2=document.getElementById("as").value;
				}
				else
				{
					 var c2=document.getElementById("pf").value;
				}
				var dp1=document.getElementById("dp1").value;
				
				var dp2=document.getElementById("dp2").value;
				
				var query="?con1=" + c1 + "&con2=" + c2 + "&dp1=" + dp1 + "&dp2=" + dp2;
				
			 xobj.open("GET","get_stdnt_ldgr.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("sl").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	   
		 	   function getcwc()
		  {
			  
		    if(xobj)
			 {			
				
				var c1=document.getElementById("s_fee").value;
				
			if(document.getElementById("det").checked==true)
				{
					 var det=document.getElementById("det").value;
				}
				if(document.getElementById("summ").checked==true)
				{
					 var summ=document.getElementById("summ").value;
				}
				
				var dp1=document.getElementById("dp1").value;
				
				var dp2=document.getElementById("dp2").value;
				var query="?con1=" + c1 + "&dp1=" + dp1 + "&dp2=" + dp2 + "&det=" + det + "&summ=" + summ;		
			 xobj.open("GET","getcomponent.php" +query,true);			
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txt").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	
		 
		  
		  
		   function due_gen_fees()
		  {
			  
		    if(xobj)
			 {				
				if(document.getElementById("ac").checked==true)
				{
					 var cl=document.getElementById("ac").value;
				}
				else
				{
					 var cl=document.getElementById("content").value;
					 
				}
				var query="?con=" + cl;
			 xobj.open("GET","due_gen_fees.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("gen_fee").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	   
		  function due_ctn_fees()
		  {
			  
		    if(xobj)
			 {				
				if(document.getElementById("ac").checked==true)
				{
					 var cl=document.getElementById("ac").value;
				}
				else
				{
					 var cl=document.getElementById("content").value;
					 
				}
				var query="?con=" + cl;
			 xobj.open("GET","due_ctn_fee.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("ctn_fee").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function due_hstl_fees()
		  {
			  
		    if(xobj)
			 {				
				if(document.getElementById("ac").checked==true)
				{
					 var cl=document.getElementById("ac").value;
				}
				else
				{
					 var cl=document.getElementById("content").value;
					 
				}
				var query="?con=" + cl;
			 xobj.open("GET","due_hstl_fee.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("hstl_fee").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  function due_mnth_fees()
		  {
			  
		    if(xobj)
			 {				
				if(document.getElementById("ac").checked==true)
				{
					 var cl=document.getElementById("ac").value;
				}
				else
				{
					 var cl=document.getElementById("content").value;
					 
				}
				var query="?con=" + cl;
				
			 xobj.open("GET","due_mnth_fees.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("mnth_fee").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		   function getstrm()
		  {
		    if(xobj)
			 {
				 var cl=document.getElementById("class").value;
			
				
			 var query="?con=" + cl;
			 xobj.open("GET","getstrm.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txtstrm").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	   
		  
		  function getctn()
		  {
		    if(xobj)
			 {
				 var cl=document.getElementById("content").value;
			
				
			 var query="?con=" + cl;
			 xobj.open("GET","getcaution.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txthint").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	   
		  
		  function getvalue()
		  {
		    if(xobj)
			 {
				 var cl=document.getElementById("class").value;
				 var st=document.getElementById("strm").value;
				
			 var query="?con=" + cl + "&con1=" + st;
			 xobj.open("GET","getsection.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txthint").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		
		   function getfee()
		  {
		    if(xobj)
			 {
				 var cl=document.getElementById("class").value;
				 var st=document.getElementById("strm").value;
				if(document.getElementById("med").checked==true)
				{
					 var med=document.getElementById("med").value;
				}
				else if(document.getElementById("med1").checked==true)
				{
					 var med=document.getElementById("med1").value;
				}
				else
				{
					alert("Please select mediim.");
				}
			
			 var z="?x=" + cl + "&y=" + st + "&q=" + med;
			 xobj.open("GET","getfee.php" +z,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("fee").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  function getamnt()
		  {
		    if(xobj)
			 {
				 var cl=document.getElementById("feetype").value;
			 var query="?con=" + cl;
			 xobj.open("GET","getamount.php" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("amnt").innerHTML=xobj.responseText;;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function clk1()
		  	{
				
		    if(xobj)
			 {				
			 var query="?con="+document.getElementById("a1").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c1").checked==false)
				{ 
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
					
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("c1").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		   function clk2()
		  	{
		    if(xobj)
			 {				
			 var query="?con="+document.getElementById("a2").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c2").checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("c2").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function clk3()
		  	{
		    if(xobj)
			 {				
			 var query="?con="+document.getElementById("a3").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c3").checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("a3").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function clk4()
		  	{
		    if(xobj)
			 {				
			 var query="?con="+document.getElementById("a4").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c4").checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("c4").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function clk5()
		  	{
		    if(xobj)
			 {				
			 var query="?con="+document.getElementById("a5").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c5").checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("c5").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	 
		  </script>
          <script>
		  function clk6()
		  	{
		    if(xobj)
			 {			
			
			 var query="?con="+document.getElementById("a6").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c6").checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("c6").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function clk7()
		  	{
		    if(xobj)
			 {				
			 var query="?con="+document.getElementById("a7").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);  
				if(document.getElementById("c7").checked==false)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1-b;
					var d=t2-b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
				if(document.getElementById("c7").checked==true)
				{
					var t1=eval(document.getElementById("inst").value);
					
					var t2=eval(document.getElementById("dep").value);
					
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(t2==undefined)
				   {
					   t2=0;
				   }
					var c=t1+b;
					var d=t2+b;	  
			   document.getElementById("inst").value=c;
			   document.getElementById("dep").value=d;
				}
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  </script>
          <script>
		   function getstrm1()
		  {
		    if(xobj)
			 {
				
				 if(document.getElementById("r1").checked==true)
				 {
					 var query="?con="+document.getElementById("r1").value; 
				 }
				else if(document.getElementById("r2").checked==true)
				 {
					 var query="?con="+document.getElementById("r2").value; 
				 }
				else if(document.getElementById("r3").checked==true)
				 {
					 var query="?con="+document.getElementById("r3").value; 
				 }
				else if(document.getElementById("r4").checked==true)
				 {
					 var query="?con="+document.getElementById("r4").value; 
				 }
			
			 xobj.open("GET","getstrm_setup.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {   	   
			   document.getElementById("se").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		 function b1()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_1").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_1").value);
				   var r1=eval(document.getElementById("r_1").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
					var c=t1+r1+b;		   
			   document.getElementById("a_1").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function b2()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_2").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_2").value);
				   var r1=eval(document.getElementById("r_2").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_2").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b3()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_3").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_3").value);
				   var r1=eval(document.getElementById("r_3").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_3").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b4()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_4").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_4").value);
				   var r1=eval(document.getElementById("r_4").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_4").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b5()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_5").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_5").value);
				   var r1=eval(document.getElementById("r_5").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_5").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b6()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_6").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_6").value);
				   var r1=eval(document.getElementById("r_6").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_6").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b7()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_7").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_7").value);
				   var r1=eval(document.getElementById("r_7").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_7").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b8()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_8").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_8").value);
				   var r1=eval(document.getElementById("r_8").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_8").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b9()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_9").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_9").value);
				   var r1=eval(document.getElementById("r_9").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_9").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b10()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_10").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_10").value);
				   var r1=eval(document.getElementById("r_10").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_10").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b11()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_11").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_11").value);
				   var r1=eval(document.getElementById("r_11").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_11").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function b12()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("b_12").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("t_12").value);
				   var r1=eval(document.getElementById("r_12").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_12").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		 </script>
          <script>
		   function t1()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_1").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_1").value);
				   var r1=eval(document.getElementById("r_1").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_1").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function t2()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_2").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_2").value);
				   var r1=eval(document.getElementById("r_2").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_2").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t3()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_3").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_3").value);
				   var r1=eval(document.getElementById("r_3").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_3").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t4()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_4").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_4").value);
				   var r1=eval(document.getElementById("r_4").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_4").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t5()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_5").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_5").value);
				   var r1=eval(document.getElementById("r_5").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_5").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t6()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_6").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_6").value);
				   var r1=eval(document.getElementById("r_6").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_6").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t7()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_7").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_7").value);
				   var r1=eval(document.getElementById("r_7").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_7").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t8()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_8").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_8").value);
				   var r1=eval(document.getElementById("r_8").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_8").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t9()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_9").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_9").value);
				   var r1=eval(document.getElementById("r_9").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_9").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t10()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_10").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_10").value);
				   var r1=eval(document.getElementById("r_10").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_10").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t11()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_11").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_11").value);
				   var r1=eval(document.getElementById("r_11").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_11").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function t12()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("t_12").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_12").value);
				   var r1=eval(document.getElementById("r_12").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_12").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  </script>
          <script>
  			function r1()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_1").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_1").value);
				   var r1=eval(document.getElementById("t_1").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_1").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  function r2()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_2").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_2").value);
				   var r1=eval(document.getElementById("t_2").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_2").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r3()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_3").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_3").value);
				   var r1=eval(document.getElementById("t_3").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_3").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r4()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_4").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_4").value);
				   var r1=eval(document.getElementById("t_4").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_4").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r5()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_5").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_5").value);
				   var r1=eval(document.getElementById("t_5").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_5").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r6()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_6").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_6").value);
				   var r1=eval(document.getElementById("t_6").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_6").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r7()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_7").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_7").value);
				   var r1=eval(document.getElementById("t_7").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_7").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r8()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_8").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_8").value);
				   var r1=eval(document.getElementById("t_8").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_8").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r9()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_9").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_9").value);
				   var r1=eval(document.getElementById("t_9").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_9").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r10()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_10").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_10").value);
				   var r1=eval(document.getElementById("t_10").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_10").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r11()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_11").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_11").value);
				   var r1=eval(document.getElementById("t_11").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_11").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  function r12()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("r_12").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   
				   var t1=eval(document.getElementById("b_12").value);
				   var r1=eval(document.getElementById("t_12").value);
				   if(t1==undefined)
				   {
					   t1=0;
				   }
				   if(r1==undefined)
				   {
					   r1=0;
				   }
				   var c=t1+r1+b;
			   document.getElementById("a_12").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
 
  </script>
  <script>
   function install()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("inst").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   	      
			   var fine=eval(document.getElementById("fine").value);
			   var cncsn=eval(document.getElementById("cncsn").value);
			  
			   if(b==undefined)
				   {
					   b=0;
				   }
			   document.getElementById("gt").value=b;
			   document.getElementById("dep").value=b;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  
   function concession()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("cncsn").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   	 
			   var inst=eval(document.getElementById("inst").value);
			   var fine=eval(document.getElementById("fine").value);
			 
			   if(b==undefined)
				   {
					   b=0;
				   }
				   
			   if(fine==undefined)
				   {
					   fine=0;
				   }
			   c=inst+fine-b;
			   document.getElementById("dep").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  
   function fin()
		  {
		    if(xobj)
			 {
			 var query="?con="+document.getElementById("fine").value;
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
				   var b=eval(xobj.responseText);
				   	   
			   var inst=eval(document.getElementById("inst").value);
			   var cncsn=eval(document.getElementById("cncsn").value);
			  
			   if(b==undefined)
				   {
					   b=0;
				   }
				   
			   if(cncsn==undefined)
				   {
					   cncsn=0;
				   }
			   c=inst-cncsn+b;
			    document.getElementById("dep").value=c;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }	  
		  

		  </script>
          <script>
   function p_1()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p1").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			    if(b1==undefined){b1=0;}
				var k=b1;
			  }
			  else if(num==2)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   var k=b1+t1;
			  }
			  else if(num==3)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   var k=b1+t1+r1;
			  }
			  else if(num==4)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   var k=b1+t1+r1+c1;
			  }
			  else if(num==5)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   var m1=eval(document.getElementById("m_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   if(m1==undefined){m1=0;}
			   var k=b1+t1+r1+c1+m1;
			  }
			  else if(num==6)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   var m1=eval(document.getElementById("m_1").value);
			   var n1=eval(document.getElementById("n_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   if(m1==undefined){m1=0;}
			   if(n1==undefined){n1=0;}
			   var k=b1+t1+r1+c1+m1+n1;
			  }
			  else if(num==7)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   var m1=eval(document.getElementById("m_1").value);
			   var n1=eval(document.getElementById("n_1").value);
			   var o1=eval(document.getElementById("o_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   if(m1==undefined){m1=0;}
			   if(n1==undefined){n1=0;}
			   if(o1==undefined){o1=0;}
			   var k=b1+t1+r1+c1+m1+n1+o1;
			  }
			  else if(num==8)
			  {
			    var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   var m1=eval(document.getElementById("m_1").value);
			   var n1=eval(document.getElementById("n_1").value);
			   var o1=eval(document.getElementById("o_1").value);
			   var s1=eval(document.getElementById("s_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   if(m1==undefined){m1=0;}
			   if(n1==undefined){n1=0;}
			   if(o1==undefined){o1=0;}
			   if(s1==undefined){s1=0;}
			   var k=b1+t1+r1+c1+m1+n1+o1+s1;
			  }
			  else if(num==9)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   var m1=eval(document.getElementById("m_1").value);
			   var n1=eval(document.getElementById("n_1").value);
			   var o1=eval(document.getElementById("o_1").value);
			   var s1=eval(document.getElementById("s_1").value);
			   var q1=eval(document.getElementById("q_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   if(m1==undefined){m1=0;}
			   if(n1==undefined){n1=0;}
			   if(o1==undefined){o1=0;}
			   if(s1==undefined){s1=0;}
			   if(q1==undefined){q1=0;}
			   var k=b1+t1+r1+c1+m1+n1+o1+s1+q1;
			  }
			  else if(num==10)
			  {
			   var b1=eval(document.getElementById("b_1").value);
			   var t1=eval(document.getElementById("t_1").value);
			   var r1=eval(document.getElementById("r_1").value);
			   var c1=eval(document.getElementById("c_1").value);
			   var m1=eval(document.getElementById("m_1").value);
			   var n1=eval(document.getElementById("n_1").value);
			   var o1=eval(document.getElementById("o_1").value);
			   var s1=eval(document.getElementById("s_1").value);
			   var q1=eval(document.getElementById("q_1").value);
			   var v1=eval(document.getElementById("v_1").value);
			   if(b1==undefined){b1=0;}
			   if(t1==undefined){t1=0;}
			   if(r1==undefined){r1=0;}
			   if(c1==undefined){c1=0;}
			   if(m1==undefined){m1=0;}
			   if(n1==undefined){n1=0;}
			   if(o1==undefined){o1=0;}
			   if(s1==undefined){s1=0;}
			   if(q1==undefined){q1=0;}
			   if(v1==undefined){v1=0;}
			   var k=b1+t1+r1+c1+m1+n1+o1+s1+q1+v1;
			  }
					document.getElementById("tm1").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm1").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p1").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm1").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
	   function p_2()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p2").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			    if(b2==undefined){b2=0;}
				var k=b2;
			  }
			  else if(num==2)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   var k=b2+t2;
			  }
			  else if(num==3)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   var k=b2+t2+r2;
			  }
			  else if(num==4)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   var k=b2+t2+r2+c2;
			  }
			  else if(num==5)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   var m2=eval(document.getElementById("m_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   if(m2==undefined){m2=0;}
			   var k=b2+t2+r2+c2+m2;
			  }
			  else if(num==6)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   var m2=eval(document.getElementById("m_2").value);
			   var n2=eval(document.getElementById("n_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   if(m2==undefined){m2=0;}
			   if(n2==undefined){n2=0;}
			   var k=b2+t2+r2+c2+m2+n2;
			  }
			  else if(num==7)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   var m2=eval(document.getElementById("m_2").value);
			   var n2=eval(document.getElementById("n_2").value);
			   var o2=eval(document.getElementById("o_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   if(m2==undefined){m2=0;}
			   if(n2==undefined){n2=0;}
			   if(o2==undefined){o2=0;}
			   var k=b2+t2+r2+c2+m2+n2+o2;
			  }
			  else if(num==8)
			  {
			    var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   var m2=eval(document.getElementById("m_2").value);
			   var n2=eval(document.getElementById("n_2").value);
			   var o2=eval(document.getElementById("o_2").value);
			   var s2=eval(document.getElementById("s_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   if(m2==undefined){m2=0;}
			   if(n2==undefined){n2=0;}
			   if(o2==undefined){o2=0;}
			   if(s2==undefined){s2=0;}
			   var k=b2+t2+r2+c2+m2+n2+o2+s2;
			  }
			  else if(num==9)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   var m2=eval(document.getElementById("m_2").value);
			   var n2=eval(document.getElementById("n_2").value);
			   var o2=eval(document.getElementById("o_2").value);
			   var s2=eval(document.getElementById("s_2").value);
			   var q2=eval(document.getElementById("q_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   if(m2==undefined){m2=0;}
			   if(n2==undefined){n2=0;}
			   if(o2==undefined){o2=0;}
			   if(s2==undefined){s2=0;}
			   if(q2==undefined){q2=0;}
			   var k=b2+t2+r2+c2+m2+n2+o2+s2+q2;
			  }
			  else if(num==10)
			  {
			   var b2=eval(document.getElementById("b_2").value);
			   var t2=eval(document.getElementById("t_2").value);
			   var r2=eval(document.getElementById("r_2").value);
			   var c2=eval(document.getElementById("c_2").value);
			   var m2=eval(document.getElementById("m_2").value);
			   var n2=eval(document.getElementById("n_2").value);
			   var o2=eval(document.getElementById("o_2").value);
			   var s2=eval(document.getElementById("s_2").value);
			   var q2=eval(document.getElementById("q_2").value);
			   var v2=eval(document.getElementById("v_2").value);
			   if(b2==undefined){b2=0;}
			   if(t2==undefined){t2=0;}
			   if(r2==undefined){r2=0;}
			   if(c2==undefined){c2=0;}
			   if(m2==undefined){m2=0;}
			   if(n2==undefined){n2=0;}
			   if(o2==undefined){o2=0;}
			   if(s2==undefined){s2=0;}
			   if(q2==undefined){q2=0;}
			   if(v2==undefined){v2=0;}
			   var k=b2+t2+r2+c2+m2+n2+o2+s2+q2+v2;
			  }
					document.getElementById("tm2").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm2").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p2").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm2").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_3()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p3").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			    if(b3==undefined){b3=0;}
				var k=b3;
			  }
			  else if(num==2)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   var k=b3+t3;
			  }
			  else if(num==3)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   var k=b3+t3+r3;
			  }
			  else if(num==4)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   var k=b3+t3+r3+c3;
			  }
			  else if(num==5)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   var m3=eval(document.getElementById("m_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   if(m3==undefined){m3=0;}
			   var k=b3+t3+r3+c3+m3;
			  }
			  else if(num==6)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   var m3=eval(document.getElementById("m_3").value);
			   var n3=eval(document.getElementById("n_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   if(m3==undefined){m3=0;}
			   if(n3==undefined){n3=0;}
			   var k=b3+t3+r3+c3+m3+n3;
			  }
			  else if(num==7)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   var m3=eval(document.getElementById("m_3").value);
			   var n3=eval(document.getElementById("n_3").value);
			   var o3=eval(document.getElementById("o_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   if(m3==undefined){m3=0;}
			   if(n3==undefined){n3=0;}
			   if(o3==undefined){o3=0;}
			   var k=b3+t3+r3+c3+m3+n3+o3;
			  }
			  else if(num==8)
			  {
			    var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   var m3=eval(document.getElementById("m_3").value);
			   var n3=eval(document.getElementById("n_3").value);
			   var o3=eval(document.getElementById("o_3").value);
			   var s3=eval(document.getElementById("s_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   if(m3==undefined){m3=0;}
			   if(n3==undefined){n3=0;}
			   if(o3==undefined){o3=0;}
			   if(s3==undefined){s3=0;}
			   var k=b3+t3+r3+c3+m3+n3+o3+s3;
			  }
			  else if(num==9)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   var m3=eval(document.getElementById("m_3").value);
			   var n3=eval(document.getElementById("n_3").value);
			   var o3=eval(document.getElementById("o_3").value);
			   var s3=eval(document.getElementById("s_3").value);
			   var q3=eval(document.getElementById("q_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   if(m3==undefined){m3=0;}
			   if(n3==undefined){n3=0;}
			   if(o3==undefined){o3=0;}
			   if(s3==undefined){s3=0;}
			   if(q3==undefined){q3=0;}
			   var k=b3+t3+r3+c3+m3+n3+o3+s3+q3;
			  }
			  else if(num==10)
			  {
			   var b3=eval(document.getElementById("b_3").value);
			   var t3=eval(document.getElementById("t_3").value);
			   var r3=eval(document.getElementById("r_3").value);
			   var c3=eval(document.getElementById("c_3").value);
			   var m3=eval(document.getElementById("m_3").value);
			   var n3=eval(document.getElementById("n_3").value);
			   var o3=eval(document.getElementById("o_3").value);
			   var s3=eval(document.getElementById("s_3").value);
			   var q3=eval(document.getElementById("q_3").value);
			   var v3=eval(document.getElementById("v_3").value);
			   if(b3==undefined){b3=0;}
			   if(t3==undefined){t3=0;}
			   if(r3==undefined){r3=0;}
			   if(c3==undefined){c3=0;}
			   if(m3==undefined){m3=0;}
			   if(n3==undefined){n3=0;}
			   if(o3==undefined){o3=0;}
			   if(s3==undefined){s3=0;}
			   if(q3==undefined){q3=0;}
			   if(v3==undefined){v3=0;}
			   var k=b3+t3+r3+c3+m3+n3+o3+s3+q3+v3;
			  }
					document.getElementById("tm3").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm3").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p3").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm3").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_4()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p4").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			    if(b4==undefined){b4=0;}
				var k=b4;
			  }
			  else if(num==2)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   var k=b4+t4;
			  }
			  else if(num==3)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   var k=b4+t4+r4;
			  }
			  else if(num==4)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   var k=b4+t4+r4+c4;
			  }
			  else if(num==5)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   var m4=eval(document.getElementById("m_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   if(m4==undefined){m4=0;}
			   var k=b4+t4+r4+c4+m4;
			  }
			  else if(num==6)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   var m4=eval(document.getElementById("m_4").value);
			   var n4=eval(document.getElementById("n_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   if(m4==undefined){m4=0;}
			   if(n4==undefined){n4=0;}
			   var k=b4+t4+r4+c4+m4+n4;
			  }
			  else if(num==7)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   var m4=eval(document.getElementById("m_4").value);
			   var n4=eval(document.getElementById("n_4").value);
			   var o4=eval(document.getElementById("o_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   if(m4==undefined){m4=0;}
			   if(n4==undefined){n4=0;}
			   if(o4==undefined){o4=0;}
			   var k=b4+t4+r4+c4+m4+n4+o4;
			  }
			  else if(num==8)
			  {
			    var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   var m4=eval(document.getElementById("m_4").value);
			   var n4=eval(document.getElementById("n_4").value);
			   var o4=eval(document.getElementById("o_4").value);
			   var s4=eval(document.getElementById("s_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   if(m4==undefined){m4=0;}
			   if(n4==undefined){n4=0;}
			   if(o4==undefined){o4=0;}
			   if(s4==undefined){s4=0;}
			   var k=b4+t4+r4+c4+m4+n4+o4+s4;
			  }
			  else if(num==9)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   var m4=eval(document.getElementById("m_4").value);
			   var n4=eval(document.getElementById("n_4").value);
			   var o4=eval(document.getElementById("o_4").value);
			   var s4=eval(document.getElementById("s_4").value);
			   var q4=eval(document.getElementById("q_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   if(m4==undefined){m4=0;}
			   if(n4==undefined){n4=0;}
			   if(o4==undefined){o4=0;}
			   if(s4==undefined){s4=0;}
			   if(q4==undefined){q4=0;}
			   var k=b4+t4+r4+c4+m4+n4+o4+s4+q4;
			  }
			  else if(num==10)
			  {
			   var b4=eval(document.getElementById("b_4").value);
			   var t4=eval(document.getElementById("t_4").value);
			   var r4=eval(document.getElementById("r_4").value);
			   var c4=eval(document.getElementById("c_4").value);
			   var m4=eval(document.getElementById("m_4").value);
			   var n4=eval(document.getElementById("n_4").value);
			   var o4=eval(document.getElementById("o_4").value);
			   var s4=eval(document.getElementById("s_4").value);
			   var q4=eval(document.getElementById("q_4").value);
			   var v4=eval(document.getElementById("v_4").value);
			   if(b4==undefined){b4=0;}
			   if(t4==undefined){t4=0;}
			   if(r4==undefined){r4=0;}
			   if(c4==undefined){c4=0;}
			   if(m4==undefined){m4=0;}
			   if(n4==undefined){n4=0;}
			   if(o4==undefined){o4=0;}
			   if(s4==undefined){s4=0;}
			   if(q4==undefined){q4=0;}
			   if(v4==undefined){v4=0;}
			   var k=b4+t4+r4+c4+m4+n4+o4+s4+q4+v4;
			  }
					document.getElementById("tm4").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm4").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p4").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm4").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_5()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p5").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			    if(b5==undefined){b5=0;}
				var k=b5;
			  }
			  else if(num==2)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   var k=b5+t5;
			  }
			  else if(num==3)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   var k=b5+t5+r5;
			  }
			  else if(num==4)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   var k=b5+t5+r5+c5;
			  }
			  else if(num==5)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   var m5=eval(document.getElementById("m_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   if(m5==undefined){m5=0;}
			   var k=b5+t5+r5+c5+m5;
			  }
			  else if(num==6)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   var m5=eval(document.getElementById("m_5").value);
			   var n5=eval(document.getElementById("n_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   if(m5==undefined){m5=0;}
			   if(n5==undefined){n5=0;}
			   var k=b5+t5+r5+c5+m5+n5;
			  }
			  else if(num==7)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   var m5=eval(document.getElementById("m_5").value);
			   var n5=eval(document.getElementById("n_5").value);
			   var o5=eval(document.getElementById("o_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   if(m5==undefined){m5=0;}
			   if(n5==undefined){n5=0;}
			   if(o5==undefined){o5=0;}
			   var k=b5+t5+r5+c5+m5+n5+o5;
			  }
			  else if(num==8)
			  {
			    var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   var m5=eval(document.getElementById("m_5").value);
			   var n5=eval(document.getElementById("n_5").value);
			   var o5=eval(document.getElementById("o_5").value);
			   var s5=eval(document.getElementById("s_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   if(m5==undefined){m5=0;}
			   if(n5==undefined){n5=0;}
			   if(o5==undefined){o5=0;}
			   if(s5==undefined){s5=0;}
			   var k=b5+t5+r5+c5+m5+n5+o5+s5;
			  }
			  else if(num==9)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   var m5=eval(document.getElementById("m_5").value);
			   var n5=eval(document.getElementById("n_5").value);
			   var o5=eval(document.getElementById("o_5").value);
			   var s5=eval(document.getElementById("s_5").value);
			   var q5=eval(document.getElementById("q_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   if(m5==undefined){m5=0;}
			   if(n5==undefined){n5=0;}
			   if(o5==undefined){o5=0;}
			   if(s5==undefined){s5=0;}
			   if(q5==undefined){q5=0;}
			   var k=b5+t5+r5+c5+m5+n5+o5+s5+q5;
			  }
			  else if(num==10)
			  {
			   var b5=eval(document.getElementById("b_5").value);
			   var t5=eval(document.getElementById("t_5").value);
			   var r5=eval(document.getElementById("r_5").value);
			   var c5=eval(document.getElementById("c_5").value);
			   var m5=eval(document.getElementById("m_5").value);
			   var n5=eval(document.getElementById("n_5").value);
			   var o5=eval(document.getElementById("o_5").value);
			   var s5=eval(document.getElementById("s_5").value);
			   var q5=eval(document.getElementById("q_5").value);
			   var v5=eval(document.getElementById("v_5").value);
			   if(b5==undefined){b5=0;}
			   if(t5==undefined){t5=0;}
			   if(r5==undefined){r5=0;}
			   if(c5==undefined){c5=0;}
			   if(m5==undefined){m5=0;}
			   if(n5==undefined){n5=0;}
			   if(o5==undefined){o5=0;}
			   if(s5==undefined){s5=0;}
			   if(q5==undefined){q5=0;}
			   if(v5==undefined){v5=0;}
			   var k=b5+t5+r5+c5+m5+n5+o5+s5+q5+v5;
			  }
					document.getElementById("tm5").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm5").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p5").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm5").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_6()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p6").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			    if(b6==undefined){b6=0;}
				var k=b6;
			  }
			  else if(num==2)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   var k=b6+t6;
			  }
			  else if(num==3)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   var k=b6+t6+r6;
			  }
			  else if(num==4)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   var k=b6+t6+r6+c6;
			  }
			  else if(num==5)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   var m6=eval(document.getElementById("m_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   if(m6==undefined){m6=0;}
			   var k=b6+t6+r6+c6+m6;
			  }
			  else if(num==6)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   var m6=eval(document.getElementById("m_6").value);
			   var n6=eval(document.getElementById("n_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   if(m6==undefined){m6=0;}
			   if(n6==undefined){n6=0;}
			   var k=b6+t6+r6+c6+m6+n6;
			  }
			  else if(num==7)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   var m6=eval(document.getElementById("m_6").value);
			   var n6=eval(document.getElementById("n_6").value);
			   var o6=eval(document.getElementById("o_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   if(m6==undefined){m6=0;}
			   if(n6==undefined){n6=0;}
			   if(o6==undefined){o6=0;}
			   var k=b6+t6+r6+c6+m6+n6+o6;
			  }
			  else if(num==8)
			  {
			    var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   var m6=eval(document.getElementById("m_6").value);
			   var n6=eval(document.getElementById("n_6").value);
			   var o6=eval(document.getElementById("o_6").value);
			   var s6=eval(document.getElementById("s_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   if(m6==undefined){m6=0;}
			   if(n6==undefined){n6=0;}
			   if(o6==undefined){o6=0;}
			   if(s6==undefined){s6=0;}
			   var k=b6+t6+r6+c6+m6+n6+o6+s6;
			  }
			  else if(num==9)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   var m6=eval(document.getElementById("m_6").value);
			   var n6=eval(document.getElementById("n_6").value);
			   var o6=eval(document.getElementById("o_6").value);
			   var s6=eval(document.getElementById("s_6").value);
			   var q6=eval(document.getElementById("q_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   if(m6==undefined){m6=0;}
			   if(n6==undefined){n6=0;}
			   if(o6==undefined){o6=0;}
			   if(s6==undefined){s6=0;}
			   if(q6==undefined){q6=0;}
			   var k=b6+t6+r6+c6+m6+n6+o6+s6+q6;
			  }
			  else if(num==10)
			  {
			   var b6=eval(document.getElementById("b_6").value);
			   var t6=eval(document.getElementById("t_6").value);
			   var r6=eval(document.getElementById("r_6").value);
			   var c6=eval(document.getElementById("c_6").value);
			   var m6=eval(document.getElementById("m_6").value);
			   var n6=eval(document.getElementById("n_6").value);
			   var o6=eval(document.getElementById("o_6").value);
			   var s6=eval(document.getElementById("s_6").value);
			   var q6=eval(document.getElementById("q_6").value);
			   var v6=eval(document.getElementById("v_6").value);
			   if(b6==undefined){b6=0;}
			   if(t6==undefined){t6=0;}
			   if(r6==undefined){r6=0;}
			   if(c6==undefined){c6=0;}
			   if(m6==undefined){m6=0;}
			   if(n6==undefined){n6=0;}
			   if(o6==undefined){o6=0;}
			   if(s6==undefined){s6=0;}
			   if(q6==undefined){q6=0;}
			   if(v6==undefined){v6=0;}
			   var k=b6+t6+r6+c6+m6+n6+o6+s6+q6+v6;
			  }
					document.getElementById("tm6").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm6").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p6").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm6").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_7()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p7").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			    if(b7==undefined){b7=0;}
				var k=b7;
			  }
			  else if(num==2)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   var k=b7+t7;
			  }
			  else if(num==3)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   var k=b7+t7+r7;
			  }
			  else if(num==4)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   var k=b7+t7+r7+c7;
			  }
			  else if(num==5)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   var m7=eval(document.getElementById("m_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   if(m7==undefined){m7=0;}
			   var k=b7+t7+r7+c7+m7;
			  }
			  else if(num==6)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   var m7=eval(document.getElementById("m_7").value);
			   var n7=eval(document.getElementById("n_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   if(m7==undefined){m7=0;}
			   if(n7==undefined){n7=0;}
			   var k=b7+t7+r7+c7+m7+n7;
			  }
			  else if(num==7)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   var m7=eval(document.getElementById("m_7").value);
			   var n7=eval(document.getElementById("n_7").value);
			   var o7=eval(document.getElementById("o_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   if(m7==undefined){m7=0;}
			   if(n7==undefined){n7=0;}
			   if(o7==undefined){o7=0;}
			   var k=b7+t7+r7+c7+m7+n7+o7;
			  }
			  else if(num==8)
			  {
			    var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   var m7=eval(document.getElementById("m_7").value);
			   var n7=eval(document.getElementById("n_7").value);
			   var o7=eval(document.getElementById("o_7").value);
			   var s7=eval(document.getElementById("s_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   if(m7==undefined){m7=0;}
			   if(n7==undefined){n7=0;}
			   if(o7==undefined){o7=0;}
			   if(s7==undefined){s7=0;}
			   var k=b7+t7+r7+c7+m7+n7+o7+s7;
			  }
			  else if(num==9)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   var m7=eval(document.getElementById("m_7").value);
			   var n7=eval(document.getElementById("n_7").value);
			   var o7=eval(document.getElementById("o_7").value);
			   var s7=eval(document.getElementById("s_7").value);
			   var q7=eval(document.getElementById("q_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   if(m7==undefined){m7=0;}
			   if(n7==undefined){n7=0;}
			   if(o7==undefined){o7=0;}
			   if(s7==undefined){s7=0;}
			   if(q7==undefined){q7=0;}
			   var k=b7+t7+r7+c7+m7+n7+o7+s7+q7;
			  }
			  else if(num==10)
			  {
			   var b7=eval(document.getElementById("b_7").value);
			   var t7=eval(document.getElementById("t_7").value);
			   var r7=eval(document.getElementById("r_7").value);
			   var c7=eval(document.getElementById("c_7").value);
			   var m7=eval(document.getElementById("m_7").value);
			   var n7=eval(document.getElementById("n_7").value);
			   var o7=eval(document.getElementById("o_7").value);
			   var s7=eval(document.getElementById("s_7").value);
			   var q7=eval(document.getElementById("q_7").value);
			   var v7=eval(document.getElementById("v_7").value);
			   if(b7==undefined){b7=0;}
			   if(t7==undefined){t7=0;}
			   if(r7==undefined){r7=0;}
			   if(c7==undefined){c7=0;}
			   if(m7==undefined){m7=0;}
			   if(n7==undefined){n7=0;}
			   if(o7==undefined){o7=0;}
			   if(s7==undefined){s7=0;}
			   if(q7==undefined){q7=0;}
			   if(v7==undefined){v7=0;}
			   var k=b7+t7+r7+c7+m7+n7+o7+s7+q7+v7;
			  }
					document.getElementById("tm7").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm7").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p7").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm7").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_8()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p8").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			    if(b8==undefined){b8=0;}
				var k=b8;
			  }
			  else if(num==2)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   var k=b8+t8;
			  }
			  else if(num==3)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   var k=b8+t8+r8;
			  }
			  else if(num==4)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   var k=b8+t8+r8+c8;
			  }
			  else if(num==5)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   var m8=eval(document.getElementById("m_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   if(m8==undefined){m8=0;}
			   var k=b8+t8+r8+c8+m8;
			  }
			  else if(num==6)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   var m8=eval(document.getElementById("m_8").value);
			   var n8=eval(document.getElementById("n_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   if(m8==undefined){m8=0;}
			   if(n8==undefined){n8=0;}
			   var k=b8+t8+r8+c8+m8+n8;
			  }
			  else if(num==7)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   var m8=eval(document.getElementById("m_8").value);
			   var n8=eval(document.getElementById("n_8").value);
			   var o8=eval(document.getElementById("o_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   if(m8==undefined){m8=0;}
			   if(n8==undefined){n8=0;}
			   if(o8==undefined){o8=0;}
			   var k=b8+t8+r8+c8+m8+n8+o8;
			  }
			  else if(num==8)
			  {
			    var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   var m8=eval(document.getElementById("m_8").value);
			   var n8=eval(document.getElementById("n_8").value);
			   var o8=eval(document.getElementById("o_8").value);
			   var s8=eval(document.getElementById("s_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   if(m8==undefined){m8=0;}
			   if(n8==undefined){n8=0;}
			   if(o8==undefined){o8=0;}
			   if(s8==undefined){s8=0;}
			   var k=b8+t8+r8+c8+m8+n8+o8+s8;
			  }
			  else if(num==9)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   var m8=eval(document.getElementById("m_8").value);
			   var n8=eval(document.getElementById("n_8").value);
			   var o8=eval(document.getElementById("o_8").value);
			   var s8=eval(document.getElementById("s_8").value);
			   var q8=eval(document.getElementById("q_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   if(m8==undefined){m8=0;}
			   if(n8==undefined){n8=0;}
			   if(o8==undefined){o8=0;}
			   if(s8==undefined){s8=0;}
			   if(q8==undefined){q8=0;}
			   var k=b8+t8+r8+c8+m8+n8+o8+s8+q8;
			  }
			  else if(num==10)
			  {
			   var b8=eval(document.getElementById("b_8").value);
			   var t8=eval(document.getElementById("t_8").value);
			   var r8=eval(document.getElementById("r_8").value);
			   var c8=eval(document.getElementById("c_8").value);
			   var m8=eval(document.getElementById("m_8").value);
			   var n8=eval(document.getElementById("n_8").value);
			   var o8=eval(document.getElementById("o_8").value);
			   var s8=eval(document.getElementById("s_8").value);
			   var q8=eval(document.getElementById("q_8").value);
			   var v8=eval(document.getElementById("v_8").value);
			   if(b8==undefined){b8=0;}
			   if(t8==undefined){t8=0;}
			   if(r8==undefined){r8=0;}
			   if(c8==undefined){c8=0;}
			   if(m8==undefined){m8=0;}
			   if(n8==undefined){n8=0;}
			   if(o8==undefined){o8=0;}
			   if(s8==undefined){s8=0;}
			   if(q8==undefined){q8=0;}
			   if(v8==undefined){v8=0;}
			   var k=b8+t8+r8+c8+m8+n8+o8+s8+q8+v8;
			  }
					document.getElementById("tm8").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm8").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p8").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm8").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_9()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p9").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			    if(b9==undefined){b9=0;}
				var k=b9;
			  }
			  else if(num==2)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   var k=b9+t9;
			  }
			  else if(num==3)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   var k=b9+t9+r9;
			  }
			  else if(num==4)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   var k=b9+t9+r9+c9;
			  }
			  else if(num==5)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   var m9=eval(document.getElementById("m_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   if(m9==undefined){m9=0;}
			   var k=b9+t9+r9+c9+m9;
			  }
			  else if(num==6)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   var m9=eval(document.getElementById("m_9").value);
			   var n9=eval(document.getElementById("n_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   if(m9==undefined){m9=0;}
			   if(n9==undefined){n9=0;}
			   var k=b9+t9+r9+c9+m9+n9;
			  }
			  else if(num==7)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   var m9=eval(document.getElementById("m_9").value);
			   var n9=eval(document.getElementById("n_9").value);
			   var o9=eval(document.getElementById("o_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   if(m9==undefined){m9=0;}
			   if(n9==undefined){n9=0;}
			   if(o9==undefined){o9=0;}
			   var k=b9+t9+r9+c9+m9+n9+o9;
			  }
			  else if(num==8)
			  {
			    var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   var m9=eval(document.getElementById("m_9").value);
			   var n9=eval(document.getElementById("n_9").value);
			   var o9=eval(document.getElementById("o_9").value);
			   var s9=eval(document.getElementById("s_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   if(m9==undefined){m9=0;}
			   if(n9==undefined){n9=0;}
			   if(o9==undefined){o9=0;}
			   if(s9==undefined){s9=0;}
			   var k=b9+t9+r9+c9+m9+n9+o9+s9;
			  }
			  else if(num==9)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   var m9=eval(document.getElementById("m_9").value);
			   var n9=eval(document.getElementById("n_9").value);
			   var o9=eval(document.getElementById("o_9").value);
			   var s9=eval(document.getElementById("s_9").value);
			   var q9=eval(document.getElementById("q_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   if(m9==undefined){m9=0;}
			   if(n9==undefined){n9=0;}
			   if(o9==undefined){o9=0;}
			   if(s9==undefined){s9=0;}
			   if(q9==undefined){q9=0;}
			   var k=b9+t9+r9+c9+m9+n9+o9+s9+q9;
			  }
			  else if(num==10)
			  {
			   var b9=eval(document.getElementById("b_9").value);
			   var t9=eval(document.getElementById("t_9").value);
			   var r9=eval(document.getElementById("r_9").value);
			   var c9=eval(document.getElementById("c_9").value);
			   var m9=eval(document.getElementById("m_9").value);
			   var n9=eval(document.getElementById("n_9").value);
			   var o9=eval(document.getElementById("o_9").value);
			   var s9=eval(document.getElementById("s_9").value);
			   var q9=eval(document.getElementById("q_9").value);
			   var v9=eval(document.getElementById("v_9").value);
			   if(b9==undefined){b9=0;}
			   if(t9==undefined){t9=0;}
			   if(r9==undefined){r9=0;}
			   if(c9==undefined){c9=0;}
			   if(m9==undefined){m9=0;}
			   if(n9==undefined){n9=0;}
			   if(o9==undefined){o9=0;}
			   if(s9==undefined){s9=0;}
			   if(q9==undefined){q9=0;}
			   if(v9==undefined){v9=0;}
			   var k=b9+t9+r9+c9+m9+n9+o9+s9+q9+v9;
			  }
					document.getElementById("tm9").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm9").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p9").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm9").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_10()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p10").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			    if(b10==undefined){b10=0;}
				var k=b10;
			  }
			  else if(num==2)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   var k=b10+t10;
			  }
			  else if(num==3)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   var k=b10+t10+r10;
			  }
			  else if(num==4)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   var k=b10+t10+r10+c10;
			  }
			  else if(num==5)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   var m10=eval(document.getElementById("m_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   if(m10==undefined){m10=0;}
			   var k=b10+t10+r10+c10+m10;
			  }
			  else if(num==6)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   var m10=eval(document.getElementById("m_10").value);
			   var n10=eval(document.getElementById("n_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   if(m10==undefined){m10=0;}
			   if(n10==undefined){n10=0;}
			   var k=b10+t10+r10+c10+m10+n10;
			  }
			  else if(num==7)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   var m10=eval(document.getElementById("m_10").value);
			   var n10=eval(document.getElementById("n_10").value);
			   var o10=eval(document.getElementById("o_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   if(m10==undefined){m10=0;}
			   if(n10==undefined){n10=0;}
			   if(o10==undefined){o10=0;}
			   var k=b10+t10+r10+c10+m10+n10+o10;
			  }
			  else if(num==8)
			  {
			    var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   var m10=eval(document.getElementById("m_10").value);
			   var n10=eval(document.getElementById("n_10").value);
			   var o10=eval(document.getElementById("o_10").value);
			   var s10=eval(document.getElementById("s_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   if(m10==undefined){m10=0;}
			   if(n10==undefined){n10=0;}
			   if(o10==undefined){o10=0;}
			   if(s10==undefined){s10=0;}
			   var k=b10+t10+r10+c10+m10+n10+o10+s10;
			  }
			  else if(num==9)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   var m10=eval(document.getElementById("m_10").value);
			   var n10=eval(document.getElementById("n_10").value);
			   var o10=eval(document.getElementById("o_10").value);
			   var s10=eval(document.getElementById("s_10").value);
			   var q10=eval(document.getElementById("q_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   if(m10==undefined){m10=0;}
			   if(n10==undefined){n10=0;}
			   if(o10==undefined){o10=0;}
			   if(s10==undefined){s10=0;}
			   if(q10==undefined){q10=0;}
			   var k=b10+t10+r10+c10+m10+n10+o10+s10+q10;
			  }
			  else if(num==10)
			  {
			   var b10=eval(document.getElementById("b_10").value);
			   var t10=eval(document.getElementById("t_10").value);
			   var r10=eval(document.getElementById("r_10").value);
			   var c10=eval(document.getElementById("c_10").value);
			   var m10=eval(document.getElementById("m_10").value);
			   var n10=eval(document.getElementById("n_10").value);
			   var o10=eval(document.getElementById("o_10").value);
			   var s10=eval(document.getElementById("s_10").value);
			   var q10=eval(document.getElementById("q_10").value);
			   var v10=eval(document.getElementById("v_10").value);
			   if(b10==undefined){b10=0;}
			   if(t10==undefined){t10=0;}
			   if(r10==undefined){r10=0;}
			   if(c10==undefined){c10=0;}
			   if(m10==undefined){m10=0;}
			   if(n10==undefined){n10=0;}
			   if(o10==undefined){o10=0;}
			   if(s10==undefined){s10=0;}
			   if(q10==undefined){q10=0;}
			   if(v10==undefined){v10=0;}
			   var k=b10+t10+r10+c10+m10+n10+o10+s10+q10+v10;
			  }
					document.getElementById("tm10").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm10").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p10").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm10").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_11()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p11").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			    if(b11==undefined){b11=0;}
				var k=b11;
			  }
			  else if(num==2)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   var k=b11+t11;
			  }
			  else if(num==3)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   var k=b11+t11+r11;
			  }
			  else if(num==4)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   var k=b11+t11+r11+c11;
			  }
			  else if(num==5)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   var m11=eval(document.getElementById("m_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   if(m11==undefined){m11=0;}
			   var k=b11+t11+r11+c11+m11;
			  }
			  else if(num==6)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   var m11=eval(document.getElementById("m_11").value);
			   var n11=eval(document.getElementById("n_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   if(m11==undefined){m11=0;}
			   if(n11==undefined){n11=0;}
			   var k=b11+t11+r11+c11+m11+n11;
			  }
			  else if(num==7)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   var m11=eval(document.getElementById("m_11").value);
			   var n11=eval(document.getElementById("n_11").value);
			   var o11=eval(document.getElementById("o_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   if(m11==undefined){m11=0;}
			   if(n11==undefined){n11=0;}
			   if(o11==undefined){o11=0;}
			   var k=b11+t11+r11+c11+m11+n11+o11;
			  }
			  else if(num==8)
			  {
			    var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   var m11=eval(document.getElementById("m_11").value);
			   var n11=eval(document.getElementById("n_11").value);
			   var o11=eval(document.getElementById("o_11").value);
			   var s11=eval(document.getElementById("s_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   if(m11==undefined){m11=0;}
			   if(n11==undefined){n11=0;}
			   if(o11==undefined){o11=0;}
			   if(s11==undefined){s11=0;}
			   var k=b11+t11+r11+c11+m11+n11+o11+s11;
			  }
			  else if(num==9)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   var m11=eval(document.getElementById("m_11").value);
			   var n11=eval(document.getElementById("n_11").value);
			   var o11=eval(document.getElementById("o_11").value);
			   var s11=eval(document.getElementById("s_11").value);
			   var q11=eval(document.getElementById("q_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   if(m11==undefined){m11=0;}
			   if(n11==undefined){n11=0;}
			   if(o11==undefined){o11=0;}
			   if(s11==undefined){s11=0;}
			   if(q11==undefined){q11=0;}
			   var k=b11+t11+r11+c11+m11+n11+o11+s11+q11;
			  }
			  else if(num==10)
			  {
			   var b11=eval(document.getElementById("b_11").value);
			   var t11=eval(document.getElementById("t_11").value);
			   var r11=eval(document.getElementById("r_11").value);
			   var c11=eval(document.getElementById("c_11").value);
			   var m11=eval(document.getElementById("m_11").value);
			   var n11=eval(document.getElementById("n_11").value);
			   var o11=eval(document.getElementById("o_11").value);
			   var s11=eval(document.getElementById("s_11").value);
			   var q11=eval(document.getElementById("q_11").value);
			   var v11=eval(document.getElementById("v_11").value);
			   if(b11==undefined){b11=0;}
			   if(t11==undefined){t11=0;}
			   if(r11==undefined){r11=0;}
			   if(c11==undefined){c11=0;}
			   if(m11==undefined){m11=0;}
			   if(n11==undefined){n11=0;}
			   if(o11==undefined){o11=0;}
			   if(s11==undefined){s11=0;}
			   if(q11==undefined){q11=0;}
			   if(v11==undefined){v11=0;}
			   var k=b11+t11+r11+c11+m11+n11+o11+s11+q11+v11;
			  }
					document.getElementById("tm11").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm11").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p11").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm11").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  
		     function p_12()
		  {
		    if(xobj)
			 {				 
			var query="?con="+document.getElementById("p12").value;
			
			 xobj.open("GET","uc.php" +query ,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {
			    var b=xobj.responseText;
				var num=eval(document.getElementById("hide").value);
			  if(num==1)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			    if(b12==undefined){b12=0;}
				var k=b12;
			  }
			  else if(num==2)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   var k=b12+t12;
			  }
			  else if(num==3)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   var k=b12+t12+r12;
			  }
			  else if(num==4)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   var k=b12+t12+r12+c12;
			  }
			  else if(num==5)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   var m12=eval(document.getElementById("m_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   if(m12==undefined){m12=0;}
			   var k=b12+t12+r12+c12+m12;
			  }
			  else if(num==6)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   var m12=eval(document.getElementById("m_12").value);
			   var n12=eval(document.getElementById("n_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   if(m12==undefined){m12=0;}
			   if(n12==undefined){n12=0;}
			   var k=b12+t12+r12+c12+m12+n12;
			  }
			  else if(num==7)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   var m12=eval(document.getElementById("m_12").value);
			   var n12=eval(document.getElementById("n_12").value);
			   var o12=eval(document.getElementById("o_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   if(m12==undefined){m12=0;}
			   if(n12==undefined){n12=0;}
			   if(o12==undefined){o12=0;}
			   var k=b12+t12+r12+c12+m12+n12+o12;
			  }
			  else if(num==8)
			  {
			    var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   var m12=eval(document.getElementById("m_12").value);
			   var n12=eval(document.getElementById("n_12").value);
			   var o12=eval(document.getElementById("o_12").value);
			   var s12=eval(document.getElementById("s_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   if(m12==undefined){m12=0;}
			   if(n12==undefined){n12=0;}
			   if(o12==undefined){o12=0;}
			   if(s12==undefined){s12=0;}
			   var k=b12+t12+r12+c12+m12+n12+o12+s12;
			  }
			  else if(num==9)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   var m12=eval(document.getElementById("m_12").value);
			   var n12=eval(document.getElementById("n_12").value);
			   var o12=eval(document.getElementById("o_12").value);
			   var s12=eval(document.getElementById("s_12").value);
			   var q12=eval(document.getElementById("q_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   if(m12==undefined){m12=0;}
			   if(n12==undefined){n12=0;}
			   if(o12==undefined){o12=0;}
			   if(s12==undefined){s12=0;}
			   if(q12==undefined){q12=0;}
			   var k=b12+t12+r12+c12+m12+n12+o12+s12+q12;
			  }
			  else if(num==10)
			  {
			   var b12=eval(document.getElementById("b_12").value);
			   var t12=eval(document.getElementById("t_12").value);
			   var r12=eval(document.getElementById("r_12").value);
			   var c12=eval(document.getElementById("c_12").value);
			   var m12=eval(document.getElementById("m_12").value);
			   var n12=eval(document.getElementById("n_12").value);
			   var o12=eval(document.getElementById("o_12").value);
			   var s12=eval(document.getElementById("s_12").value);
			   var q12=eval(document.getElementById("q_12").value);
			   var v12=eval(document.getElementById("v_12").value);
			   if(b12==undefined){b12=0;}
			   if(t12==undefined){t12=0;}
			   if(r12==undefined){r12=0;}
			   if(c12==undefined){c12=0;}
			   if(m12==undefined){m12=0;}
			   if(n12==undefined){n12=0;}
			   if(o12==undefined){o12=0;}
			   if(s12==undefined){s12=0;}
			   if(q12==undefined){q12=0;}
			   if(v12==undefined){v12=0;}
			   var k=b12+t12+r12+c12+m12+n12+o12+s12+q12+v12;
			  }
					document.getElementById("tm12").value=k;
					var dep=eval(document.getElementById("dep").value);
			   var inst=eval(document.getElementById("inst").value);
			   var tm=eval(document.getElementById("tm12").value);
			   if(dep==undefined){  dep=0;  }	    
			   if(inst==undefined) { inst=0;  }
				   if(tm==undefined)  {  tm=0; }
				if(document.getElementById("p12").checked==true)
				 {   	 
			  	 	var c=tm+dep;
					var e=tm+inst;
				 document.getElementById("dep").value=c;
				document.getElementById("inst").value=e;			   
			   }
			   else  {
				    c=dep-tm;
					e=inst-tm;
					 document.getElementById("dep").value=c;
					document.getElementById("inst").value=e;								
					document.getElementById("tm12").value=0;  
			   } }  } }
			 xobj.send(null);
		  }	  

		  
		  function schl()
		  {
		    if(xobj)
			 {				
			 xobj.open("GET","get_schl_smry.php",true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txt").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }		
		  function hstl()
		  {
			  
		    if(xobj)
			 {				
			 xobj.open("GET","get_hstl_smry.php",true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txt").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }		
		  function acnt()
		  {
			  
		    if(xobj)
			 {				
			 xobj.open("GET","get_acnt_smry.php",true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("txt").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }		
		  function station_nm()
		  {
			 
		    if(xobj)
			 {		
			 var cl=document.getElementById("station").value;	
			 var st=document.getElementById("gndr").value;
			 var query="?con=" + cl + "&con1=" + st;
			 xobj.open("GET","get_station.php" + query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			 
			   document.getElementById("txt").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }		
		  function clas()
		  {
			
		    if(xobj)
			 {		
			 var query="?con="+document.getElementById("text1").value;		
			 xobj.open("GET","class_fetch.php" + query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			 
			   document.getElementById("txt").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }		
		  </script>
     
 
  <?php
}?>