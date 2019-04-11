var fs = require('fs'),
	args = require('system').args,
	page = require('webpage').create();

page.content = fs.read(args[1]);

page.viewportSize = {
	width: 1024,
	height: 1024
};

page.paperSize = {
	format: 'A4',
	orientation: 'portrait',
	margin: '1cm'
}

window.setTimeout(function () {
	page.render(args[2]);
	phantom.exit();
}, 1000);