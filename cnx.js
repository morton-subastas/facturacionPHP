const cnx ={
    user: 'auctuser',
    password: 'rfcsystems',
    server: '26.180.62.55',
    database: 'auction',
    options:{
        trustedconection: false,
        enabledArithAbort: true,
        encrypt: false,
        instancename: 'SQLEXPRESS'
    }
}

module.exports = cnx;