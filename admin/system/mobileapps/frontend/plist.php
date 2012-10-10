<?php
header('Content-type: text/plain');
echo '<?xml version="1.0" encoding="UTF-8"?>';
$arr = BpTechnologiesModel::getSelfData();
?>
<bundle version='1' status='Preview'>
  <regions>
    <region id='6' name='North Sea'>
      <fields>
        <field id='8' name='Field A'>
          <deployments>
            <deployment id='38' name='Deployment A' status="Live">
              <results>
                <result id='39' name='Deployment A Result' technologyId='12'>
                  <graph id="1" name="A Graph" path="/assets/1.jpg" />
                  <intro>sfs dfs gsfg sg sf gsf</intro>
                  <table>
                    <row>
                      <property>Date</property>
                      <value>1 Jan 2012</value>
                	</row>
                  </table>
                </result>
              </results>
            </deployment>
          </deployments>
        </field>
        <field id='7' name='Field B'>
          <deployments />
        </field>
      </fields>
    </region>
  </regions>
  <flagships>
    <flagship id='9' abbr='ASI' name='Advanced Seismic Imaging'>
      <description>djbsfoobsfo osifnsfv sf s sfg sf sfg sfg sf</description>
      <technologies>
      <?php
      foreach ($arr as $t) {
      ?>
        <technology id='<?php echo $t->getId(); ?>' abbr='<?php echo $t->getAbbr(); ?>' name='<?php echo $t->getName(); ?>'>
          <image id="2" name="FWI Image" path="/assets/2.jpg" />
          <video id="1" name="FWI Video" path="/assets/1.mp4" />
          <introduction><?php echo $t->getIntroduction(); ?></introduction>
          <outline><?php echo $t->getOutline(); ?></outline>
          <keypoints><?php echo $t->getKeypoint(); ?></keypoints>
        </technology>
        <?php } ?>
    </flagship>
    <flagship id='10' abbr='PRL' name='Pushing Reservoir Limits'>
      <description />
      <technologies>
        <technology id='36' abbr='BW' name='Bright Water'>
          <image/>
          <video/>
          <introduction>hph hi ih ipphiphd fg sf gsf gsf gsf gs </introduction>
          <outline>sfgsfgsfg sfg sf gsf g fsg sf g sf gs fg s fg sf g</outline>
          <keypoints>sfsdfsd

sfgsfg

sfgfsg

fgs</keypoints>
        </technology>
        <technology id='18' abbr='' name='WATS'>
          <image/>
          <video/>
          <introduction />
          <outline />
          <keypoints />
        </technology>
      </technologies>
    </flagship>
  </flagships>
</bundle>