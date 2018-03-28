var http = require('http').createServer(handler); //require http server, and create server with function handler()
var fs = require('fs'); //require filesystem module
var io = require('socket.io')(http) //require socket.io module and pass the http object (server)
//var gpio = require('onoff').Gpio;

var intervalTimer;

/*var gpioUP = new gpio(27,'out'); // up17
var gpioDOWN= new gpio(22,'out'); // down18
var gpioLEFT= new gpio(17,'out'); // left27
var gpioRIGHT = new gpio(18,'out'); // right22
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
  //control = [up,down,left,right]
  function setGPIO(drive, steer) {
	  if(drive===1) {
			if(steer===1) {
				//console.log('Forward Left');
				control = [1,0,1,0];
			} else if(steer===2) {
				//console.log('Forward Right');
				control = [1,0,0,1];
			} else if(steer===3) {
				//console.log('Forward');
				control = [1,0,0,0];
			}
		} else if (drive===2) {
			if(steer===1) {
				//console.log('Reverse Right(Left)');
				control = [0,1,1,0];
			} else if(steer===2) {
				//console.log('Reverse Left(Right)');
				control = [0,1,0,1];
			} else if(steer===3) {
				//console.log('Reverse');
				control = [0,1,0,0];
			}
		} else {
			if(steer===1) {
				//console.log('Left');
				control = [0,0,1,0];
			} else if(steer===2) {
				//console.log('Right');
				control = [0,0,0,1];
			} else {
				//console.log('Halt');
				control = [0,0,0,0];
			}
		}
		return control;
  }
  intervalTimer = setInterval(function() {
	  var ctrl = setGPIO(drivevalue, steervalue);
	  //ctrl = [up,down,left,right]
	  console.log(ctrl[0] +',' + ctrl[1] +','+ ctrl[2] +','+ ctrl[3])
		/*gpioDOWN.writeSync(down);
		gpioUP.writeSync(up);
		gpioLEFT.writeSync(left);
		gpioRIGHT.writeSync(right);*/
	}, 200);
});