const bcrypt = require('bcrypt-nodejs')
const nodemailer = require('nodemailer')
const crypto = require('crypto')

module.exports = app => {
    const obterHash = (password, callback) => {
        bcrypt.genSalt(10, (err, salt) => {
            bcrypt.hash(password, salt, null, (err, hash) => callback(hash))
        })
    }

    const save = (req, res) => {
        obterHash(req.body.password, hash => {
            const password = hash

            app.db('users')
                .insert({ name: req.body.name, email: req.body.email, password })
                .then(_ => res.status(204).send())
                .catch(err => res.status(400).json(err))
        })
    }

    const changeName = (req, res) => {
        app.db('users')
            .where({ id: req.user.id })
            .update({ name: req.body.name })
            .then(_ => res.status(204).send())
            .catch(err => res.status(400).json(err))
    }

    const changePassword = (req, res) => {
        obterHash(req.body.password, hash => {
            const newPassword = hash

            app.db('users')
                .where({ id: req.user.id })
                .update({ password: newPassword })
                .then(_ => res.status(204).send())
                .catch(err => res.status(400).json(err))
        })
    }

    const forgotPassword = async (req, res) => {
        const search = await app.db('users')
            .where({ email: req.body.email })
            .first()

        if (search) {
            const mailer = req.body.email
            const newPassword = crypto.randomBytes(4).toString('hex')

            obterHash(newPassword, hash => {
                const newPass = hash

                app.db('users')
                    .where({ email: req.body.email })
                    .update({ password: newPass })
                    .then(_ => res.status(204).send())
                    .catch(err => res.status(400).json(err))
            })

            const transport = nodemailer.createTransport({
                host: "smtp.mailtrap.io",
                port: 2525,
                auth: {
                    user: "a86b7273e4a23f",
                    pass: "36efdc7c22342f"
                }
            })
            
            const email = {
                from: 'mx7motoparts@gmail.com',
                to: mailer,
                subject: 'Mx7 - Nova senha',
                html: 'Esqueceu sua senha? Aqui está sua nova senha: ' + newPassword + '. ------ Caso queira alterar a senha, basta fazer o login no app e acessar a aba de edição de dados!'
            }
    
            transport.sendMail(email, function(err, info){
                if(err) {
                    throw err
                }
    
                res.send(true)
                console.log('Email enviado! Mais informações: ', info)
            })
        } else {
            res.status(400).send('Email não encontrado!')
        }
    }

    return { save, changeName, changePassword, forgotPassword }
}