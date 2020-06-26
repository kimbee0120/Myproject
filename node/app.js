const express = require("express");
const path = require('path');
const config = require("./dbconfig.js");
const cookieParser = require("cookie-parser");
const app = express();


//__dirname return current path 
const publicDirectory = path.join(__dirname, './public');
app.use(express.static(publicDirectory));
//Parse URL-encoded bodies (as sent by HTML forms)
app.use(express.urlencoded({extended: false}));
//Parse Json bodies (as sent by API clients)
app.use(express.json());
app.use(cookieParser());
app.set('view engine', 'hbs');

//Define Routes
app.use('/', require('./routes/pages'));
app.use('/auth', require('./routes/auth'));

app.listen(3000, () =>{
    console.log("server started on port 3000");
});