const moment = require('moment')

module.exports = app => {
    const getBudget = (req, res) => {
        app.db('budget')
            .where({ id_users: req.user.id })
            .innerJoin('motorcycle', 'budget.id_motorcycle', 'motorcycle.id')
            .orderBy('budget.id_motorcycle')
            .then(budget => res.json(budget))
            .catch(err => res.status(400).json(err))
    }

    return { getBudget }
}