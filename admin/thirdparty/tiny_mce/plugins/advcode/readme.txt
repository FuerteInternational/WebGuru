
  Advanced Code Plugin for TinyMCE

  ============================================================

  Author Michael Keck <mkkeck_AT_sourceforge_DOT_net>
  Copyright © 2006. Michael Keck, all rights reserved.
  Released under the terms of the GPL license.

  ============================================================



  [A] Install:
  ------------

  1.) copy the files to your plugins directory of the tinymce.
      Sample: your_tinmce/plugins/advcode

  2.) Modify the init script:
        tinyMCE.init({
            plugins : "[...],advcode",
            theme   : "advanced",
            [...]
        });
  
      Note:
          [...] is your own code / settings!

  3.) How it Works:
      It will replace the normal code-edit with the advcode. You
      don't really need an icon for this plugin, because the one
      of the normal code-edit will be used.



  [B] Usage:
  ----------

  If you click on the 'HTML'-icon the coding window will be
  open. You can click on the icons, and some html code will
  be insert into the textarea below.

  Some shortcuts are available:

      - [Shift + Space]
            inserts &nbsp;

      - [Shift + Return]
            inserts <br />

      - [Ctrl + Return]
            inserts <p></p>

      - [Ctrl + 1]
             inserts <h1></h2>
        ...
        [Ctrl + 6]
             inserts <h6></h6>

      - [Ctrl + 7]
             inserts <b></b>

      - [Ctrl + 8]
             inserts <i></i>

      - [Ctrl + 9]
             prompt to insert an url

   If you press on your keyboard </ the last opened tag
   (if available) will be closed.



  [C] TODO (2006-11-17):
  ----------------------

  - HTML-Assistant wich allows to edit some tag attributes
    faster. 
  - Style-Select
  - Popup to insert links (like WYSIWYG-Mode)
  - Popup to insert images (like WYSIWYG-Mode)



  [D] Changelog:
  --------------

  - 2006-11-17:
    Bugfix: javascript error 'undefined'
            on tinyMCE.importPluginLanguagePack
            Thanks to 'sachinkanase'
    Added:  This readme file ;)

  - 2006-11-01:
    Added:  shortcuts
    Added:  auto-close tags on pressing </

  

  