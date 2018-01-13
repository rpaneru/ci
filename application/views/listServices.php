<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Services
            <small>List Services</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List Services</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Controller</th>
                                    <th>Method</th>
                                    <th>Profile Type</th>
                                    <th>Left Menu</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($dataParam as $controller => $methods)
                            {
                                foreach ($methods as $method)
                                {

                                ?>
                                    <tr>
                                        <td><?php echo str_replace(".php","", $controller) ; ?></td>
                                        <td><?php echo ucfirst( preg_replace('/[A-Z]/', ' $0', $method)  ); ?></td>
                                        <td><?php profileTypeDropDown();?></td>
                                        <td>
                                            <label>Yes</label>
                                            <label>
                                                <input type="radio" name="show_<?php echo $controller."_".$method; ?>" value="Yes" class="minimal" >
                                            </label>
                                            <label>No</label>
                                            <label>
                                                <input type="radio" name="show_<?php echo $controller."_".$method; ?>" value="No" class="minimal" checked="checked">
                                            </label>
                                        </td>
                                        <td><button type="button" class="btn btn-block btn-primary">Primary</button></td>
                                    </tr>
                                <?php
                                }                    
                            }
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Controller</th>
                                    <th>Method</th>
                                    <th>Profile Type</th>
                                    <th>Left Menu</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

  
