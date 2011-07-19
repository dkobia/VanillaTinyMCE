<?php if(!defined('APPLICATION')) die();
/**
*
* # TinyMCE WYSIWYG Plugin for Vanilla 2 #
*
* ### About TinyMCE ###
* TinyMCE is a platform independent web based Javascript HTML
* WYSIWYG editor control released as Open Source under LGPL by
* Moxiecode Systems AB. It has the ability to convert HTML
* TEXTAREA fields or other HTML elements to editor instances.
*
* ### TinyMCE in Vanilla 2 ###
* Offers 3 options that can further be customized:
*
*   FULL: The complete TinyMCE Toolbar
*   ADVANCED: Lacks a few of the options in the FULL toolbar
*   SIMPLE (Default): The most simple functions of TinyMCE
*
*/

// Define the plugin:
$PluginInfo['VanillaTinymce'] = array(
   'Name' => 'Vanilla TinyMCE',
   'Description' => '<a href="#" target="_blank">TinyMCE jQuery WYSIWYG plugin for Vanilla 2.</a>',
   'Version' => '0.7',
   'Author' => "David Kobia",
   'AuthorEmail' => 'david@kobia.net',
   'AuthorUrl' => 'http://www.dkfactor.com',
   'SettingsUrl' => '/dashboard/plugin/VanillaTinyMCE',
   'SettingsPermission' => 'Garden.Settings.Manage',
   'RequiredApplications' => array('Vanilla' => '>=2')
);

class VanillaTinymce extends Gdn_Plugin {

	private $path;

	public function __construct()
	{
		$this->path = Gdn::Request()->Url('plugins/VanillaTinymce');
	}

	public function Base_Render_Before(&$Sender)
	{
		$Sender->AddJSFile('plugins/VanillaTinymce/tiny_mce.js');
		$Sender->AddJSFile('plugins/VanillaTinymce/jquery.tinymce.js');

		$mode = C('Plugin.VanillaTinyMCE.Mode');

		if( !$mode ) $mode = 'simple';

		$Sender->Head->AddString($this->_mode($mode));
	}

	private function _mode($mode = "simple")
	{
		$mode = '_' . $mode;

		return $this->$mode();
	}

	private function _simple()
	{
		$html = <<<EOF
			<script type="text/javascript">
				$().ready(function() {
					$('#Form_Body').tinymce({
						// Location of TinyMCE script
						script_url : '$this->path/tiny_mce.js',

						// General options
						theme : "simple"
					});
				});
			</script>
EOF;
		// No WhiteSpace in front of EOF!!

		return $html;
	}

	private function _full()
	{
		$html = <<<EOF
			<script type="text/javascript">
				$().ready(function() {
					$('#Form_Body').tinymce({
						// Location of TinyMCE script
						script_url : '$this->path/tiny_mce.js',

						// General options
						theme : "advanced",
						plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

						// Theme options
						theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
						theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
						theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
						theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
						theme_advanced_toolbar_location : "top",
						theme_advanced_toolbar_align : "left",
						theme_advanced_statusbar_location : "bottom",
						theme_advanced_resizing : true,

						// Example content CSS (should be your site CSS)
						content_css : "css/content.css",

						// Drop lists for link/image/media/template dialogs
						template_external_list_url : "lists/template_list.js",
						external_link_list_url : "lists/link_list.js",
						external_image_list_url : "lists/image_list.js",
						media_external_list_url : "lists/media_list.js",

						// Replace values for the template plugin
						template_replace_values : {
							username : "Some User",
							staffid : "991234"
						}
					});
				});
			</script>
EOF;
		// No WhiteSpace in front of EOF!!

		return $html;
	}

	private function _advanced()
	{
		$html = <<<EOF
			<script type="text/javascript">
				$().ready(function() {
					$('#Form_Body').tinymce({
						// Location of TinyMCE script
						script_url : '$this->path/tiny_mce.js',

						// General options
						theme : "advanced",
						plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

						// Theme options
						theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
						theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
						theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
						theme_advanced_toolbar_location : "top",
						theme_advanced_toolbar_align : "left",
						theme_advanced_statusbar_location : "bottom",
						theme_advanced_resizing : true,

						// Example content CSS (should be your site CSS)
						content_css : "css/content.css",

						// Drop lists for link/image/media/template dialogs
						template_external_list_url : "lists/template_list.js",
						external_link_list_url : "lists/link_list.js",
						external_image_list_url : "lists/image_list.js",
						media_external_list_url : "lists/media_list.js",

						// Replace values for the template plugin
						template_replace_values : {
							username : "Some User",
							staffid : "991234"
						}
					});
				});
			</script>
EOF;
		// No WhiteSpace in front of EOF!!

		return $html;
	}

