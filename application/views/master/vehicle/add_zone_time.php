<!-- Page header -->
<div class="page-header page-header-light">
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb"> <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a> <span class="breadcrumb-item ">Zone Time List</span> <span class="breadcrumb-item active"> Add Zone Time </span> </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a> </div>
    </div>
</div>
<!-- /page header --> 
<?php
$heading=isset($result['value']['id'])?'Edit Zone Time':'Add Zone Time';
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
            <form class="" name="zone_time_form" action="<?php echo site_url('master') . $url; ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zone: <span class="text-danger">*</span></label>
                            <select data-placeholder="Select Zone" class="form-control select-search" name="zone_id" data-fouc required>
                                <option></option>

                                <?php
                                if (isset($result['value']['zone_id'])) {
                                    foreach ($masterZoneArr['value'] as $mkey => $mval) {
                                        ?>
                                        <option value="<?php echo $mval['id']; ?>" <?php if ($mval['id'] == $result['value']['zone_id']): ?> selected="selected"<?php endif; ?>><?php echo $mval['zone']; ?></option>
                                    <?php
                                    }
                                } else {
                                    foreach ($masterZoneArr['value'] as $mkey => $mval) {
                                        ?>
                                        <option value="<?php echo $mval['id']; ?>"><?php echo $mval['zone']; ?></option>  
    <?php }
}
?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <input class="form-control" type="number" name="time" placeholder="Enter Time (In Miunte)" value="<?php echo isset($result['value']['time']) ? $result['value']['time'] : ''; ?>" required>
                        </div>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Main Form --> 

</div>
<!-- /content area --> 