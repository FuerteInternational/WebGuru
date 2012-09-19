<?php
$v= WspriteWidgetsModel::getOneSelfData((int) wgGet::getValue('edit'));
//$v = new WspriteWidgetsModel();
if ((bool) $v->getId()) $message = 'Edit '.$v->getName();
else $message = 'Create new widget';
?><form action="" id="renameForm" method="post">
            	<ul class="floatLeft">
                	<li class="loading"><img src="<?php echo wgPaths::getPath('url'); ?>assets/sprite/img/loading.gif" alt="loading" /></li>
	            	<li><input type="text" name="newName" value="" class="required" /></li>
	                <li class="regLoginButton blackButton"><span><input type="submit" name="submit" value="Save" /></span></li>
				</ul>
            </form>
            <form action="" method="post">
                <div id="createWidgetHolder" class="clear">
            		<a class="closePopit imgReplace" href="#">close</a>
                    <div class="corners">
                        <h2>Create new widget</h2>
                        <fieldset>
                            <ul>
                                <li>
                                    <label>Widget name</label>
                                    <input type="text" name="name" value="" />
                                </li>
                            </ul>
                            
                        </fieldset>	
                        <div class="regLoginButton blackButton"><span><input type="submit" name="submitwidget" value="Create" /></span></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </form>