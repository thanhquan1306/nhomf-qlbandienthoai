// session_destroy();
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
                    <a href="./addCart.php?id=${result[i].id}">Add to card</a>
                </div>
            </div>
         </div>`;
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
                        <a href="./addCart.php?id=${item.id}&action=add">Add to card</a>
                    </div>
                </div>
            </div>`;
        });
    }
    viewMoreBtn.innerHTML = `Xem thêm sản phẩm`;
}

//Bắt sự kiện bàn phím
//Comment searchProduct
async function getProductByKeyword() {
    let input = document.querySelector('#inputKeyword').value;
    console.log(input);
    //B1:
    const data = { key: input };
    const url = './servers_ajax/productByKeyword.php';
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
    // //Hiển thị
    let listGroup = document.querySelector('.list-keySearch');
    listGroup.innerHTML = "";
    for (let i = 0; i < result.length; i++) {
        let str = result[i].product_name;
        let regexKeyword = new RegExp(input, 'gi');
        let content = str.replace(regexKeyword, `<b>${input}</b>`);
        listGroup.innerHTML += `
        <a href="product.php/${result[i].product_name}-${result[i].id}" type="button" class="list-group-item listSearch"><img class="imgSearch" src="./public/images/${result[i].product_photo}" alt=""> ${content}</a>
        `;
    }
}

async function getProductOrderByPrice(e) {

    let viewMoreBtn = document.querySelector('.loadProduct');
    viewMoreBtn.id = "price";
    viewMoreBtn.style.visibility = 'hidden';

    const checkboxPrice = document.querySelectorAll('.checkboxPrice');
    var orderBy = e.getAttribute("data-orderBy");

    for (let i = 0; i < checkboxPrice.length; i++) {
        if (checkboxPrice[i].checked && checkboxPrice[i].id != e.id) {
            checkboxPrice[i].checked = false;
        }
    }
    if (!e.checked) {
        orderBy = null;
    }

    let categorieIdList = [];
    let checkboxCategory = document.querySelectorAll('.checkboxCategory');
    for (let i = 0; i < checkboxCategory.length; i++) {
        if (checkboxCategory[i].checked) {
            categorieIdList.push(checkboxCategory[i].id);
        }
    }

    const data = {
        orderBy: orderBy,
        // page: page,
        id: categorieIdList
    };
    const url = './servers_ajax/productOrderByPrice.php';
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();
    let productList = document.querySelector('.productList');
    productList.innerHTML = "";

    for (let i = 0; i < result.length; i++) {
        const productName = result[i].product_name;
        const id = result[i].id;
        const productPhoto = result[i].product_photo;
        const productPrice = result[i].product_price;

        productList.innerHTML += `
        <div class="col-md-4 pro">
            <div class="card">
                <div class="khung">
                    <a href="product.php/${productName}-${id}">
                        <img class="imge" src="./public/images/${productPhoto}" class="card-img-top" alt="...">
                    </a>
                </div>

                <div class="card-body">
                    <p class="card-title" onclick="getProduct(${id})">${productName}</p>
                    <h5 class="card-text">${productPrice.toLocaleString()} vnđ</h5>
                    <a href="./addCart.php?id=${id}">Add to card</a>
                </div>
            </div>
         </div>`;
    }
}


//Giá trị ban đầu của star
let star = 5;
//Thay đổi giá trị Star Number khi viết comment
function ratingStar(start_id) {
    let stars = document.querySelectorAll('#ratings li');
    stars.forEach(item => {
        if (item.value == start_id) {
            item.className = "star selected";
            star = start_id;
        } else {
            item.className = "star";
        }
    });
}
//Hàm úp comment lên khi nhấn nút post
async function postComment(product_id) {
    let status = document.querySelector('#status');
    if (status.value.trim() == "") {
        alert("Please write your comment");
    } else {
        //B1:
        const data = {
            id: product_id,
            content: status.value,
            star_number: star
        };
        const url = '../servers_ajax/saveComment.php';
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

        let statusArea = document.querySelector('.status-area');
        statusArea.innerHTML = "";
        let index = 0;
        result.forEach(item => {
            index++;
            if (index != result.length) {
                let commentItem = `<div  dir="auto" class="comment">`;
                for (let i = 0; i < item.star_number; i++) {
                    commentItem += `<i class="fas fa-star text-danger" ></i>`
                }
                let darkStar = 5 - item.star_number;
                for (let i = 0; i < darkStar; i++) {
                    commentItem += `<i class="fas fa-star text-secondary" ></i>`
                }
                commentItem += `<br>${item.content}</div>`;
                statusArea.innerHTML += commentItem;
            }
        });
        let star_rating = document.querySelector('.star_rating');
        let star_rating_innerHTML = "";
        for (let i = 0; i < result[result.length - 1].star_verage; i++) {
            star_rating_innerHTML += `<i class="fas fa-star text-danger"></i>`;
        }
        for (let i = 0; i < (5 - result[result.length - 1].star_verage); i++) {
            star_rating_innerHTML += `<i class="fas fa-star text-secondary"></i>`;
        }
        star_rating_innerHTML += `<span> ${result[result.length - 1].star_verage}/5 star</span>`;
        star_rating.innerHTML = star_rating_innerHTML;
    }
    status.value = "";
}