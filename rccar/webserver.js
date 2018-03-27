var http = require('http').createServer(handler); //require http server, and create server with function handler()
var fs = require('fs'); //require filesystem module
var io = require('socket.io')(http) //require socket.io module and pass the http object (server)
//var gpio = require('onoff').Gpio;

var intervalTimer;

/*var gpioUP = new gpio(27,'out'); // up
var gpioDOWN= new gpio(22,'out'); // down
var gpioLEFT= new gpio(17,'out'); // left
var gpioRIGHT = new gpio(18,'out'); // right
*/

var drivevalue = 0; //static variable for current status
var steervalue = 0; //static variable for current status
  
http.listen(8080); //listen to port 8080

function handler (req, res) { //create server
  fs.readFile(__dirname + '/public/index.html', function(err, data) { //read file index.html in public folder
    if (err) {
      res.writeHead(404, {'Content-Type': 'text/html'}); //display 404 on error
      return res.end("404 Not Found");
    } 
    res.writeHead(200, {'Content-Type': 'text/html'}); //write HTML
    res.write(data); //write data from index.html
    return res.end();
  });
}

io.sockets.on('connection', function (socket) {// WebSocket Connection
  
  socket.on('steer', function(data) {
    steervalue = data;
  });
  
  socket.on('drive', function(data) { //get light switch status from client
    drivevalue = data;
  });
  
  intervalTimer = setInterval(function() {
		/*gpioDOWN.writeSync(down);
		gpioUP.writeSync(up);
		gpioLEFT.writeSync(left);
		gpioRIGHT.writeSync(right);*/
		if(drivevalue===1) {
			if(steervalue===1) {
				console.log('Forward Left');
			} else if(steervalue===2) {
				console.log('Forward Right');
			} else if(steervalue===3) {
				console.log('Forward');
			}
		} else if (drivevalue===2) {
			if(steervalue===1) {
				console.log('Reverse Right');
			} else if(steervalue===2) {
				console.log('Reverse Left');
			} else if(steervalue===3) {
				console.log('Reverse');
			}
		} else {
			if(steervalue===1) {
				console.log('Left');
			} else if(steervalue===2) {
				console.log('Right');
			} else {
				console.log('Halt');
			}
		}
	}, 200);
});