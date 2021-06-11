
scenarioRunNumber = 0

function getDeviceName(requestParams, context, ee, next) {
    requestParams.json.id = parseInt(requestParams.json.id)
    requestParams.json.device_name = `device_nr_${scenarioRunNumber % 10}` 
    scenarioRunNumber++

    return next();
}

function printStatus (requestParams, response, context, ee, next) {
    // console.log(scenarioRunNumber);  

    return next();
}


module.exports = {
    getDeviceName: getDeviceName,
    printStatus: printStatus
};
