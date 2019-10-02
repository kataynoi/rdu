<div class="sidebar w3-theme-l5" role="navigation" style="padding-top: 15px;margin-top: 54px;">
    <div class="sidebar-nav navbar-collapse" id="left_slide" >
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" id="txt_search_link" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="btn_search_link">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?php echo site_url();?>"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo site_url('admin_drug_opd')?>"><i class="far fa-calendar-check"> รายการยา </i></a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>

<script src="<?php echo base_url() ?>assets/apps/js/search.js" charset="utf-8"></script>
