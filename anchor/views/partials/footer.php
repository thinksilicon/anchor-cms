<?php if (Auth::user()): ?>
  <footer class="wrap bottom">
    <small><?php echo __('global.powered_by_anchor', VERSION); ?></small>
    <em><?php echo __('global.make_blogging_beautiful'); ?></em>
  </footer>

  <script>
    // Confirm any deletions
    $( '.delete' ).on( 'click', function () {
      return confirm( '<?php echo __('global.confirm_delete'); ?>' );
    } );
    tinymce.init({
	selector: '#content',
	plugins: [ "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		   "searchreplace wordcount visualblocks visualchars code fullscreen",
		   "insertdatetime media nonbreaking save table contextmenu directionality",
		   "template paste textcolor colorpicker textpattern" ],
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons |  preview",
	imageadvtab: true,
	file_browser_callback: RoxyFileBrowser
    });
    function RoxyFileBrowser(field_name, url, type, win) {
      var roxyFileman = '/anchor/views/assets/plugins/fileman/index.html';
      if (roxyFileman.indexOf("?") < 0) {
        roxyFileman += "?type=" + type;
      } else {
        roxyFileman += "&type=" + type;
      }
      roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
      if(tinyMCE.activeEditor.settings.language){
        roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
      }
     tinyMCE.activeEditor.windowManager.open({
        file: roxyFileman,
        title: 'Roxy Fileman',
        width: 850,
        height: 650,
        resizable: "yes",
        plugins: "media",
        inline: "yes",
        close_previous: "no"
      }, {     window: win,     input: field_name    });
      return false;
    }
  </script>
<?php endif; ?>
</body>
</html>
