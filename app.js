// boilerplate code
var express = require('express'),
		app = express(),
		bodyParser = require('body-parser'),
		methodOverride = require('method-override'),
		morgan = require("morgan"),
		path = require("path");


app.use('/css',express.static(path.join(__dirname, '../elninomma/css')));
app.use('/js',express.static(path.join(__dirname, '../elninomma/js')));
app.use('/img',express.static(path.join(__dirname, '../elninomma/img')));
app.use('/fonts',express.static(path.join(__dirname, '../elninomma/fonts')));

// set static directory to public
// app.use(express.static('public'));
// use morgan
app.use(morgan("tiny"));
// use body parser
app.use(bodyParser.urlencoded({extended: true}));
// body-parser json
app.use(bodyParser.json());
// use method-override
app.use(methodOverride('_method'));


// Set home page route
app.get('*', function(req, res) {
  res.sendFile(path.join(__dirname, '../elninomma', 'index.html'));
});

// start the server
app.listen(process.env.PORT || 3000, function () {
	console.log('Starting a server on localhost:3000');
});