const config = require("../dbconfig.js");
const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const {promisify} = require('util');
const { imcdb } = require("../dbconfig.js");


exports.login = async function(req,res){
    try{
        const {username, password} = req.body;
        if(!username || !password){
            return res.status(400).render('login',{
                message: 'Please provide an username and password'
            });
        }

        config.imcdb.query('SELECT * FROM node_login WHERE UserID = ?',[username], async function(err,result){
            console.log(result);
            if (!result || !(await bcrypt.compare(password, result[0].Password))){
                res.status(401).render('login', {
                    message: 'Username or Password is inccorect'
                });
            }else{
                const id = result[0].UserID;
                const token = jwt.sign({ id: id }, process.env.JWT_SECRET, {
                    expiresIn: process.env.JWT_EXPIRES_IN
                });

                console.log("the token is: "+token);

                const cookieOptions = {
                    expires: new Date(
                        Date.now() + process.env.JWT_COOKIE_EXPIRES*24*60*60*1000
                    ),
                    httpOnly: true
                }

                res.cookie('jwt',token,cookieOptions);
                if(result[0].Position == 'staff'){
                   console.log(__dirname);
                    res.status(200).redirect("/staff");
                }
                else{
                    res.status(200).redirect("/");
                }
            }
        })
    }catch(err){
        console.log(err);
    }
}



exports.register = function(req,res){
    console.log(req.body);
    /*const name = req.body.name;
    const username = req.body.username;
    const password = req.body.password;
    const passwordconfirm = req.body.passwordconfirm;
    const position = req.body.position;*/
    const { name, username, password, passwordconfirm, position} = req.body;

    config.imcdb.query('SELECT UserID from node_login where userID=?', [username], async function(err, result)
    {
        if(err){
            console.log(err)
        }

        if(result.length > 0){
            return res.render('register', {
                message: 'Username is already taken'
            });
        }else if(password != passwordconfirm){
            return res.render('register', {
                message: 'password is not match'
            });
        }

        let hashedPassword = await bcrypt.hash(password, 8);
        console.log(hashedPassword);

        config.imcdb.query('INSERT INTO node_login SET ?', {UserID: username, Password: hashedPassword, Position: position, Name: name }, function(err, result){
            if(err){
                console.log(err);
            }else{
                console.log(result);
                return res.render('register', {
                    message: 'User Registered'
                });
            }
        });
    });
}

exports.isLoggedIn = async(req,res,next)=>{
    console.log(req.cookies);
    if(req.cookies.jwt){
        try {
            //1) verify the token
            const decoded = await promisify(jwt.verify)(req.cookies.jwt,
                process.env.JWT_SECRET
                );
                
                //2)check if user is still available
            config.imcdb.query('SELECT * FROM node_login where UserID = ?', [decoded.id], (error, result) => {
                console.log(result);

                if(!result){
                    return next();
                }

                req.user = result[0];
                return next();
            });
                console.log(decoded);
                
        } catch (error) {
            console.log(error);
            return next();
        }
    }else{
        next()
    }
}

exports.logout = async (req, res) => {
    res.cookie('jwt', 'logout', {
        expires:new Date(Date.now() + 1*1000),
        httpOnly: true
    });

    res.status(200).redirect('/');
}