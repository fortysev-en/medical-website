function handleBuy(product, price, type) {
    window.location.href = `../../pages/order.html?product=${encodeURIComponent(product)}&price=${encodeURIComponent(price)}&type=${type}`;
}


function calculateTotalPrice(amount) {
    const gst = Number(amount) / 100 * 18
    return (Number(amount) + Number(gst)).toFixed(2)
}


function getParams() {
    let queryParams = new URLSearchParams(window.location.search);
    let product = queryParams.get('product');
    let price = queryParams.get('price');
    let type = queryParams.get('type');

    document.getElementById('productID').innerHTML = product
    document.getElementById('productType').innerHTML = type
    document.getElementById('productPrice').innerHTML = `₹ ${calculateTotalPrice(price)}`
    document.getElementById('priceBreakup').innerHTML = `₹ ${price} + 18% GST`
    

    let email = document.getElementById('email')
    email.value = localStorage.getItem('authenticated');
    
    let order = document.getElementById('order_name')
    order.value = product
    
    let amount = document.getElementById('order_amount')
    amount.value = `${calculateTotalPrice(price)}`

    if(type === 'consultation' || type === 'labtest') {
      document.getElementById('datetime').style.display = "block";
    }
}


function handlePay(event) {  
    event.preventDefault()
    let modal = document.getElementById("myModal");
    modal.style.display = "block";
  }
  

function handleLogout() {
  localStorage.clear('authenticated');
  window.location.href = '/';
}


const authRoutes = ['order.html', 'dashboard.html']
const auth = localStorage.getItem('authenticated');
const currentPage = window.location.pathname;

const page = currentPage.substring(currentPage.lastIndexOf('/') + 1);
if(!auth && authRoutes.includes(page)) {
  window.location.href = '/pages/login.html';
}

if(auth && page == 'login.html' || auth && page == 'signup.html') {
  window.location.href = '/';
}

if(auth) {
  document.getElementById('login').style.display = 'none';
  document.getElementById('signup').style.display = 'none';
  document.getElementById('logout').style.display = 'block';
  document.getElementById('dashboard').style.display = 'block';
}


try {
  let modal = document.getElementById("myModal");
  let span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
    modal.style.display = "none";
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
} catch {}