async function getProduct(productID) {
    //B1:
    const data = { id: productID };
    const url = 'productdetail.php';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });
    //B2:
    const result = await response.json();
    //Hiển thị tên
    let modalProductName = document.querySelector('#productName');
    modalProductName.innerHTML = result.product_name;
    //Hiển thị thông tin
    let modalProductDiscription = document.querySelector('#productDiscription');
    modalProductDiscription.innerHTML = result.product_description;

    //Hiển thị Modal
    var myModal = new bootstrap.Modal(document.getElementById('productModal'));
    myModal.show();
}

//viết hàm getProductsByCategories
async function getProductsByCategories(){
    //B1:
    const data = { id: productID };
    const url = 'productCategories.php';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });
    //B2:
    const result = await response.json();
    //Hiển thị tên
    let modalProductName = document.querySelector('#productName');
    modalProductName.innerHTML = result.product_name;
    //Hiển thị thông tin
    let modalProductDiscription = document.querySelector('#productDiscription');
    modalProductDiscription.innerHTML = result.product_description;

    //Hiển thị Modal
    var myModal = new bootstrap.Modal(document.getElementById('productModal'));
    myModal.show();
}