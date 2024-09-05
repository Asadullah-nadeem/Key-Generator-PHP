const express = require('express');
require('dotenv').config();  
const app = express();
const userRoutes = require('./routes/userRoutes');
app.use(express.json());
app.use('/api', userRoutes);
const PORT = process.env.PORT;
const URL = process.env.URL
app.listen(PORT, (err) => {
    if (err) {
        console.error('❌ Error starting server:', err);
        return;
    }
    console.log(`✅ Server running at ${URL}`);
    console.log(`✅ Server running on port ${PORT}`);

});
