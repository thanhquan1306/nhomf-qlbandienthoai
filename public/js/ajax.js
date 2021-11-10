//Trạng thái đầu tiên khi chưa nhấn nút "Thêm sản phẩm"
let page = 1;

//Hiện thị thông tin sản phẩm
async function getProduct(productID) {
    //B1:
    const data = { id: productID };
    const url = './servers_ajax/productdetail.php';
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

//Phân loại sản phẩm theo hãng
async function getProductByCategorie() {
    let viewMoreBtn = document.querySelector('.loadProduct');
    viewMoreBtn.id = "category";
    page = 1;
    let categorieIdList = [];
    let checkboxCategory = document.querySelectorAll('.checkboxCategory');
    for (let i = 0; i < checkboxCategory.length; i++) {
        if (checkboxCategory[i].checked) {
            categorieIdList.push(checkboxCategory[i].id);
        }
    }
    //B1:
    const data = { id: categorieIdList };
    const url = './servers_ajax/productByCategorie.php';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });
    if (page == 1) {
        viewMoreBtn.style.visibility = 'hidden';
    }
    //B2:
    //Hiển thị
    const result = await response.json();
    let productList = document.querySelector('.productList');
    productList.innerHTML = "";

    for (let i = 0; i <= result.length; i++) {
        productList.innerHTML += `
        <div class="col-md-4 pro">
            <div class="card">
                <div class="khung">
                    <a href="product.php/${result[i].product_name}-${result[i].id}">
                        <img class="imge" src="./public/images/${result[i].product_photo}" class="card-img-top" alt="...">
                    </a>
                </div>

                <div class="card-body">
                    <p class="card-title" onclick="getProduct(${result[i].id})">${result[i].product_name}</p>
                    <h5 class="card-text">${result[i].product_price.toLocaleString()} vnđ</h5>
                </div>
            </div>
         </div>`;
    }
    //Nếu k check checkbox nào hoặc check all check box thì chạy giống index
    if (categorieIdList.length == 0 || categorieIdList.length == checkboxCategory.length) {
        viewMoreBtn.style.visibility = 'visible';
        viewMoreBtn.id = "index";
    }
}


//Load thêm sản phẩm
async function getMoreProduct() {
    let viewMoreBtn = document.querySelector('.loadProduct');
    viewMoreBtn.innerHTML = `<div class="spinner-border" role="status" style="width: 20px;height: 20px;"></div> Loadding`;

    page++;
    let response;
    if (viewMoreBtn.id == "index") {
        //B1:
        const data = { page: page };
        const url = './servers_ajax/getMoreProductIndex.php';
        response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
                'Accept': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        });
        if (page >= viewMoreBtn.value) {
            viewMoreBtn.style.visibility = 'hidden';
        }
        //B2:Nhận kết quả
        const result = await response.json();
        //Hiển thị
        let productList = document.querySelector('.productList');
        productList.innerHTML = "";
        result.forEach(item => {
            productList.innerHTML += `
            <div class="col-md-4 pro">
                <div class="card">
                    <div class="khung">
                        <a href="product.php/${item.product_name}-${item.id}">
                            <img class="imge" src="./public/images/${item.product_photo}" class="card-img-top" alt="...">
                        </a>
                    </div>

                    <div class="card-body">
                        <p class="card-title" onclick="getProduct(${item.id})">${item.product_name}</p>
                        <h5 class="card-text">${item.product_price.toLocaleString()} vnđ</h5>
                    </div>
                </div>
            </div>`;
        });
    }
    viewMoreBtn.innerHTML = `Xem thêm sản phẩm`;
}