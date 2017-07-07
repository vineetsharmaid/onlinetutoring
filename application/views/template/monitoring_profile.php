                                           
                                                <div class="col-md-3 col-sm-3 col-xs-3">
                                                    <ul class="nav nav-tabs tabs-left">
                                                        <li class="active">
                                                            <a href="#tab_6_1" data-toggle="tab"> Uppdragstyper </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_6_2" data-toggle="tab"> Kommuner </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_6_3" data-toggle="tab"> Typer av Kopare </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab_6_4" data-toggle="tab"> Uppdragsvarde </a>
                                                        </li>
                                                    </ul>

                                                    <!-- <div class="analys-profile">
                                                        <h3>Analys av din profil</h3>
                                                        <p>Various versions have evolved over the years, sometimes by accident.</p>
                                                        <h4><i class="fa fa-newspaper-o" aria-hidden="true"></i> Antal Forfragningar</h4>
                                                        <div class="rate-man">
                                                        37,8/ man
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="email-push">
                                                                    <i class="fa fa-envelope" aria-hidden="true"></i> Email
                                                                    <span>33,6/man</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="email-push">
                                                                    <i class="fa fa-phone" aria-hidden="true"></i> Phone
                                                                    <span>33,6/man</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->


                                                </div>
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_6_1">
                                                            <div class="distt-search">
                                                                <h2>Vilka uppdrag vill du bevaka?</h2>
                                                                <form class="search-form vilka-search" action="" method="GET">
                                                                    <div class="input-group">
                                                                        <input class="form-control" id="searchCat" placeholder="Sök" name="searchcategory"  type="text" >
                                                                        <span class="input-group-btn main-clearance">
                                                                            <a href="javascript:;" class="btn submit" id="searchContainer">
                                                                                <i class="fa fa-search"></i>
                                                                            </a>
                                                                        </span>                            
                                                                    </div>
                                                                </form>
                                                                <ul class="state-list">
                                                            
                                                                    <div class="panel-group " >
                                                                        <form method="post" id="undrag">
                                                                        <div class="panel panel-default">

                                                                            <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                    <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3">
                                                                                        <div class="row">
                                                                                            <div class="col-md-8">       
                                                                                                <div class="main-check web-design-heading">                                       
                                                                                                    Web / IT &amp; Design       
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <div class="select-check notifications-icons">
                                                                                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                                                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div >
                                                                                <div class="panel-body">
                                                                                    <div class="inner-distt-list">
                                                                                       <?php $selectBtn = 'Unselect'; ?>
                                                                                        <ul class="catList">
                                                                                            <li data-cat="graphic">
                                                                                                <div class="row">

                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="graphicdesign" value="0"/>
                                                                                                            <input name="graphicdesign" <?php if($uppdrag && $uppdrag['graphicdesign']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Graphic Design
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden"  name="graficpost" value="0"/>
                                                                                                                <input name="graficpost"  disabled <?php if($uppdrag && $uppdrag['graficpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden"  name="graficpush" value="0"/>
                                                                                                                <input name="graficpush" <?php if($uppdrag && $uppdrag['graficpush']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="webbutveckling">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="webbutveckling" value="0"/>
                                                                                                            <input name="webbutveckling" <?php if($uppdrag && $uppdrag['webbutveckling']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Webbutveckling
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden" name="Webbutpost" value="0"/>
                                                                                                                <input name="Webbutpost" disabled <?php if($uppdrag && $uppdrag['Webbutpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="Webbutpush" value="0"/>
                                                                                                                <input name="Webbutpush" <?php if($uppdrag && $uppdrag['Webbutpush']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="grafisk design">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="Grafisk" value="0"/>
                                                                                                            <input name="Grafisk" <?php if($uppdrag && $uppdrag['Grafisk']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Grafisk design
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden" name="Grafiskpost" value="0"/>
                                                                                                                <input name="Grafiskpost" disabled <?php if($uppdrag && $uppdrag['Grafiskpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="Grafiskpush" value="0"/>
                                                                                                                <input name="Grafiskpush" <?php if($uppdrag && $uppdrag['Grafiskpush']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="it support">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="support" value="0"/>
                                                                                                            <input name="support" <?php if($uppdrag && $uppdrag['support']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">IT-support
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden" name="supportpost" value="0"/>
                                                                                                                <input name="supportpost" disabled <?php if($uppdrag && $uppdrag['supportpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="supportpush" value="0"/>
                                                                                                                <input name="supportpush" <?php if($uppdrag && $uppdrag['supportpush']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="it hosting">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="hosting" value="0"/>
                                                                                                            <input name="hosting" <?php if($uppdrag && $uppdrag['hosting']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">IT-hosting
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden" name="hostingpost" value="0"/>
                                                                                                                <input name="hostingpost" disabled <?php if($uppdrag && $uppdrag['hostingpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                  <input type="hidden" name="hostingpush" value="0"/>
                                                                                                                <input name="hostingpush" <?php if($uppdrag && $uppdrag['hostingpush']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="mobilutveckling">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="Mobil" value="0"/>
                                                                                                            <input name="Mobil" <?php if($uppdrag && $uppdrag['Mobil']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Mobilutveckling
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden" name="Mobilpost" value="0"/>
                                                                                                                <input name="Mobilpost" disabled<?php if($uppdrag && $uppdrag['Mobilpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="Mobilpush" value="0"/>
                                                                                                                <input name="Mobilpush" <?php if($uppdrag && $uppdrag['Mobilpush']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="programmering">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                             <input type="hidden" name="prog" value="0"/>
                                                                                                            <input name="prog" <?php if($uppdrag && $uppdrag['prog']=='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Programmering
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                 <input type="hidden" name="progpost" value="0"/>
                                                                                                                <input name="progpost" disabled <?php if($uppdrag && $uppdrag['progpost']=='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="progpush" value="0"/>
                                                                                                                <input name="progpush" <?php if($uppdrag && $uppdrag['progpush'] =='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="sökmotoroptimering">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="torop" value="0"/>
                                                                                                            <input name="torop" <?php if($uppdrag && $uppdrag['torop'] =='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Sökmotoroptimering
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                 <input type="hidden" name="toroppost" value="0"/>
                                                                                                                <input name="toroppost" disabled <?php if($uppdrag && $uppdrag['toroppost'] =='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="toroppush" value="0"/>
                                                                                                                <input name="toroppush"  <?php if($uppdrag && $uppdrag['toroppush'] =='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="tryckeri profilprodukter">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="Tryckeri" value="0"/>
                                                                                                            <input name="Tryckeri" <?php if($uppdrag && $uppdrag['Tryckeri'] =='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Tryckeri & Profilprodukter
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                <input type="hidden" name="Tryckeripost" value="0"/>
                                                                                                                <input name="Tryckeripost" disabled <?php if($uppdrag && $uppdrag['Tryckeripost'] =='1'){echo "checked";}?>value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="Tryckeripush" value="0"/>
                                                                                                                <input name="Tryckeripush" <?php if($uppdrag && $uppdrag['Tryckeripush'] =='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-cat="webb it design - Övrigt">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-8">
                                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                            <input type="hidden" name="Webb" value="0"/>
                                                                                                            <input name="Webb" <?php if($uppdrag && $uppdrag['Webb'] =='1'){echo "checked";}else { $selectBtn = 'Select All'; }?> value="1" type="checkbox" class="mainCheck">Webb/IT & Design - Övrigt
                                                                                                            <span></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="select-check">
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                                 <input type="hidden" name="Webbpost" value="0"/>
                                                                                                                <input name="Webbpost" disabled<?php if($uppdrag && $uppdrag['Webbpost'] =='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                                <input type="hidden" name="Webbpush" value="0"/>
                                                                                                                <input name="Webbpush" <?php if($uppdrag && $uppdrag['Webbpush'] =='1'){echo "checked";}?> value="1" type="checkbox">
                                                                                                                <span></span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>           
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>  


                                                            

                                                                        <div class="service-save-btn">
                                                                            <button type="button"  class="btn purple select-all"><?php echo $selectBtn; ?></button>
                                                                            <button type="button"  class="btn purple undrags">Save</button>
                                                                        </div>
                                                                       </form>
                                                                    </div>








                                                                    <!-- <li>
                                                                        <a href="javascript:void(0);" id="distt-inner-list">
                                                                            <div class="row">
                                                                                <div class="col-md-8">                                                             
                                                                                  <button type="button" class="btn green">
                                                                                    <i id="btn-active" class="fa fa-caret-right"></i>
                                                                                   </button>                                                                        
                                                                                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                        <input name="remember" value="1" type="checkbox">Web / IT &amp; Design
                                                                                        <span></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="select-check">
                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                            <input name="remember" value="2" type="checkbox">
                                                                                            <span></span>
                                                                                        </label>
                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                            <input name="remember" value="3" type="checkbox">
                                                                                            <span></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                        <div class="inner-distt-list" id="inner-state-dep" style="display: none;">
                                                                            <ul>
                                                                                <li>
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">                                                             
                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                <input name="remember" value="1" type="checkbox">Graphic Design
                                                                                                <span></span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="select-check">
                                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                    <input name="remember" value="2" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                    <input name="remember" value="3" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">                                                             
                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                <input name="remember" value="1" type="checkbox">Web Hosting
                                                                                                <span></span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="select-check">
                                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                    <input name="remember" value="2" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                    <input name="remember" value="3" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">                                                             
                                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                <input name="remember" value="1" type="checkbox">Web Programming
                                                                                                <span></span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="select-check">
                                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline inline">
                                                                                                    <input name="remember" value="2" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                                    <input name="remember" value="3" type="checkbox">
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>                                                                             
                                                                            </ul>
                                                                        </div>
                                                                    </li> -->
                                                                   





                                                                </ul>



                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab_6_2">
                                                                
                                                            <div class="distt-search">
                                                                <h2>Vilka uppdrag vill du bevaka?</h2>
                                                                <form class="search-form vilka-search"  method="post">
                                                                    <div class="input-group">
                                                                        <input class="form-control" placeholder="Sök" name="query" type="text" id="searchCat2">
                                                                        <span class="input-group-btn main-clearance">
                                                                            <a href="javascript:;" class="btn submit" id="searchContainer2">
                                                                                <i class="fa fa-search"></i>
                                                                            </a>
                                                                        </span>                            
                                                                    </div>
                                                                </form>
                                                                <form class="search-form vilka-search" id="catidform" method="post">
                                                                <ul class="state-list">
                                                                    
                                                                    <div class="panel-group accordion" id="accordion3">
                                                                        <div class="row">
                                                                            
                                                                    <?php
                                                                    $selectBtnCat ='Unselect';
                                                                    $catlist=array();
                                                                    $k=1;
                                                                    foreach ($category as  $cat) {

                                                                        if(!in_array($cat['id'], $catlist)){
                                                                         
                                                                           if($k==1){
                                                                            echo "<div class='col-md-6'>";
                                                                           }
                                                                           if($k=='210'){
                                                                           echo "</div><div class='col-md-6'>";
                                                                           }
                                                                           $k++;
                                                                           
                                                                    ?>
                                                                <div class="panel panel-default catlist2" data-type='outer' data-id="<?php echo $cat['name']; ?>">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">                                                                            
                                                                            <div class="row">
                                                                                <div class="col-md-12">       
                                                                                    <div class="main-check">                                            
                                                                                        <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                            <input name="category[]" class="cat-check" value="<?php
                                                                                        echo $cat['id'];
                                                                                        ?>" type="checkbox"
                                                                                        <?php if(!empty($selcat['category']) &&in_array($cat['id'], $selcat['category'])){echo "checked";}else { $selectBtnCat = 'Select All'; }?>
                                                                                        ><?php
                                                                                        echo $cat['name'];
                                                                                        ?>
                                                                                            <span></span>
                                                                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_<?php echo $k;?>"></a>     
                                                                                        </label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </h4>
                                                                    </div>
                                                                    <div id="collapse_3_<?php echo $k;?>" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="inner-distt-list">
                                                                                <ul>
                                                                                    <?php
                                                                                     array_push($catlist, $cat['id']);
                                                                                    foreach ($category as  $sub) {
                                                                                        if($cat['id']==$sub['id']){
                                                                                        if(in_array($sub['id'], $catlist)){
                                                                                    ?>
                                                                                    <li class="inrli" data-type='inner' data-id="<?php echo $sub['sabcatname']; ?>">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">                                                           
                                                                                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                    <input name="subcategory[]" value="<?php
                                                                                    echo $sub['subid'];
                                                                                    ?>" type="checkbox"  <?php if(!empty($selcat['subcategory']) && in_array($sub['subid'], $selcat['subcategory'])){echo "checked";}?> ><?php
                                                                                    echo $sub['sabcatname'];
                                                                                    ?>
                                                                                    <span></span>
                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                <?php
                                                                            }
                                                                            }
                                                                            }
                                                                            ?>
                                                                                                                                     
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php                                                                    
                                                                        }
                                                                        $k++;
                                                                     } 
                                                                   
                                                                   ?>
                                                                            </div>

                                                                            <div class="service-save-btn col-md-12">
                                                                                <button type="button"  class="btn purple select-all-cat"><?php echo $selectBtnCat; ?></button>
                                                                                <button type="button" class="btn purple catidformsave">Save</button>
                                                                            </div>
                                                                       
                                                                        </div>
                                                                    </fom>
                                                                    </div>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab_6_3">
                                                            <div class="distt-search">

                                                                <h2>Vilka typer av tjanstekopare du vill jobba med?</h2>
                                                        <form></form>
                                                                <form method="post" id="typeuser">
                                                                <div class="inner-distt-list jobba-med">
                                                                   <?php $selectBtnP = 'Unselect'; ?>
                                                                    <ul>    
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                            <input class="checkPtype" name="private_person" value="1" type="checkbox" <?php if($usertypes && $usertypes['private_person'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?> >Privatperson
                                                                            <span></span>
                                                                            </label>
                                                                        </li>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="business" value="1" type="checkbox" <?php if($usertypes && $usertypes['business'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>företag
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="Builder_contractor" value="1" type="checkbox" <?php if($usertypes && $usertypes['Builder_contractor'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>Entreprenör
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                         <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="Byggherre" value="1" type="checkbox" <?php if($usertypes && $usertypes['Byggherre'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>Byggherre
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="Tenant" value="1" type="checkbox" <?php if($usertypes && $usertypes['Tenant'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>Bostadsrättsförening
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="villa_compound" value="1" type="checkbox" <?php if($usertypes && $usertypes['villa_compound']=='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>Villaförening
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="non-profit_association" value="1" type="checkbox" <?php if($usertypes && $usertypes['villa_compound'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>ideell förening
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input class="checkPtype" name="municipality_government" value="1" type="checkbox" <?php if($usertypes && $usertypes['villa_compound'] =='1'){ echo "checked"; }else { $selectBtnP = 'Select All'; }?>>kommun/Myndighet
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                       
                                                                    </ul>

                                                                    <div class="service-save-btn">
                                                                        <button type="button"  class="btn purple select-all-pType"><?php echo $selectBtnP; ?></button>
                                                                        <button type="button" class="btn purple usertypeid">Save</button>
                                                                    </div>
                                                                    
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab_6_4">
                                                            <form method="post" id="priceformid">
                                                            <div class="distt-search">
                                                                <h2>Vilka uppdragstorlekar du vill bevaka?</h2>
                                                          
                                                                <div class="inner-distt-list jobba-med">
                                                                    <ul>   
                                                                    <?php
                                                                        $selectBtnPrice = 'Unselect';
                                                                        function whatever($array, $key, $val) {
                                                                            foreach ($array as $item)
                                                                                if (isset($item[$key]) && $item[$key] == $val)
                                                                                    return true;
                                                                            return false;
                                                                        }
                                                                    ?>
                                                                    <?php foreach($priceList as $price)  { 

                                                                        $found = whatever($userPriceList, 'price_tag_id' , $price['id']);

                                                                        ?>
                                                                        <li>
                                                                            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                                                                                <input name="price[]" class="priceCheck" value="<?php echo $price['id'];?>" type="checkbox" <?php if($found) { echo "checked='checked'"; }else{ $selectBtnPrice = 'Select All'; } ?> >
                                                                                <?php echo number_format($price['min_range']);?> to <?php echo number_format($price['max_range']);?> kr
                                                                                <span></span>
                                                                            </label>
                                                                        </li>
                                                                        
                                                                        <?php } ?> 
                                                                    </ul>
                                                                    <div class="service-save-btn">
                                                                        <button type="button"  class="btn purple select-all-price"><?php echo $selectBtnPrice; ?></button>
                                                                        <button type="button" class="btn purple priceformsave">Spara</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>


                                            