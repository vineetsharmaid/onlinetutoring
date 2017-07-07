<div class="col-md-12">
    <div class="portlet light ">
        <div class="portlet-title tabbable-line">
            <div class="caption caption-md">
                <i class="icon-globe theme-font hide"></i>
                <span class="caption-subject font-blue-madison bold uppercase">Konto</span>
            </div>
            <ul id="settingdiv" class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_15" data-toggle="tab">Personlig information</a>
                </li>
                <li >
                    <a href="#compnay_logo" data-toggle="tab">Logga</a>
                </li>
                <li>
                    <a href="#tab_1_16" data-toggle="tab">Ändra Avatar</a>
                </li>
                <li>
                    <a href="#tab_1_17" data-toggle="tab">Ändra lösenord</a>
                </li>
                <!-- <li>
                    <a href="#tab_1_18" data-toggle="tab">Privacy Settings</a>
                </li> -->
            </ul>
        </div>
        <div class="portlet-body">
            <div class="tab-content" ng-controller="AccountController">
                <!-- PERSONAL INFO TAB -->
                <div class="tab-pane active" id="tab_1_15">
                    <div class="alert alert-danger persinalerror" style="display:none"></div>
                    <div class="alert alert-success persionalformsucess" style="display:none"></div>
                    <form role="form" id="profileform" method="post" ng-submit="submit()" >

                        <!-- <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input placeholder="John" class="form-control" type="text" name="firstname" value="<?php if($firstname){ echo $firstname; }?>"> </div>
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input placeholder="Doe" class="form-control" type="text" name="lastname" ng-model="lastname" value="<?php if($lastname){echo $lastname; }?>" > </div> -->
                        <div class="form-group">
                            <label class="control-label">Användarnamn</label>
                            <input placeholder="Doe" class="form-control" type="text" name="username" ng-model="username" value="<?php if($username){echo $username; }?>" > </div>   
                        <div class="form-group">
                            <label class="control-label">Mobilnummer</label>
                            <input placeholder="+1 646 580 DEMO (6284)" class="form-control" name="mobnumber" ng-model="firstname" type="text" value="<?php if($mobnumber){ echo $mobnumber; }?>"> </div>
                        <div class="form-group">
                            <label class="control-label">Specieal Områden</label>
                            <input placeholder="Design, Web etc." class="form-control" name="Interests"  ng-model="Interests" type="text" value="<?php if($Interests){ echo $Interests; }?>"> </div>
                        <div class="form-group">
                            <label class="control-label">Företagsroll</label>
                            <input placeholder="Företagsroll" class="form-control" type="text" name="Occupation" value="<?php if($Occupation){ echo $Occupation; }?>"> </div>
                        <div class="form-group">
                            <label class="control-label">Om Oss</label>
                            <textarea class="form-control" rows="3" placeholder="We are Awesome!!!" name="about"><?php if($Occupation){ echo $Occupation; }?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Website Url</label>
                            <input placeholder="http://www.mywebsite.com" class="form-control" type="text" name="web_url" value="<?php if($web_url){ echo $web_url; }?>"> </div>
                        <div class="margiv-top-10">
                            <input type="submit" class="btn green submitBtn" value="Save Changes">  
                            <a href="javascript:;" class="btn default"> Annullera </a>
                        </div>
                    </form>
                </div>
                <!-- END PERSONAL INFO TAB -->

                <!-- CHANGE COMPANY LOGO TAB -->
                <div class="tab-pane" id="compnay_logo">
                    <!-- <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                        laborum eiusmod. </p> -->
                        <div class="alert alert-danger logoerr" style="display:none"></div>
                        <div class="alert alert-success logoformsucess" style="display:none"></div>
                    <form method="post" id="logoform" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php if($company_logo){echo  base_url().'assets/uploads/company_logo/'.$company_logo;} ?>" onerror="this.onerror=null;this.src='https://placeholdit.imgix.net/~text?txtsize=19&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3DNo%2BPicture&txt=Ingen+Bild&w=200&h=150';" id="setimageLogo" alt=""> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Välj logga </span>
                                        <span class="fileinput-exists"> Byta </span>
                                        <input name="image" type="file" id="fileinputLogo"> 
                                        <input type="hidden" name="hiddenImageLogo" id="hiddenImageLogo">
                                    </span>
                                    <!-- <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="margin-top-10">
                         <input type="submit" class="btn green submitlogo" value="Spara logga">  
                        </div>
                    </form>
                </div>
                <!-- END CHANGE COMPANY LOGO TAB -->

                <!-- CHANGE AVATAR TAB -->
                <div class="tab-pane" id="tab_1_16">
                    <p> Nedan kan du ladda upp en avatar som blir en profilbild till ditt företag som kunderna sedan kommer att kunna se.</p>
                        <div class="alert alert-danger avtarerror" style="display:none"></div>
                        <div class="alert alert-success avtarformsucess" style="display:none"></div>
                    <form method="post" id="avtarform" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php if($image){echo  base_url().'assets/uploads/user_avatar/'.$image;}?>" onerror="this.onerror=null;this.src='https://placeholdit.imgix.net/~text?txtsize=19&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3DNo%2BPicture&txt=Ingen+Bild&w=200&h=150';" id="setimage" alt=""> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Välj logga </span>
                                        <span class="fileinput-exists"> Byta </span>
                                        <input name="image" type="file" id="fileinput"> 
                                        <input type="hidden" name="hiddenImage" id="hiddenImage">
                                    </span>
                                    <!-- <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="margin-top-10">
                         <input type="submit" class="btn green submitavt" value="Spara logga">  
                            <!-- <a href="javascript:;" class="btn default"> Cancel </a> -->
                        </div>
                    </form>
                </div>
                <!-- END CHANGE AVATAR TAB -->
                <!-- CHANGE PASSWORD TAB -->
                <div class="tab-pane" id="tab_1_17">
                     <div class="alert alert-danger pwderror" style="display:none"></div>
                        <div class="alert alert-success pwdmsucess" style="display:none"></div>
                    <form method="post" id="changepassword">
                        <div class="form-group">
                            <label class="control-label">Nuvarande lösenord</label>
                            <input class="form-control" type="password" name="oldpwd"> </div>
                        <div class="form-group">
                            <label class="control-label">Skriv in nytt Lösenord</label>
                            <input class="form-control" type="password" name="newpwd"> </div>
                        <div class="form-group">
                            <label class="control-label">Skriv in nytt Lösenord igen</label>
                            <input class="form-control" type="password" name="repwd"> </div>
                        <div class="margin-top-10">
                            <button id="changepwd" class="btn green" > Byta Lösenord </button>
                            <a href="javascript:;" class="btn default" > Avbryt </a>
                        </div>
                    </form>
                </div>
                <!-- END CHANGE PASSWORD TAB -->
                <!-- PRIVACY SETTINGS TAB -->
                <!-- <div class="tab-pane" id="tab_1_18">
                    <form action="#">
                        <table class="table table-light table-hover">
                            <tbody><tr>
                                <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                <td>
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input name="optionsRadios1" value="option1" type="radio"> Yes
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input name="optionsRadios1" value="option2" checked="" type="radio"> No
                                            <span></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                <td>
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input name="optionsRadios11" value="option1" type="radio"> Yes
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input name="optionsRadios11" value="option2" checked="" type="radio"> No
                                            <span></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                <td>
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input name="optionsRadios21" value="option1" type="radio"> Yes
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input name="optionsRadios21" value="option2" checked="" type="radio"> No
                                            <span></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                <td>
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input name="optionsRadios31" value="option1" type="radio"> Yes
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input name="optionsRadios31" value="option2" checked="" type="radio"> No
                                            <span></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody></table>
                        <!--end profile-settings-->
                        <!-- div class="margin-top-10">
                            <a href="javascript:;" class="btn red"> Save Changes </a>
                            <a href="javascript:;" class="btn default"> Cancel </a>
                        </div>
                    </form>
                </div> -->
                <!-- END PRIVACY SETTINGS TAB -->
            </div>
        </div>
    </div>
</div>