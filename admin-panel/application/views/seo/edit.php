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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    .seo-title {
        margin: 0 0px 14px 10px;
    }
    </style>

</head>

<body>
    <!-- headder -->
    <div id="header-include">
        <?php $this->load->view('include/header.php'); ?>
    </div>
    <!-- end headder -->
    <!-- first layout -->
    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
                <div class="row">
                    <div id="sidemenu-include">
                        <?php $this->load->view('include/menu.php'); ?>
                    </div>

                    <div class="col m12 s12 l9">
                        <p class="h5-para black-text ">Edit SEO - <?php echo (!empty($result->page))?$result->page:''; ?></p>

                        <form action="<?php echo base_url() ?>seo/update" method="post" id="category-form"
                            enctype="multipart/form-data">

                            <div class="card">
                                <div class="card-content">
                                    <div class="form-container">
                                        <div class="row m0">
                                            <h6 class="seo-title">Page detail</h6>
                                            <div class="input-field col s12 l6">
                                                <input type="text" required="" id="page" name="page" class="validate"
                                                    value="<?php echo (!empty($result->page))?$result->page:''; ?>">
                                                <label for="page">Page <span class="red-text">*</span></label>
                                            </div>

                                            <input type="hidden" required="" id="id" name="id" class="validate"
                                                value="<?php echo (!empty($result->id))?$result->id:''; ?>">

                                            <div class="input-field col s12 l6">
                                                <input type="text" required="" id="title" name="title" class="validate"
                                                    value="<?php echo (!empty($result->title))?$result->title:''; ?>">
                                                <label for="title">Title <span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12 l12">
                                                <textarea id="can_url" name="can_url"
                                                    class="materialize-textarea"><?php echo (!empty($result->can_link))?$result->can_link:''; ?></textarea>
                                                <label for="can_url">Canonical Url</label>
                                            </div>


                                            <div class="input-field col s12 l12">
                                                <textarea id="keywords" required="" name="keywords"
                                                    class="materialize-textarea"><?php echo (!empty($result->keywords))?$result->keywords:''; ?></textarea>
                                                <label for="keywords">Keywords<span class="red-text">*</span></label>
                                            </div>

                                            <div class="input-field col s12">
                                                <textarea id="description" required="" name="description"
                                                    class="materialize-textarea"><?php echo (!empty($result->m_desc))?$result->m_desc:''; ?></textarea>
                                                <label for="description">Meta Description</label>
                                            </div>

                                            <div class="row m0">
                                                <div class="col s12 l12">
                                                    <label for="content" class="mb10">Content</label>
                                                    <textarea name="content" id="content" class="form-control col-md-7 col-xs-12"><?php echo (!empty($result->description))?$result->description:''; ?></textarea>
                                                </div>
                                            </div>


                                            <div class="col s12 mtb20">
                                                  <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit">Submit
                                                  <i class="fas fa-paper-plane right"></i>
                                                  </button>
                                                  <br>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                    </div>
                </div><!-- cad end -->


                </form>

            </div>
        </div>
        </div>
        </div>
    </section>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/tag.js"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor1/ckeditor.js"></script>

    <script>
    <?php $this->load->view('include/message.php'); ?>
    $(document).ready(function() {
        $('#tags').tagsInput({
            'defaultText': 'add a skills',
        });
    });
    </script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>