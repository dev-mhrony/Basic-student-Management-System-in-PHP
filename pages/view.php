 <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
--><?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');
    $obj=new DbFunction();
	$rs=$obj->showstudents();
   

	if(isset($_GET['del']))
    {    
         
		  $obj->del_std(intval($_GET['del']));
    }

?>
 <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->

 <!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">
     <title>View Students</title>
     <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
     <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
     <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
     <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
     <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 </head>
 <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->

 <body>

     <div id="wrapper">

         <!-- Navigation -->

         <?php include('leftbar.php')?>;
         <nav>
             <div id="page-wrapper">
                 <div class="row">
                     <div class="col-lg-12">
                         <h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
                     </div>
                     <div style="padding-top: 10px;">
                         <marquee onMouseOver="this.stop()" onMouseOut="this.start()"> <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> is the sole owner of this script. It is not suitable for personal use. And releasing it in demo version. Besides, it is being provided for free only from <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>. For any of your problems contact us on <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a> facebook group / page or message <a href="https://www.facebook.com/dev.mhrony">MH RONY</a> on facebook. Thanks for staying with <a href="https://www.youtube.com/@codecampbdofficial">Code Camp BD</a>.</marquee>
                     </div>
                     <!-- /.col-lg-12 -->
                 </div>
                 <!-- /.row -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="panel panel-default">
                             <div class="panel-heading">
                                 View Students
                             </div>
                             <!-- /.panel-heading -->
                             <div class="panel-body">
                                 <div class="dataTable_wrapper">
                                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                         <thead>
                                             <tr>
                                                 <th>SNo</th>
                                                 <th>RegNo</th>
                                                 <th>Name</th>
                                                 <th>Email</th>
                                                 <th>MobNO</th>
                                                 <th>Course</th>
                                                 <th>Subject</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>

                                             <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){
									 
	                                  $c=$res->course;
									  $cname=$obj->showCourse1($c);
									  $res1=$cname->fetch_object();
									  
									 ?>
                                             <tr class="odd gradeX">
                                                 <td><?php echo $sn?></td>
                                                 <td><?php echo htmlentities( strtoupper($res->regno));?></td>
                                                 <td><?php echo htmlentities(strtoupper($res->fname." ".$res->mname." ".$res->lname));?></td>
                                                 <td><?php echo htmlentities(strtoupper($res->emailid));?></td>
                                                 <td><?php echo htmlentities($res->mobno);?></td>
                                                 <td><?php echo htmlentities(strtoupper($res1->cshort));?></td>
                                                 <td><?php echo htmlentities(strtoupper($res->subject));?></td>
                                                 <td>&nbsp;&nbsp;<a href="edit-std.php?id=<?php echo htmlentities($res->id);?>">
                                                         <p class="fa fa-edit"></p>
                                                     </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     <a href="view.php?del=<?php echo htmlentities($res->id); ?>">
                                                         <p class="fa fa-times-circle"></p>

                                                 </td>

                                             </tr>

                                             <?php $sn++;}?>
                                         </tbody>
                                     </table>
                                 </div>
                                 <!-- /.table-responsive -->

                             </div>
                             <!-- /.panel-body -->
                         </div>
                         <!-- /.panel -->
                     </div>
                     <!-- /.col-lg-12 -->
                 </div>
                 <!-- /.row -->
                 <p style="text-align: center;"> CopyRight by <a href="">Code Camp BD</a> Design and Developer <a href="">MH RONY</a> All Resalve 2023</p>



             </div>
             <!-- /#page-wrapper -->

     </div>
     <!-- /#wrapper -->

     <!-- jQuery -->
     <script src="../bower_components/jquery/dist/jquery.min.js"></script>

     <!-- Bootstrap Core JavaScript -->
     <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

     <!-- Metis Menu Plugin JavaScript -->
     <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

     <!-- DataTables JavaScript -->
     <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
     <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

     <!-- Custom Theme JavaScript -->
     <script src="../dist/js/sb-admin-2.js"></script>

     <!-- Page-Level Demo Scripts - Tables - Use for reference -->
     <script>
     $(document).ready(function() {
         $('#dataTables-example').DataTable({
             responsive: true
         });
     });
     </script>

 </body>

 </html>