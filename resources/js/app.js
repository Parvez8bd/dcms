require('./bootstrap');

require('alpinejs');

// add base url 
window.baseURL = document.head.querySelector('meta[name="base-url"]').content + '/';

// react components
require('./components/Example');

// Location component 
require('./components/Location/Address');

// Patient component 
require('./components/Patient/Patient');
// expense
require('./components/Expense/AddSubcategories');