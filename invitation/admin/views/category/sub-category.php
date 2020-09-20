<!DOCTYPE html>
<html>

   <head>
      <title><?php echo $title ?></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dataTable/button/css/buttons.dataTables.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <style type="text/css">
         .dash-list a .list-dashboard{transition: 0.5s}
         .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
         .col-btn a {
    background: 
    transparent;
    margin-right: 10px;
}

.col-btn a {
    background: transparent; 
    margin-right: 10px;
}
.collapsible-header{

    display: block !important;
    padding: 2rem;
}
      
      </style>
   </head>
   <body>
      <!-- headder -->
         <div id="header-include">
           <?php $this->load->view('include/header.php'); ?>
         </div>
      <!-- end headder -->
      <!-- main layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="row">
              <!-- menu  -->

              <div id="sidemenu-include">
                <?php $this->load->view('include/menu.php'); ?>
              </div>


               <div class="col m12 s12 l9">
                    <div class="row">
                       <div class="col s12 m10 l10">
                          <h5 class="center mb15 ">Manage category</h5>
                       <ul class="collapsible popout ">
                          <?php foreach ($result as $key => $value) { ?>
                              <li>
                                 <div class="collapsible-header h4 col-btn">
                                    <div class="left">
                                       <?php echo $value->title ?> 
                                    </div> 

                                      <div class="right">
                                       <a class="right green-text add-btn  modal-trigger tooltipped" href="#modal1" data-id="<?php echo $value->id?>" data-position="bottom" data-tooltip="Click here add new sub category">
                                          <i class="material-icons m0">add</i>
                                       </a>
                                       </div>
                                 </div>
                                 <div class="collapsible-body p0">
                                    <ul class="collection">
                                       <?php if(!empty($value->sub)) { 
                                                foreach ($value->sub as $skey => $row) {
                                       ?>
                                          <li class="collection-item col-btn">
                                             <div><?php echo $row->title ?>
                                                <a  class="right red-text  delete-btn" href="<?php echo base_url('category/sub-category-delete/').$row->id ?>"><i class="material-icons">delete</i></a> 
                                                <a  class="right blue-text edit-btn2  modal-trigger" href="#modal2" data-id="<?php echo $row->id?>" data-content="<?php echo $row->title?>"><i class="material-icons">edit</i></a> 
                                             </div>
                                          </li>
                                       <?php }}?>
                                    </ul>
                                 </div>
                              </li>
                              
                          <?php } ?>
                           </ul>
                       </div>
                    </div>

               </div>
            </div>
         </div>
      </section>
      <div id="modal1" class="modal small-modal-1">
         <div class="modal-content">
             
             <form method="post" action="<?php echo base_url('category/sub-category-add') ?>">
                 
                 <div class="row m0">
                    <h6 class="m-title col">Add Sub Category</h6>
                     <div class="input-field col s12">
                       <input type="text" id="category" name="category" placeholder="" class="validate" autofocus="" required="" value="">
                       <label for="category" class="active">Title <span class="red-text">*</span></label>
                       <input type="hidden" id="ctid" name="ctid" value="">
                     </div>
                 </div> 
                 <div class="modal-footer">
                     <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit
                         <i class="fas fa-paper-plane right"></i>
                     </button>
                  <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i class="fas fa-times right"></i></a>
               </div>                                            
            </form>
         </div>
      </div>

      <div id="modal2" class="modal small-modal-1">
         <div class="modal-content">
             
             <form method="post" action="<?php echo base_url('category/sub-category-edit') ?>">
                 
                 <div class="row m0">
                    <h6 class="m-title col">Edit Sub Category</h6>
                     <div class="input-field col s12">
                       <input type="text" id="scategory" name="category" placeholder="" class="validate" autofocus="" required="" value="">
                       <label for="category" class="active">Title <span class="red-text">*</span></label>
                       <input type="hidden" id="id" name="id" value="">
                     </div>
                 </div> 
                 <div class="modal-footer">
                     <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit
                         <i class="fas fa-paper-plane right"></i>
                     </button>
                  <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i class="fas fa-times right"></i></a>
               </div>                                            
            </form>
         </div>
      </div>



      <!-- end footer -->
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
      

     
    <script>
       <?php $this->load->view('include/message.php'); ?>;
        $(document).ready( function () {
          $('.tooltipped').tooltip();
            $('select').formSelect();
            $('.modal').modal();
            $('.collapsible').collapsible();
            $('.add-btn').click(function (e) { 
               e.preventDefault();
               var id  = $(this).attr('data-id');
               $('#ctid').val(id);
            });

            $('.delete-btn').click(function (e) { 
               if(confirm('Are you sure to delete?')){
                  return true;
               }
               return false;
            });

            $('.edit-btn2').click(function (e) { 
               e.preventDefault();
               var id  = $(this).attr('data-id');
               $('#id').val(id);
               $('#scategory').val($(this).attr('data-content'));
            });
            

           
      
        });
    </script>
</body>
</html>
