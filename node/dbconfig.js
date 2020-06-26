const dotenv = require('dotenv');
const mysql = require("mysql");
dotenv.config({ path: './.env' });

var imcdb = mysql.createConnection({
    host : process.env.DB_HOST,
    user : process.env.DB_USER,
    password : process.env.DB_PASSWORD,
    database : process.env.DB
});

module.exports = {imcdb : imcdb};