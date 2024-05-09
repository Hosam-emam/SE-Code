<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truecaller Class Example</title>
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
        // Define the Truecaller class and its methods
class Truecaller {
    constructor() {
        this.isRegistered = false;
    }

    identifyCaller() {
        // Placeholder logic for identifying caller
        console.log('Caller identified');
    }

    remindCall() {
        // Placeholder logic for reminding call
        console.log('Call reminded');
    }

    flashMessage() {
        // Placeholder logic for flashing message
        console.log('Message flashed');
    }

    saveReg() {
        // Placeholder logic for saving registration
        console.log('Registration saved');
        this.isRegistered = true;
        return true;
    }
}

// Create an instance of the Truecaller class
const truecaller = new Truecaller();

// Functions to handle button clicks
function identifyCaller() {
    truecaller.identifyCaller();
    alert('Caller identified');
}

function remindCall() {
    truecaller.remindCall();
    alert('Call reminded');
}

function flashMessage() {
    truecaller.flashMessage();
    alert('Message flashed');
}

function saveRegistration() {
    const success = truecaller.saveReg();
    if (success) {
        alert('Registration saved successfully');
    } else {
        alert('Failed to save registration');
    }
}

    </script>
</head>
<body>
    <div class="container">
        <h1>Truecaller </h1>
        <button onclick="identifyCaller()">Identify Caller</button>
        <button onclick="remindCall()">Remind Call</button>
        <button onclick="flashMessage()">Flash Message</button>
        <button onclick="saveRegistration()">Save Registration</button>
    </div>
    
</body>
</html>