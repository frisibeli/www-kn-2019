var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {

  req.io.once('connection', client => {
    console.log("We have new connection");
    client.on("clientMessage", data => {
      req.io.sockets.emit("broadcast", data)
    })
  })

  res.render('index', { 
    title: 'Express',
    authenticated: req.authenticated ? "YES" : "NO",
    arr: [
      {name: "Test1", num: 23},
      {name: "Test2", num: 24},
      {name: "Test3", num: 25},
    ]
   });
});

module.exports = router;
