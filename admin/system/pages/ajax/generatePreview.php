<?php
/**
 * Generate Web file for module Pages
 * 
 * @package      WebGuru3
 * @subpackage   modules/configuration/ajax/
 * @author       Ondrej Rafaj
 * @author       WebGuruCMS3 Framework CMS admin generator (http://www.webgurucms.com)
 * @version      1.0.0.0
 * @wgversion    3.0.0.0
 * @wgdeveloper  1.0.0.0
 * @since        12. December 2009
 */

chdir('../../../');
require('./init/init.basic.php');
require('./init/init.admin.php');
//$system['paths']['rootpath'] = '../../../';
$a=0;
$b=0;
$id = wgGet::getValue('id');
$gpath = wgPaths::getModulePath('pages');
print $gpath;
require('./system/pages/actions/class.generate.php');
$mPag = $mod->runModule('pages');

generate::generatePreview($id);
?>
<iframe src="<?php echo wgPaths::getPath('url').'temp/'.$id.'.php'; ?>" />
<?php
$db = NULL;
exit();

require_once('Services/W3C/HTMLValidator.php');
$v = new Services_W3C_HTMLValidator();
$var = $v->validate('http://www.dementi.cz/cz/galerie/');
print_r($var);
if ($var->validity) print 'dokument je validní';
else print 'dokument není validní';
?>