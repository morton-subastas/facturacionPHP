console.log("inicio del proceso");

const DBestudiantes = require ("./getEstudiantes");

var express = require('express');
var bodyP = require('body-parser');
var cors = require('cors');
const { response } = require("express");

var app = express();
var router = express.Router();

app.use(bodyP.urlencoded({extended: true}));
app.use(bodyP.json());
app.use(cors());
app.use('', router);

router.route('/getEstudiantes').get((request, response) => {
    DBestudiantes.getEstudiantes().then(result => {
        response.json(result);
    });
});

var portcnx = process.env.PORT|| 5000;
app.listen(portcnx);    

console.log("fin del proceso");