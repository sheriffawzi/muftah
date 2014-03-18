(function() {
	tinymce.create('tinymce.plugins.buttonPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/button_popup.php', // file that contains HTML for our modal window
					width : 250 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 280 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			ed.addButton('button', {title : 'Insert Button', cmd : 'mcebutton', image: url + '/images/button.png' });
		}
	});
	 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('button', tinymce.plugins.buttonPlugin);

})();