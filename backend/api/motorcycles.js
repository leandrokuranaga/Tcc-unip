const moment = require('moment')

module.exports = app => {
    const getStatus = async (req, res) => {

        const status = await app.db('motorcycle')
            .where({ id_owner: req.user.id, status: 't' })
            .first()

        if (status) {
            return res.send(true)
        } else {
            return res.send(false)
        }
    }

    const save = (req, res) => {

        req.body.owner = req.user.id

        app.db('motorcycle')
            .insert({model: req.body.model, id_owner: req.user.id})
            .then(_ => res.status(204).send())
            .catch(err => res.status(400).json(err))
    }

    const remove = (req, res) => {
        app.db('motorcycle')
            .where({ id: req.params.id, id_owner: req.user.id })
            .del()
            .then(rowsDeleted => {
                if (rowsDeleted > 0) {
                    res.status(204).send()
                } else {
                    const msg = `Não foi encontrada moto com id $(req.params.id).`
                    res.status(400).send(msg)
                }
            })
            .catch(err => res.status(400).json(err))
    }

    return { getStatus, save, remove }
}
