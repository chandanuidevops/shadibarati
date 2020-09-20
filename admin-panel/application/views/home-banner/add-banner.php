<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
        
        <style type="text/css">
        .dash-list a .list-dashboard{transition: 0.5s}
        .dash-list a:hover .list-dashboard{transform: scale(1.1);background: #f3f3f3 !important}
        .container-banner.l1 .card-image, .container-banner.r1 .card-image, .container-banner.l2 .card-image, .container-banner.r2 .card-image {
    min-height: 200px;
    background: rgba(192, 192, 192, 0.21);
    max-height: 200px;
    overflow: hidden;
}
.btn-floating.halfway-fab {
    position: absolute;
    right: 24px;
    bottom: 12px;
}
.btn-floating.halfway-fab.left {
    right: auto;
    left: 4px;
    top: 4px;
}

.btn-floating i {
    width: inherit;
    display: inline-block;
    text-align: center;
    color: #fff;
    font-size: 16px;
    line-height: 40px;
}

.btn-floating i:hover {
    background: green;
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
                        <div class="card m0">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <!-- L1 -->
                                        <?php $img1=''; $id='';  if (!empty($banner)) {
                                            foreach ($banner as $key => $value) {
                                                if ($value->position == 'l1') {
                                                    $img1 = (!empty($value->img))?$value->img:'';
                                                    $id= $value->id;
                                                }
                                            }
                                        }  ?>
                                        <div class="container-banner l1">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <?php if (!empty($img1)) { ?>
                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('h_banner/delete/?id=').$id; ?>" class="btn-floating halfway-fab waves-effect waves-light orange left"><i class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    
                                                    <img src="<?php echo $this->config->item('web_url').'/'.$img1 ?>" class="activator">
                                                    <span class="card-title">L1</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger aa" href="#modal1" data-id="l1"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- L2 -->
                                        <?php  
                                        $img2 ='';

                                            $id2='';
                                        if (!empty($banner)) {
                                            foreach ($banner as $key => $value) {
                                                if ($value->position == 'l2') {
                                                    $img2 = (!empty($value->img))?$value->img:'';
                                                    $id2= $value->id;
                                                }
                                            }
                                        }  ?>
                                        <div class="container-banner l2">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <?php if (!empty($img2)) { ?>
                                                    <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('h_banner/delete/?id=').$id2; ?>" class="btn-floating halfway-fab waves-effect waves-light orange left"><i class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>

                                                    <img src="<?php echo $this->config->item('web_url').'/'.$img2 ?>" class="activator">
                                                    <span class="card-title">L2</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger aa" href="#modal1" data-id="l2"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- C1 -->
                                    
                                    <div class="col s12 m5 right">
                                        <!--  R1 -->
                                        <?php  $id3=''; $img3 =''; if (!empty($banner)) {
                                            foreach ($banner as $key => $value) {
                                                if ($value->position == 'r1') {
                                                    $img3 = (!empty($value->img))?$value->img:'';
                                                    $id3= $value->id;
                                                }
                                            }
                                        }  ?>
                                        <div class="container-banner r1">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <?php if (!empty($img3)) { ?>
                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('h_banner/delete/?id=').$id3; ?>" class="btn-floating halfway-fab waves-effect waves-light orange left"><i class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>

                                                    <img src="<?php echo $this->config->item('web_url').'/'.$img3 ?>" class="activator">
                                                    <span class="card-title">R1</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger aa" href="#modal1" data-id="r1"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- R2  -->
                                        <?php $id4=''; $img4 =''; if (!empty($banner)) {
                                            foreach ($banner as $key => $value) {
                                                if ($value->position == 'r2') {
                                                    $img4 = (!empty($value->img))?$value->img:'';
                                                    $id4= $value->id;
                                                }
                                            }
                                        }  ?>
                                        <div class="container-banner r2">
                                            <div class="card">
                                                <div class="card-image valign-wrapper">
                                                    <?php if (!empty($img4)) { ?>
                                                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('h_banner/delete/?id=').$id4; ?>" class="btn-floating halfway-fab waves-effect waves-light orange left"><i class="fas fa-trash-alt"></i></a>
                                                    <?php } ?>
                                                    <img src="<?php echo $this->config->item('web_url').'/'.$img4 ?>" class="activator">
                                                    <span class="card-title">R2</span>
                                                    <a class="btn-floating halfway-fab waves-effect waves-light red modal-trigger aa" href="#modal1" data-id="r2"><i class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(empty($banner)){
                                echo '<h3 class="center">No result found</h3>';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Structure -->
<div id="modal1" class="modal">
    <form action="<?php echo base_url() ?>h_banner/update" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="modal-content">
            <h6 class="bold">Change Banner Article</h6>
            <br>
            <input type="hidden" name="postion">
            <div class="row">
                <div class="col s12">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Select Image</span>
                            <input type="file" name="img" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" name="filepath" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12 l12">
                        <input type="text" id="link" name="link" class="validate">
                        <label for="link">LInk </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light green darken-4 hoverable btn-small" type="submit">Submit <i class="fas fa-paper-plane right"></i> </button>
            <a href="#!" class="modal-close waves-effect waves-red hoverable red btn-small">Close <i class="fas fa-times right"></i></a>
        </div>
    </form>
</div>
    <!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    
    <script>
    <?php $this->load->view('include/message.php'); ?>;
    $(document).ready( function () {
    $('select').formSelect();
    $('.modal').modal();


    $('.container-banner .card-image .aa').click(function (e) {
        e.preventDefault();
        var position = $(this).attr('data-id');
        $('input[name=postion]').val(position);
        $.ajax({
            type: "post",
            url: "<?php echo base_url() ?>h_banner/singleData",
            data: {position : position},
            dataType: "json",
            success: function (res) {
                    $('input[name=link]').val(res.link);
                    $('.file-path').val(res.img);
               }
        });
    
    });


    $(document).on('change', 'input[type=radio]', function (e) {
    e.preventDefault();
    var radio = $(this).val();
    if(radio == 'article'){
    $('.article-box').fadeIn(800);
    $('.custom-box').fadeOut(0);
    }
    else if(radio == 'custom'){
    $('.custom-box').fadeIn(800);
    $('.article-box').fadeOut(0);
    }
    else{
    $('.custom-box, .article-box').fadeOut(0);
    }
    });
    function changePosition(radio){
    if(radio == 'article'){
    $('.article-box').fadeIn(800);
    $('.custom-box').fadeOut(0);
    }
    else if(radio == 'custom'){
    $('.custom-box').fadeIn(800);
    $('.article-box').fadeOut(0);
    }
    else{
    $('.custom-box, .article-box').fadeOut(0);
    }
    }


    $('.edits-btn').click(function (e) { 
                e.preventDefault();
                var position = $(this).attr('data-id');

                console.log(position);


                $('input[name=postion]').val(position);
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() ?>h_banner/singleData",
                    data: {position : position},
                    dataType: "json",
                    success: function (res) {
                        console.log(res);
                        
                            // $("input[value=custom]").prop("checked", true);
                            // $('input[name=ctitle]').val(res.title);
                            // $('input[name=curl]').val(res.link);
                            // $('.file-path').val(res.img);
                       

                    }
                });
            });


    });
    </script>
</body>
</html>