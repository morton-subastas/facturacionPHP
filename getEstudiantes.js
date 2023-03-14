const cnx = require ('./cnx');
const cmx = require('./cnx');
const sql = require('mssql');

async function getEstudiantes(){
    try{
        let pool = await sql.connect(cnx);
        let salida = await pool.request().query("select * from inventor where refno='  496744'");
        //var objJSON = JSON.stringify(salida);
        console.log(objJSON)

        //console.log(salida.recordsets);
        return salida.recordsets;
    }catch(err){
        console.log(err);
    }
}

getEstudiantes();
module.exports = {
    getEstudiantes: getEstudiantes
};
