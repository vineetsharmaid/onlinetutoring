
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Din Aktivitet</span>
                    <span class="caption-helper hide">VeckoStatistik..</span>
                </div>
                <div class="actions">

                    <!-- <div class="btn-group btn-group-devided" data-toggle="buttons">

                     <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">Today</label>
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Week</label>
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Month</label>
                    </div> -->
                </div>
            </div>
            <div class="portlet-body">
                <div class="row number-stats margin-bottom-30">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="stat-left">
                            <div class="stat-chart">
                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                <div id="bid_projects" style="width:300px;"></div>                                
                            </div>
                            <!-- <div class="stat-number">
                                <div class="title"> Total </div>
                                <div class="number"> 2460 </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="stat-right">
                            <div class="stat-chart">
                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                <!-- <canvas id="won_projects"></canvas>  -->
                                <div id="won_projects" style="width:300px;"></div>  
                            </div>
                            <!-- <div class="stat-number">
                                <div class="title"> New </div>
                                <div class="number"> 719 </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="table-scrollable table-scrollable-borderless">
                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="uppercase">
                                <th colspan="2"> Kategori </th>
                                <!-- <th> Earnings </th> -->
                                <th> Totalt antal projekt </th>
                                <th> Status </th>
                                <th> Betyg </th>
                            </tr>
                        </thead>
                        <?php foreach($userTags as $tag) {  //echo "<pre>"; print_r($tag);?>
                        <tr>
                            <td class="fit">
                                <img class="user-pic" src="<?php echo base_url();?>/assets/uploads/user_avatar/<?php echo $query['image'];?>" onerror="this.onerror=null;this.src='https://placeholdit.imgix.net/~text?txtsize=19&amp;bg=efefef&amp;txtclr=aaaaaa%26amp%3Btext%3DNo%2BPicture&amp;txt=Ingen+Bild&amp;w=200&amp;h=150';">
                                <!-- <img src="https://placeholdit.imgix.net/~text?txtsize=19&amp;bg=efefef&amp;txtclr=aaaaaa%26amp%3Btext%3DNo%2BPicture&amp;txt=Ingen+Bild&amp;w=200&amp;h=150" onerror="this.onerror=null;this.src='https://placeholdit.imgix.net/~text?txtsize=19&amp;bg=efefef&amp;txtclr=aaaaaa%26amp%3Btext%3DNo%2BPicture&amp;txt=Ingen+Bild&amp;w=200&amp;h=150';" id="setimage" alt=""> -->
                                 </td>
                            <td>
                                <a href="javascript:;" class="primary-link"><?php echo $tag['tag_name'];?></a>
                            </td>
                            <!-- <td> $345 </td> -->
                            <td> <?php echo $tag['projectCount'];?> </td>
                            <td> 124 </td>
                            <td>
                                <span class="bold theme-font">80%</span>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- END PORTLET -->
    </div>
</div>

<!-- pop up for ask admin -->
<div id="askAdmin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kundtjänst</h4>
      </div>
        <form name="askAdminForm" ng-submit="askAdmin()" novalidate>
          <div class="modal-body">
                <div class="form-group">
                    <label>Ange Ämne</label>
                    <p id="subject" style="display:none">Ange ämnet</p>
                    <input name="subject" id='formSubject' ng-model="askAdmin.subject"  class="form-control" placeholder="Enter your subject here" required>
                </div>
                <div class="form-group">
                    <label>Ange din fråga</label>
                    <p id="description" style="display:none">Ange beskrivning</p>
                    <textarea name="description" id='formDescription' ng-model="askAdmin.description" class="form-control" placeholder="Describe about your problem" required></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
            <input type="submit" class="btn green askAdmin" value="Submit" ng-disabled="askAdminForm.$invalid">
          </div>
        </form>
    </div>

  </div>
</div>
<!-- # pop up for ask admin -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <span class="caption-subject font-blue-madison bold uppercase">Kundtjänst</span>
                    <span class="caption-helper"><?php echo sizeof($userQueries); ?> pending &nbsp; &nbsp;<a href="javascript:void(0)" data-toggle="modal" data-target="#askAdmin"><span><i class="fa fa-plus"></i></span></a></span>
                </div>
                <!-- <div class="inputs">
                    <div class="portlet-input input-inline input-small ">
                        <div class="input-icon right">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-control-solid" placeholder="search..."> </div>
                    </div>
                </div> -->
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                    <div class="general-item-list">
                        <?php foreach($userQueries as $query) { //echo "<pre>"; print_r($query); ?>
                        <div class="item">
                            <div class="item-head">
                                <div class="item-details">
                                    <img class="item-pic" src="<?php echo base_url();?>/assets/uploads/user_avatar/<?php echo $query['image'];?>" onerror="this.onerror=null;this.src='https://placeholdit.imgix.net/~text?txtsize=19&amp;bg=efefef&amp;txtclr=aaaaaa%26amp%3Btext%3DNo%2BPicture&amp;txt=Ingen+Bild&amp;w=200&amp;h=150';">
                                    <a href="" class="item-name primary-link"><?php echo $query['subject'];?></a>
                                    <span class="item-label"><?php echo $query['created_dt'];?></span>
                                </div>
                                <span class="item-status">
                                    <?php if($query['active']) {?>
                                    <span class="badge badge-empty badge-success"></span> Open</span>
                                    <?php }else { ?>
                                        <span class="badge badge-empty badge-warning"></span> Closed</span>
                                    <?php } ?>
                            </div>
                            <div class="item-body"><?php echo $query['description'];?> </div>
                            <?php if($query['answer'] && $query['answer'] !='') {?>
                            <div class="item-body"><b>Reply from admin:</b> <?php echo $query['answer'];?> </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET -->
    </div>
</div>

