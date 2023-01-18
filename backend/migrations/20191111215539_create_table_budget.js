
exports.up = function(knex) {
    return knex.schema.createTable('budget', table => {
        table.increments('id').primary()
        table.integer('id_users').notNull()
        table.foreign('id_users').references('users.id')
        table.integer('id_motorcycle').notNull()
        table.foreign('id_motorcycle').references('motorcycle.id')
        table.float('price').notNull()
        table.string('component').notNull()
    })
};

exports.down = function(knex) {
    return knex.schema.dropTable('budget')
};
