var http = require('http');
var url  = require('url');
//var fs   = require('fs'); 
//var gpio = require('gpio');
var gpio = require('onoff').Gpio;
var io = require('socket.io')(http) //require socket.io module and pass the http object (server)


var gpioUP = new gpio(27,'out'); // up
var gpioDOWN= new gpio(22,'out'); // down
var gpioLEFT= new gpio(17,'out'); // left
var gpioRIGHT = new gpio(18,'out'); // right


var up = 0;
var down = 0;
var left = 0;
var right = 0;

var intervalTimer;

// Create and start webserver on port 8080
var server = http.createServer(function (request, response) {
	
	// enable cors
	response.writeHead(200, {
		'Content-Type': 'text/plain',
		'Access-Control-Allow-Origin' : '*',
		'Access-Control-Allow-Methods': 'GET,PUT,POST,DELETE'
	});
	
	console.log(request.url);
	
	if (request.url == '/up-on') {
		up = 1;
	} else if (request.url == '/up-off') {
		up = 0;
	} else if (request.url == '/down-on') {
		down = 1;
	} else if (request.url == '/down-off') {
		down = 0;
	} else if (request.url == '/left-on') {
		left = 1;
	} else if (request.url == '/left-off') {
		left = 0;
	} else if (request.url == '/right-on') {
		right = 1;
	} else if (request.url == '/right-off') {
		right = 0;
	}

	response.end();
	
}); 

server.listen(8080, null, null, function() {
	

	intervalTimer = setInterval(function() {
		gpioDOWN.writeSync(down);
		gpioUP.writeSync(up);
		gpioLEFT.writeSync(left);
		gpioRIGHT.writeSync(right);
	}, 200);	
	
});

	// Cleanup on exit
	process.on('SIGINT', function() {
		console.log('\n Exitting, cleaning up GPIO...');
		clearInterval(intervalTimer);
		
		// Reset and release gpio port
		gpioUP.writeSync(0);                
		gpioUP.unexport()
		gpioDOWN.writeSync(0);                
		gpioDOWN.unexport();
		gpioLEFT.writeSync(0);                
		gpioLEFT.unexport();
		gpioRIGHT.writeSync();                
		gpioRIGHT.unexport();
		process.exit(0);						
	});