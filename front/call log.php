<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CallLog Class Example</title>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    text-align: center;
}

button {
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
}

    </style>
    <script src="script.js">
        // Define the CallLog class and its methods
class CallLog {
    constructor() {
        this.callHistory = [];
    }

    getcallHistory() {
        // Placeholder logic for getting call history
        console.log('Getting call history');
        return this.callHistory;
    }

    logcall(call_ID) {
        // Placeholder logic for logging a call
        console.log(Call logged with ID: ${call_ID});
        this.callHistory.push({ call_ID, timestamp: new Date() });
    }
}

// Create an instance of the CallLog class
const callLog = new CallLog();

// Functions to handle button clicks
function getCallHistory() {
    const history = callLog.getcallHistory();
    alert(Call History: ${JSON.stringify(history)});
}

function logCall(call_ID) {
    callLog.logcall(call_ID);
    alert(Call logged with ID: ${call_ID});
}

    </script>
</head>
<body>
    <div class="container">
        <h1>CallLog </h1>
        <button onclick="getCallHistory()">Get Call History</button>
        <button onclick="logCall(123)">Log Call</button>
    </div>
    
</body>
</html>