	private function _basic()
	{
		$html = <<<EOF
			<script type="text/javascript">
				$().ready(function() {
					$('#Form_Body').tinymce({
						// Location of TinyMCE script
						script_url : '$this->path/tiny_mce.js',

						// General options
						theme : "advanced",
						plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

						// Theme options
						theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
						theme_advanced_buttons2 : "bullist,numlist,|blockquote,|,link,unlink,image,|,preview,|,forecolor,",
						theme_advanced_buttons3 : "",
						theme_advanced_toolbar_location : "top",
						theme_advanced_toolbar_align : "left",
						theme_advanced_statusbar_location : "bottom",
						theme_advanced_resizing : true,

						// Example content CSS (should be your site CSS)
						content_css : "css/content.css",

						// Drop lists for link/image/media/template dialogs
						template_external_list_url : "lists/template_list.js",
						external_link_list_url : "lists/link_list.js",
						external_image_list_url : "lists/image_list.js",
						media_external_list_url : "lists/media_list.js",

						// Replace values for the template plugin
						template_replace_values : {
							username : "Some User",
							staffid : "991234"
						}
					});
				});
			</script>
EOF;
		// No WhiteSpace in front of EOF!!

		return $html;
	}

	public function Setup() {
	  SaveToConfig('Plugin.VanillaTinyMCE.Mode', 'simple');
	}


	/**
	* Create a method called "Example" on the PluginController
	*
	* One of the most powerful tools at a plugin developer's fingertips is the ability to freely create
	* methods on other controllers, effectively extending their capabilities. This method creates the
	* Example() method on the PluginController, effectively allowing the plugin to be invoked via the
	* URL: http://www.yourforum.com/plugin/Example/
	*
	* From here, we can do whatever we like, including turning this plugin into a mini controller and
	* allowing us an easy way of creating a dashboard settings screen.
	*
	* @param $Sender Sending controller instance
	*/
	public function PluginController_Example_Create($Sender) {
	  /*
	   * If you build your views properly, this will be used as the <title> for your page, and for the header
	   * in the dashboard. Something like this works well: <h1><?php echo T($this->Data['Title']); ?></h1>
	   */
	  $Sender->Title('VanillaTinyMCE');
	  $Sender->AddSideMenu('plugin/VanillaTinymce');

	  // If your sub-pages use forms, this is a good place to get it ready
	  $Sender->Form = new Gdn_Form();

	  /*
	   * This method does a lot of work. It allows a single method (PluginController::Example() in this case)
	   * to "forward" calls to internal methods on this plugin based on the URL's first parameter following the
	   * real method name, in effect mimicing the functionality of as a real top level controller.
	   *
	   * For example, if we accessed the URL: http://www.yourforum.com/plugin/Example/test, Dispatch() here would
	   * look for a method called ExamplePlugin::Controller_Test(), and invoke it. Similarly, we we accessed the
	   * URL: http://www.yourforum.com/plugin/Example/foobar, Dispatch() would find and call
	   * ExamplePlugin::Controller_Foobar().
	   *
	   * The main benefit of this style of extending functionality is that all of a plugin's external API is
	   * consolidated under one namespace, reducing the chance for random method name conflicts with other
	   * plugins.
	   *
	   * Note: When the URL is accessed without parameters, Controller_Index() is called. This is a good place
	   * for a dashboard settings screen.
	   */
	  $this->Dispatch($Sender, $Sender->RequestArgs);
	}

	public function Controller_Index($Sender)
	{
		// Prevent non-admins from accessing this page
		$Sender->Permission('Vanilla.Settings.Manage');

		$Sender->SetData('PluginDescription',$this->GetPluginKey('Description'));

		$Validation = new Gdn_Validation();
		$ConfigurationModel = new Gdn_ConfigurationModel($Validation);
		$ConfigurationModel->SetField(
			array('Plugin.VanillaTinyMCE.Mode' => 'simple')
		);

		// Set the model on the form.
		$Sender->Form->SetModel($ConfigurationModel);

		// If seeing the form for the first time...
		if ($Sender->Form->AuthenticatedPostBack() === FALSE)
		{
			// Apply the config settings to the form.
			$Sender->Form->SetData($ConfigurationModel->Data);
		}
		else
		{
			$ConfigurationModel->Validation->ApplyRule('Plugin.VanillaTinyMCE.RenderCondition', 'Required');

			if( $Sender->Form->Save() ) $Sender->StatusMessage = T("Your changes have been saved.");
		}

		// GetView() looks for files inside plugins/PluginFolderName/views/ and returns their full path. Useful!
		$Sender->Render($this->GetView('settings.php'));
	}
}
