<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb"> <a href="<?php echo base_url(); ?>dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item ">Zone List</span> <span class="breadcrumb-item active"> Add Zone </span> </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
    </div>
</div>
<!-- /page header --> 
<?php
$heading=isset($result['value']['id'])?'Edit Zone':'Add Zone';
?>
<!-- Content area -->
<div class="content"> 

    <!-- Main Form -->
    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            <h6 class="card-title"><?php echo $heading; ?></h6>
            <div class="header-elements">
                <div class="list-icons"> <a class="list-icons-item" data-action="collapse"></a> <a class="list-icons-item" data-action="reload"></a> </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <?php
                if (isset($this->session->flashdata('temp_data')['color']) || isset($this->session->flashdata('temp_data')['msg']) || !empty(validation_errors())) {
                    $color = $this->session->flashdata('temp_data')['color'];
                    $msg = $this->session->flashdata('temp_data')['msg'];
                    ?>
                    <div class="<?php echo $color; ?>" <?php if (!empty($color) && !empty($msg))  ?>>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                
                        <?php echo validation_errors(); ?>
                        <?php echo $msg; ?>
                    </div>
                <?php } ?>
            </div>
            <form class="" name="zone_form" action="<?php echo site_url('master') . $url; ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Zone Name</label>
                            <input class="form-control" type="text" name="zone" placeholder="Enter Zone Name" value="<?php echo isset($result['value']['zone']) ? $result['value']['zone'] : ''; ?>"required>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary legitRipple">Submit<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Main Form --> 

</div>
<!-- /content area --> 
