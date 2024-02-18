import axios from 'axios';
const emailInput = document.getElementById('email_1').value;
// Define the request options
const options = {
  method: 'GET',
  url: 'https://email-checker-disposable-or-invalid.p.rapidapi.com/validate',
  params: {
    email: emailInput// Replace this with the email you want to check
  },
  headers: {
    'X-RapidAPI-Key': '3557ccf150msh52a05552dd8a263p100aeejsn92a745277da1',
    'X-RapidAPI-Host': 'email-checker-disposable-or-invalid.p.rapidapi.com'
  }
};

// Make the request using Axios
axios.request(options)
  .then(response => {
    // Handle the response data
    if (response.data.valid) {
      alert('Email is valid');
    } else {
      alert('Email is not valid');
    }
  })
  .catch(error => {
    // Handle errors
    console.error(error);
  });
