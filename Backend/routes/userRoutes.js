const express = require('express');
const router = express.Router();
const connection = require('../config/db');
const crypto = require('crypto');

// Function to generate a 32-byte key
function generate32BitKey() {
    return crypto.randomBytes(32).toString('hex');
}
router.post('/generate-key', (req, res) => {
    const { name, phone_number, age, address, debit_card_number } = req.body;

    if (!name || !phone_number || !age || !address || !debit_card_number) {
        return res.status(400).json({ error: 'All fields are required' });
    }

    const generatedKey = generate32BitKey();

    const query = `
    INSERT INTO user_data (name, phone_number, age, address, debit_card_number, generated_key)
    VALUES (?, ?, ?, ?, ?, ?)
  `;
    const values = [name, phone_number, age, address, debit_card_number, generatedKey];

    connection.query(query, values, (err, result) => {
        if (err) {
            return res.status(500).json({ error: 'Database error' });
        }

        res.json({
            message: 'Key generated and data stored successfully',
            key: generatedKey
        });
    });
});
router.get('/user-data', (req, res) => {
    connection.query('SELECT * FROM user_data', (err, results) => {
        if (err) {
            return res.status(500).json({ error: 'Database error' });
        }
        res.json(results);
    });
});

module.exports = router;
