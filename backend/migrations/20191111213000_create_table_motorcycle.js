
exports.up = function(knex) {
    return knex.schema.createTable('motorcycle', table => {
        table.increments('id').primary()
        table.integer('id_owner').notNull()
        table.foreign('id_owner').references('users.id')
        table.string('model').notNull().unique()
        table.boolean('status').default(false)
    })
};

exports.down = function(knex) {
    return knex.schema.dropTable('motorcycle')
};
