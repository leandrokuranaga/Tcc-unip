const moment = require('moment')

module.exports = app => {
    const getHistoric = (req, res) => {
        app.db('maintenance')
            .where({ id_owner: req.user.id })
            .orderBy('id_moto')
            .then(maintenance => res.json(maintenance))
            .catch(err => res.status(400).json(err))
    }

    return { getHistoric }
}
