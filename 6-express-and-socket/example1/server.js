const express = require('express')
const app = express()
const port = 3001

app.get('/', (req, res) => res.json({"test": "te22st value"}))

app.listen(port, () => console.log(`Example app listening on port ${port}!`))