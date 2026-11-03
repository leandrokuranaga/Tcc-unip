module.exports = app => {
    app.post('/signup', app.api.user.save)
    app.post('/signin', app.api.auth.signin)
    app.post('/forgotPassword/', app.api.user.forgotPassword)

    app.route('/changeName')
        .all(app.config.passport.authenticate())
        .post(app.api.user.changeName)

    app.route('/changePassword')
        .all(app.config.passport.authenticate())
        .post(app.api.user.changePassword)

    app.route('/motorcycles')
        .all(app.config.passport.authenticate())
        .get(app.api.motorcycles.getStatus)
        .post(app.api.motorcycles.save)

    app.route('/historic')
        .all(app.config.passport.authenticate())
        .get(app.api.historic.getHistoric)

    app.route('/motorcycles/:id')
        .all(app.config.passport.authenticate())
        .delete(app.api.motorcycles.remove)

    app.route('/budget')
        .all(app.config.passport.authenticate())
        .get(app.api.budget.getBudget)
}
