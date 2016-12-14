<div class='side-body <?php echo getSideBodyClass(false); ?>'>
    <div class="row">
        <div class="col-lg-12 content-right">
            <h3>
                <?php eT("Edit quota");?>
            </h3>


            <?php echo CHtml::form(array("admin/quotas/sa/modifyquota/surveyid/{$iSurveyId}"), 'post', array('id'=>'editquota','class'=>'form-horizontal')); ?>
                <div class='form-group'>
                    <label class='control-label col-sm-3' for='quota_name'><?php eT("Quota name:");?></label>
                    <div class='col-sm-9'>
                        <input class='form-control' id="quota_name" name="quota_name" type="text" size="30" maxlength="255" value="<?php echo $quotainfo['name'];?>" />
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-sm-3' for='quota_limit'><?php eT("Quota limit:");?></label>
                    <div class='col-sm-9'>
                        <input class='form-control' id="quota_limit" name="quota_limit" type="number" size="12" maxlength="8" value="<?php echo $quotainfo['qlimit'];?>" />
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-sm-3' for='quota_action'><?php eT("Quota action:");?></label>
                    <div class='col-sm-9'>
                        <select name="quota_action" id="quota_action" class="form-control">
                            <option value ="1" <?php if($quotainfo['action'] == 1) echo "selected='selected'"; ?>><?php eT("Terminate survey");?></option>
                            <option value ="2" <?php if($quotainfo['action'] == 2) echo "selected='selected'"; ?>><?php eT("Terminate survey with warning");?></option>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-sm-3' for='autoload_url'><?php eT("Autoload URL:");?></label>
                    <div class='col-sm-9'>
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array(
                            'name' => 'autoload_url',
                            'id'=>'autoload_url',
                            'value' => $quotainfo['autoload_url'],
                            'onLabel'=>gT('Yes'),
                            'offLabel' => gT('No')));
                        ?>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-sm-3' for='active'><?php eT("Active:");?></label>
                    <div class='col-sm-9'>
                        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array(
                            'name' => 'active',
                            'id'=>'active',
                            'value' => $quotainfo['active'],
                            'onLabel'=>gT('Yes'),
                            'offLabel' => gT('No')));
                        ?>
                    </div>
                </div>
                <!-- Language tabs -->
                <ul class="nav nav-tabs">
                    <?php foreach ($langs as $lang): ?>
                        <li role="presentation" <?php if ($lang==$baselang){echo 'class="active"';}?>>
                            <a data-toggle="tab" href="#edittxtele<?php echo $lang ?>">
                                <?php echo getLanguageNameFromCode($lang,false); ?>
                                <?php if ($lang==$baselang) {echo '('.gT("Base language").')';} ;?>
                            </a>
                        </li>
                    <?php endforeach?>
                </ul>
                <div class='tab-content'>
                <?php foreach ($aTabContents as $i => $sTabContent)
                {
                    echo CHtml::tag(
                        'div',
                        array(
                            'id' => 'edittxtele' . $i,
                            'class' => 'tab-pane fade in' . ($i == $baselang ? ' active ' : ''),
                        ),
                        $sTabContent
                    );
                }?>
                </div>

                <input type="submit" name="submit" class="hidden" />
                <input type="hidden" name="sid" value="<?php echo $surveyid;?>" />
                <input type="hidden" name="action" value="quotas" />
                <input type="hidden" name="subaction" value="modifyquota" />
                <input type="hidden" name="quota_id" value="<?php echo $quotainfo['id'];?>" />
            </form>

        </div>
    </div>
</div>
