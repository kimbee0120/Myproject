const express = require("express");
const router = express.Router();
const authController = require('../controllers/auth.js')

router.get('/', authController.isLoggedIn,function(req,res){
    res.render('../views/index',{
        user: req.user
    });
});

router.get('/register', function(req,res){
    res.render('../views/register');
});

router.get('/login', function (req, res) {
    res.render('../views/login');
});

router.get('/staff', authController.isLoggedIn, function (req, res) {
    if (req.user.Position == "staff") {
        res.render('../views/staff');
    }
    else {
        res.redirect('/login');
    }
});

router.get('/profile', authController.isLoggedIn, function (req, res) {
    if(req.user.Position == "student"){
        res.render('../views/profile', {
            user: req.user
        });
       
    }
    else{
        res.redirect('/login');
    }
});

module.exports = router;