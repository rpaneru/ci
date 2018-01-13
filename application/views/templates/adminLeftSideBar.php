<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- search form -->
<!--      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">        
        <?php
        foreach ($dataParam as $controller => $methods)
        {
        ?>
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span><?php echo str_replace(".php","", $controller) ; ?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                    foreach ($methods as $method)
                    {
                    ?>
                        <li><a href="<?php echo base_url();?>index.php/"><i class="fa fa-circle-o"></i> <?php echo ucfirst( preg_replace('/[A-Z]/', ' $0', $method)  ); ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </li>
        <?php
        }
        ?>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>