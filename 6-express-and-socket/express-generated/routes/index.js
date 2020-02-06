var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {
  res.io.once('connection', client =>{
    console.log("New connection")

    client.on("messageSend", data => {
      console.log(data)
      res.io.sockets.emit("broadcast", data)
    })
  })

  res.render('index', { 
    title: 'Express', 
    test: "some value",
    testArray: [
      {
        name: "Test",
        age: 23
      },
      {
        name: "Test2",
        age: 24
      }
    ]
   });
});

module.exports = router;
