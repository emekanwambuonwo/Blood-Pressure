const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const port = 3000;

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

const bloodPressureData = [];

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/public/index.html');
});

app.post('/submit', (req, res) => {
  const { date, time, systolic, diastolic, heartRate } = req.body;

  // Simple validation
  if (!date || !time || isNaN(systolic) || isNaN(diastolic) || isNaN(heartRate)) {
    return res.status(400).send('Invalid data. Please check your input.');
  }

  // Store data (in-memory, replace with database logic in production)
  bloodPressureData.push({ date, time, systolic, diastolic, heartRate });

  res.send('Data submitted successfully.');
});

app.get('/data', (req, res) => {
  // Return stored data (in-memory, replace with database logic in production)
  res.json(bloodPressureData);
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});

