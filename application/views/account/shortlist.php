<?php 
$this->ci =& get_instance();
$this->load->model('m_account'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shaadi Baraati</title>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
</head>

<body>
    <div id="app">
        <!-- header -->
        <?php $this->load->view('includes/header.php'); ?>

        <!-- body  -->
        <section class="dsection">
            <div class="container-1">
                <div class="row m0">
                    <!-- left menu -->
                    <?php $this->load->view('includes/left-menu.php'); ?>
                    <!-- end left menu -->

                    <div class="col s12 m8 l9">
                        <div class="card">
                                <div class="chead">
                                        <p class="truncate">Shortlisted Vendor's</p>
                                    </div>
                            <div class="">
                                
                                <div class="cboady">
                                    <ul>

                                        <?php if (!empty($vendor)) { foreach ($vendor as $key => $value) {

                                            ?>
                                        <li>
                                            <div class="list-item">
                                                <div class="row m0">
                                                    <div class="col s12 m6 l6">
                                                        <div class="list-item-head">
                                                                <?php 

                                                                $category = $this->ci->m_account->getCategory($value->category);  
                                                                $cits =$this->ci->m_account->getCity($value->city);
                                                                ?>

                                                            <a href="<?php echo base_url(str_replace(" ","-",strtolower($category)).'/'.str_replace(" ","-",strtolower($cits)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq)?>" class="truncate"><?php echo $value->name ?></a>
                                                        </div>
                                                        <div class="span-div truncate">
                                                            <span><i class=" material-icons ">location_on</i> <?php echo $this->ci->m_account->getCity($value->city); ?></span>
                                                            <span><i class=" material-icons ">email</i> <?php echo $value->email ?></span>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col s6 m3 l3">
                                                        <a href="<?php echo base_url(str_replace(" ","-",strtolower($category)).'/'.str_replace(" ","-",strtolower($cits)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq)?>" class="rouded-btn ">Contact</a>
                                                    </div>
                                                    <div class="col s6 m3 l3">
                                                            <span class=" badge green"><i class=" material-icons ">star</i> <?php $review = $this->ci->m_account->getReview($value->id); 

                                                    if ($review) {
                                                    $ratingSum = 0;
                                                    foreach ($review as $rev => $revw) {
                                                    $ratingSum += $revw->rating;
                                                     $avg = $ratingSum / count($review);
                                            } 

                                            echo round($avg, 1); 


                                        }?>




                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    <?php } } ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                list:[
                    { id: '1' },
                    { id: '1' },
                    { id: '1' },
                    { id: '1' },
                    { id: '1' },
                    
                ]
            }
        });
    </script>
</body>

</html>