<?php 
/**
* @package TTVideo
* @author Martin Rose
* @website www.toughtomato.com
* @version 2.0.1
* @copyright Copyright (C) 2010 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access'); 
?>

<form action="index.php" method="POST" name="adminForm" id="adminForm" enctype="multipart/form-data">
  <fieldset class="adminform">
    <legend>Video Details</legend>
    <table class="admintable">
      <tr>
        <td class="key">Zip Archive</td>
        <td>
          Please select the zip archive you exported previously:<br />
          <input type="file" name="file" id="file" />
        </td>
      </tr>
    </table>
    <input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' );?>"/>
    <input type="hidden" name="task" value="import"/>    
    <?php echo JHTML::_( 'form.token' ); ?>
  </fieldset>
</form>
<small>If any video data already exists then that data will remain and the import will add the new videos to your existing videos.</small>
<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton) {
  var form = document.adminForm;
  if (pressbutton == 'cancel') {
    submitform( pressbutton );
    return;
  }
  if (form.file.value != "") {
    var ext = form.file.value.split('.');
  }
  // do field validation
  if (form.file.value == "") {
    alert( "<?php echo JText::_( 'Please select an archive to import.', true ); ?>" );
  } else if (ext[1] != "zip") {
    alert( "<?php echo JText::_( 'Please select a ZIP archive.', true ); ?>" );
  } else {
    submitform( pressbutton );
  }
}
-->
</script>