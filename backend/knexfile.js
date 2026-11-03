module.exports = {

    client: 'postgresql',
    connection: {
        database: 'mx7',
        user: 'postgres',
        password: '***REMOVED***'
    },
    pool: {
        min: 2,
        max: 10
    },
    migrations: {
        tableName: 'knex_migrations'
    }

};
